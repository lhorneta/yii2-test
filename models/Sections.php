<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;

class Sections extends ActiveRecord
{
 
	public function getTitlesByProductId($product_id=0){

		$query = new \yii\db\Query;
        $query->select(Sections::tableName().'.`title`')
            ->from(SectionsToProducts::tableName())
            ->leftJoin(Sections::tableName(), ''.Sections::tableName().'.`id` = '.SectionsToProducts::tableName().'.`section_id`')
            ->where(['product_id' => $product_id]);

        $command = $query->createCommand();
        $resultQuery = $command->queryAll();

        return $resultQuery;
	} 

	public function getTitlesConvertToString($titles=array()){

		$string = '';

		if($titles){
			$count = count($titles);
			foreach ($titles as $key => $value) {

				$key++;
				if($key != $count){$string .= $value['title'].', ';}else{$string .= $value['title'];}
			}
		}

        return $string;
	} 
}
