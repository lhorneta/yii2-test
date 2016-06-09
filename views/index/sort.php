<table>
    <tbody><tr>
            <td rowspan="2">
                <div class="header">
                    <h3>Новинки</h3>
                </div>
            </td>
            <td class="section_bg"></td>
            <td class="section_right"></td>
        </tr>
        <tr>
            <td colspan="2">
                <table class="sort">
                    <tbody><tr>
                        <td>Сортировать по:</td>
                        <td>цене (<a href="<?=Yii::$app->urlManager->createUrl(["product/price", "up" => 1, 'section_id'=>Yii::$app->getRequest()->getQueryParam('section_id')])?>">возр.</a> | <a href="<?=Yii::$app->urlManager->createUrl(["product/price", "up" => 0, 'section_id'=>Yii::$app->getRequest()->getQueryParam('section_id')])?>">убыв.</a>)
                        </td><td>названию (<a href="<?=Yii::$app->urlManager->createUrl(["product/title", "up" => 1, 'section_id'=>Yii::$app->getRequest()->getQueryParam('section_id')])?>">возр.</a> | <a href="<?=Yii::$app->urlManager->createUrl(["product/title", "up" => 0, 'section_id'=>Yii::$app->getRequest()->getQueryParam('section_id')])?>">убыв.</a>)
                    </td></tr>
                </tbody></table>
            </td>
        </tr>
    </tbody>
</table>