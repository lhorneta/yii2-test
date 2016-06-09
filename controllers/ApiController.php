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


class ApiController extends Controller
{

    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => \yii\filters\ContentNegotiator::className(),
                'only' => ['index', 'view'],
                'formatParam' => '_format',
                'formats' => [
                    'application/json' => \yii\web\Response::FORMAT_JSON,
                    'application/xml' => \yii\web\Response::FORMAT_XML,
                ],
            ],
        ];
    }
    public function actionProduct()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return Products::getProductById(Yii::$app->getRequest()->getQueryParam('id'));

    }

}
