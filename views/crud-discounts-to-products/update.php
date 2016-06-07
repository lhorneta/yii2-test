<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DiscountsToProducts */

$this->title = 'Update Discounts To Products: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Discounts To Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="discounts-to-products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
