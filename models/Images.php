<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Images extends ActiveRecord
{

	public function getImagesByProductId($product_id=0){

		$query = new \yii\db\Query;
        $query->select('*')
            ->from(ImagesToProducts::tableName())
            ->leftJoin(Images::tableName(), ''.Images::tableName().'.`id` = '.ImagesToProducts::tableName().'.`image_id`')
            ->where(['product_id' => $product_id]);

        $command = $query->createCommand();
        $resultQuery = $command->queryAll();

        return $resultQuery;
	} 

	public function getImagesConvertPath($images=array()){

		$result = array();

		if($images){
			foreach ($images as $key => $image) {

				$image['filename'] = "/web/images/products/".$image['filename'];
				$result[] = $image;
			}
		}

        return $result;
	} 
}
