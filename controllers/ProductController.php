<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;

use yii\web\Controller;
use yii\helpers\Html;
use yii\filters\VerbFilter;
use app\models\Products;
use app\models\Discounts;
use app\models\DiscountsToProducts;
use yii\data\ActiveDataProvider;
use app\models\SearchForm;

use app\models\Sections;
use app\models\SectionsToProducts;
use app\models\ImagesToProducts;


class ProductController extends Controller
{

    public function beforeAction($action)
    {
        $model = new SearchForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) 
        {
            $q = Html::encode($model->q);
            return $this->redirect(Yii::$app->urlManager->createUrl(['product/search', 'q' => $q]));
        }
        return true;
    }


    public function actionProduct($product_id =0)
    {

     //   $product = Products::find()->where(['id' => Yii::$app->getRequest()->getQueryParam('id')])->one();
    	if(isset($product_id) && $product_id !=0){
			$product = Products::getProductById($product_id);
    	}else{$product = Products::getProductById(Yii::$app->getRequest()->getQueryParam('id'));}

        if($product['id']){
             return $this->render('product', [
            'product' => $product
            ]);
        }else{
            return $this->redirect(Yii::$app->urlManager->createUrl(['site/error']));
        }

       
    }

    public function actionSection()
    {
        $id = Yii::$app->getRequest()->getQueryParam('section_id');
       
       $products = Products::getProductsFromSectionId($id);

        return $this->render('index',[
                'products' => $products
            ]);
    }

    public function actionPrice()
    {
        $up = Yii::$app->getRequest()->getQueryParam('up');

        $section_id = Yii::$app->getRequest()->getQueryParam('section_id');

        $sort = '';

        if ($up ==1) {
            $sort = SORT_ASC;
        }else{$sort = SORT_DESC;}

        $products = Products::SortProducts(['price'=> $sort],$section_id);

        return $this->render('index',[
                'products' => $products
            ]);
    }
    
    public function actionTitle()
    {
        $up = Yii::$app->getRequest()->getQueryParam('up');
        $section_id = Yii::$app->getRequest()->getQueryParam('section_id');

        $sort = '';

        if ($up ==1) {
            $sort = SORT_ASC;
        }else{$sort = SORT_DESC;}

         $products = Products::SortProducts(['price'=> $sort],$section_id);

        return $this->render('index',[
                'products' => $products
            ]);
    }
    
    public function actionSearch()
    {
        $q = Yii::$app->getRequest()->getQueryParam('q');

       $products = Products::SearchProducts(['like', 'description', $q]);

        return $this->render('search', [
            'products' => $products,
            'q' => $q
        ]);
    }

    public function actionUpdate()
    {
        $id = Yii::$app->getRequest()->getQueryParam('id');

       $products = Products::Product($id);
       var_dump($products);
    }

}
