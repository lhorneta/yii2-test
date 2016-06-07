<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DiscountsToProducts */

$this->title = 'Create Discounts To Products';
$this->params['breadcrumbs'][] = ['label' => 'Discounts To Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discounts-to-products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
