<?php

namespace app\models;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Products;
use app\models\Sections;
use app\models\SectionsToProducts;
use app\models\ImagesToProducts;
use app\models\Discounts;
use app\models\DiscountsToProducts;
use app\models\SearchForm;
use yii\db\ActiveRecord;

class Products extends ActiveRecord
{

    public $layout = 'main';

    public function afterFind($arr=array()) {

        $monthes = [
            1 => 'Января', 2 => 'Февраля', 3 => 'Марта', 4 => 'Апреля',
            5 => 'Мая', 6 => 'Июня', 7 => 'Июля', 8 => 'Августа',
            9 => 'Сентября', 10 => 'Октября', 11 => 'Ноября', 12 => 'Декабря'
        ];
        $res = array();

        foreach ($arr as $key => $item) {

            $item['date'] = date('j ', $item['date']).$monthes[date('n', $item['date'])].date(', Y', $item['date']);
            $item['link'] = Yii::$app->urlManager->createUrl(["product/product", "id" => $item['id']]);
            $item['img'] =  Images::getImagesConvertPath(Images::getImagesByProductId($item['id']));
            $item['arcade'] =  Sections::getTitlesConvertToString(Sections::getTitlesByProductId($item['id']));
            $item['discount'] = Discounts::getDiscountsByProductId($item['id']);
            $res[] = $item;
        }

        return $res;

    }

    public function getProductsFromSectionId($id=0){

        $query = new \yii\db\Query;
        $query->select('*')
            ->from(SectionsToProducts::tableName())
            ->leftJoin(Products::tableName(), ''.Products::tableName().'.`id` = '.SectionsToProducts::tableName().'.`product_id`')
            ->where(['section_id' => $id])
            ->offset($pagination->offset)
            ->limit($pagination->limit);

        $command = $query->createCommand();
        $resultQuery = $command->queryAll();
        $products = Products::afterFind($resultQuery);

        return $products;
    }

    public function getProducts(){

        $query = new \yii\db\Query;
        $query->select('*')
            ->from(Products::tableName())
            ->orderBy(['date'=> SORT_DESC])
            ->offset($pagination->offset)
            ->limit($pagination->limit);

        $command = $query->createCommand();
        $resultQuery = $command->queryAll();
        $products = Products::afterFind($resultQuery);

        return $products;
    }

    public function getProductById($id=0){

        $query = new \yii\db\Query;
        $query->select('*')
            ->from(Products::tableName())
            ->where(['id' => $id])
            ->offset($pagination->offset)
            ->limit($pagination->limit);

            $command = $query->createCommand();
            $resultQuery = $command->queryOne();
            $product = Products::afterFind(array($resultQuery));

            return $product[0];
    }

    public function SortProducts($sort=array(),$section_id=''){

        $query = new \yii\db\Query;
        if(isset($section_id) && $section_id !=0){
            $query->select(Products::tableName().'.*')
                ->from(Products::tableName())
                ->leftJoin(SectionsToProducts::tableName(), ''.SectionsToProducts::tableName().'.`product_id` = '.Products::tableName().'.`id`')
                ->where(['section_id' => $section_id])
                ->orderBy($sort)
                ->offset($pagination->offset)
                ->limit($pagination->limit);

        }else{
            $query->select('*')
                ->from(Products::tableName())
                ->orderBy($sort)
                ->offset($pagination->offset)
                ->limit($pagination->limit);
        }
        $command = $query->createCommand();
        $resultQuery = $command->queryAll();
        $products = Products::afterFind($resultQuery);

        return $products;
    }

    public function SearchProducts($search=array()){
        $query = new \yii\db\Query;
        $query->select('*')
            ->from(Products::tableName())
            ->where($search)
            ->offset($pagination->offset)
            ->limit($pagination->limit);

        $command = $query->createCommand();
        $resultQuery = $command->queryAll();
        $products = Products::afterFind($resultQuery);

        return $products;
    }

    public function actionView($product_id) {
       return Products::Product($product_id);
    }
}