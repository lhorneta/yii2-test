<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;
use app\components\SectionBlock;
use app\models\SearchForm;

AppAsset::register($this);

$action = Yii::$app->controller->action->id;

$model = new SearchForm();

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <div id="container">
        <div id="header">
            <img src="images/header.png" alt="Шапка">
            <div>
                <p class="red">093-111-111-22-33</p>
                <p class="blue">Время работы с 09:00 до 21:00<br>без перерыва и выходных</p>
            </div>
            <div class="cart">
                <p class="cart_title">Корзина</p>
                <? if(isset($_SESSION['item'])){ ?>
                    <p class="blue">Текущий заказ</p>
                    <p>В корзине <span><?=($_SESSION['products_incart']) ? $_SESSION['products_incart'] : 0 ?></span> товаров<br>на сумму <span><?=($_SESSION['cart_cost']) ?$_SESSION['cart_cost'] : 0 ?></span> руб.</p>
                    <a href="<?=Yii::$app->urlManager->createUrl(["cart/view"]);?>">Перейти в корзину</a>
                <?}else{?>
                    <p>Ваша корзина пуста</p>
                <? } ?>    
            </div>
        </div>
        <div id="topmenu">
            <ul>
                <li>
                    <a  href="<?=Yii::$app->urlManager->createUrl(["index/index"])?>" <?php if ($action == "index") { ?>class="active"<?php } ?>>Главная</a>
                </li>
                <li>
                    <img src="images/topmenu_border.png" alt="">
                </li>
                <li>
                    <a  href="<?=Yii::$app->urlManager->createUrl(["index/delivery"])?>" <?php if ($action == "delivery") { ?>class="active"<?php } ?>>Доставка и оплата</a>
                </li>
                <li>
                    <img src="images/topmenu_border.png" alt="">
                </li>
                <li>
                   <a  href="<?=Yii::$app->urlManager->createUrl(["index/contacts"])?>" <?php if ($action == "contacts") { ?>class="active"<?php } ?>>Контакты</a>
                </li>
                <!--<li>
                    <?php
                   /* echo Nav::widget([

                        'items' => [
                            Yii::$app->user->isGuest ? (
                                ['label' => 'Войти', 'url' => ['/site/login']]
                            ) : (

                                Html::beginForm(['/site/logout'], 'post')
                                . Html::submitButton(
                                    'Выход (' . Yii::$app->user->identity->username . ')'
                                )
                                . Html::endForm()
                            )
                        ],
                    ]);
                    */
                    ?>
                </li>-->
            </ul>
            <div id="search">
                <?php $form = ActiveForm::begin(); ?>
                        <table>
                            <tr>
                                <td>
                                    <?= $form->field($model, 'q')->label('')->textInput(['class' => 'input', 'placeholder' => 'Поиск..']) ?>
                                </td>
                            </tr>
                        </table>
                    <?php ActiveForm::end(); ?>
            </div>
        </div>
        <div id="content">
            <div id="left">
                <div id="menu">
                    <div class="header">
                        <h3>Разделы</h3>
                    </div>
                    <?=SectionBlock::widget()?>
                    <div class="bottom"></div>
                </div>
            </div>
            <div id="right">
                <?=$content?>
            </div>
            <div class="clear"></div>
            
        </div>

    </div>
    <div id="footer">
                <div id="pm">
                    <table>
                        <tbody><tr>
                            <td>Способы оплаты:</td>
                            <td>
                                <img src="images/pm.png" alt="Способы оплаты">
                            </td>
                        </tr>
                    </tbody></table>
                </div>
                <div id="copy">
                    <p>Copyright © Site.ru. Все права защищены.</p>
                </div>
            </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
