<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Discounts extends ActiveRecord
{
	public function getDiscountsByProductId($product_id=0){

		$query = new \yii\db\Query;
        $query->select('*')
            ->from(DiscountsToProducts::tableName())
            ->leftJoin(Discounts::tableName(), ''.Discounts::tableName().'.`id` = '.DiscountsToProducts::tableName().'.`discount_id`')
            ->where(['product_id' => $product_id]);

        $command = $query->createCommand();
        $resultQuery = $command->queryAll();

        return $resultQuery;
	} 

}
