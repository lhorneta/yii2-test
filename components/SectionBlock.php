<?php
namespace app\components;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use app\models\Sections;

class SectionBlock extends Widget {
	
	public function run() {
		$sections = Sections::find()->where(['parent_id'=> 0])->all();
		
		$counter = 0;
		$length = count($sections);

		foreach ($sections as $section) {
			
			$counter++;

			$href = Yii::$app->urlManager->createUrl(["product/section", "section_id" => $section->id]);

			$childs = Sections::find()->where(['parent_id'=> $section->id])->all();

			$a = Html::tag('a', $section->title, ['href' => $href]);

			if($length == $counter){
				$html .= Html::tag('p', $a, ['class' => 'last']);
			}else{
				$html .= Html::tag('p', $a);
			}

			if($childs){
				foreach ($childs as $child) {
					$child_href = Yii::$app->urlManager->createUrl(["product/section", "section_id" => $child->id]);
					$a_child = Html::tag('a', $child->title, ['href' => $child_href]);
					$html .= Html::tag('p', '-> '.$a_child);
				}
			}
		}
		return Html::tag('div', $html, ['id' => 'items']);
	}
	
}

?>