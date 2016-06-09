<?php
use yii\widgets\LinkPager;

$this->title = "Поиск $q";

$this->registerMetaTag([
	'name' => 'description',
	'content' => "Поиск: $q."
]);
$this->registerMetaTag([
	'name' => 'keywords',
	'content' => $q
])
?>
<?php include 'sort.php';?>
<?php if ($q == "") { ?>
	<h2>Вы задали пустой поисковый запрос!</h2>
<?php } else { ?>
	<h2>Результаты поиска: <?=$q?></h2>
	<?php if (!$products) { ?>
		<p>Ничего не найдено</p>
	<?php } else { ?>
		<table class="products">
		<?php
   			 $i = 0;
   			foreach ($products as $key => $product) {

            if ($i % 4 == 0) { ?>
                <tr>
            <?php } ?>
            <td>
                <div class="intro_product">
                    <p class="img">
                        <img src="<?=$product['img'][0]['filename']?>" alt="<?=$product['img'][0]['title']?>" />
                    </p>
                    <p class="title">
                        <a href="<?=$product['link']?>"><?=$product['title']?></a>
                    </p>
                    <p class="price"><?=$product['price']?> руб.</p>
                    <p>
                        <a href="<?=Yii::$app->urlManager->createUrl(["cart/add", "product_id" => $product['id']]);?>" class="link_cart"></a>
                    </p>
            </td>
            <?php if (($i + 1) % 4 == 0) { ?>
                </tr>
            <?php }
            $i++; ?>
    <?php } ?>
	<?php } ?>
	</table>

<?php } ?>