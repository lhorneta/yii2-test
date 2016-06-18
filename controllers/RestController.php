<?php

namespace app\controllers;
use yii\web\UrlRule;
use yii\rest\ActiveController;
use app\models\Products;

 
class RestController extends ActiveController
{
    public $modelClass = 'app\models\Products';
    public $layout = 'admin';
    public function behaviors()
    {
        return [
            [
                'class' => \yii\filters\ContentNegotiator::className(),
                'only' => ['index', 'view', 'getproductdetails'],

                'formats' => [
                    'application/json' => \yii\web\Response::FORMAT_JSON,
                ],
            ],
        ];
    }

	public function actionIndex()
    {
        return new ActiveDataProvider([
            'query' => $modelClass::find(),
        ]);
    }

 	public function getProductDetails($product_id) {
       return $modelClass::Product($product_id);
    }


}