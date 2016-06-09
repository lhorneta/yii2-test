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


class CartController extends Controller
{

    public $layout = 'main';
    //public $session = Yii::$app->session;

    public function init()
    {
        $session = Yii::$app->session;
        $session->open();
    }

    public function actionView()
    {
        
        $this->updateCart();
        //var_dump($_SESSION);
        return $this->render('cart',[
                'products' =>  $session['item']
            ]);
    }

    public function actionAdd()
    {
        $product_id = Yii::$app->getRequest()->getQueryParam('product_id');

        if(isset($product_id) && $product_id!==''){
        
            $item = Products::getProductById($product_id);
            
            if(isset($_SESSION['item'][$product_id])){

                $_SESSION['item'][$product_id]['price']         = $item['price'];
                $_SESSION['item'][$product_id]['qty']++;
                $_SESSION['item'][$product_id]['title']         = $item['title'];
                $_SESSION['item'][$product_id]['id']            = $item['id'];
                $_SESSION['item'][$product_id]['link']          = $item['link'];
                $_SESSION['item'][$product_id]['img']           = $item['img'][0]['filename'];
            
            }else{

                $_SESSION['item'][$product_id] = array();

                $_SESSION['item'][$product_id]['price']         = $item['price'];
                $_SESSION['item'][$product_id]['qty']           = 1;
                $_SESSION['item'][$product_id]['title']          = $item['title'];
                $_SESSION['item'][$product_id]['id']            = $item['id'];
                $_SESSION['item'][$product_id]['link']          = $item['link'];
                $_SESSION['item'][$product_id]['img']           = $item['img'][0]['filename'];
            }
            
        }

        $this->updateCart();

        return $this->redirect(Yii::$app->urlManager->createUrl(['cart/view']));        

    }

    public function updateCart() {

       $_SESSION['products_incart'] =count($_SESSION['item']);

       $_SESSION['cart_cost'] =0;
        
        if(isset($_SESSION['item'])){
            
            foreach ($_SESSION['item'] as $key=>$value) {
                $_SESSION['cart_cost']+=$_SESSION['item'][$key]['price'] * $_SESSION['item'][$key]['qty'];
            }
            
        }

    }

    public function actionUpdate() {

       $product_id = Yii::$app->getRequest()->getQueryParam('product_id');
       $qty = Yii::$app->getRequest()->getQueryParam('qty');
       if($qty == 0){$this->actionDelete($product_id);}else{$_SESSION['item'][$product_id]['qty'] = $qty;}
 
       $this->updateCart();
    }

    public function actionDelete($id=0) {
        $product_id = ($id !=0) ? $id : Yii::$app->getRequest()->getQueryParam('product_id');

        if(isset($product_id)){
            unset($_SESSION['item'][$product_id]);
        }

        $this->updateCart();
        return $this->redirect(Yii::$app->urlManager->createUrl(['cart/view']));  
    }

    public function clear(){
        session_destroy();
    }
    
    public final function actionCheckout(){
       $this->clear();
       return $this->render('order');
    }
}