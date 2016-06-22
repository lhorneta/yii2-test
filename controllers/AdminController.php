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


class AdminController extends Controller
{
    public $layout = 'admin';

    public function actionIndex()
    {

        return $this->render('index',[
            ]);
    }
}