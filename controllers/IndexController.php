<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;

use yii\web\Controller;
use yii\helpers\Html;
use yii\filters\VerbFilter;

use yii\data\Pagination;
use app\models\Products;
use app\models\Sections;
use app\models\SectionsToProducts;
use app\models\ImagesToProducts;
use app\models\Discounts;
use app\models\DiscountsToProducts;
use app\models\SearchForm;


class IndexController extends Controller
{
    public $layout = 'main';

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

    public function actionDelivery()
    {
        return $this->render('delivery');
    }

    public function actionContacts()
    {
        return $this->render('contacts');
    }

    public function actionIndex()
    {

        $query = Products::find()->orderBy(['id' => SORT_DESC])->all();

        $pagination = new Pagination([
            'defaultPageSize' => 8,
            'totalCount' => count($query)
        ]);

        $products = Products::getProducts();

        return $this->render('index',[
                'products' => $products,
                'active_page' => Yii::$app->request->get("page", 1),
                'count_pages' => Yii::$app->request->get("page", 1),
                'pagination' => $pagination
            ]);
    }
}