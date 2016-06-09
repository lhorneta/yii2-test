<?php
use yii\widgets\LinkPager;

$this->title = "Product Shop";

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'shop'
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'shop shop shop'
])

?>

<?php include 'sort.php';?>
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
                       <a class="link_cart" href="<?=Yii::$app->urlManager->createUrl(["cart/add", "product_id" => $product['id']]);?>"></a>
                    </p>
                </div>
            </td>
            <?php if (($i + 1) % 4 == 0) { ?>
                </tr>
            <?php }
            $i++; ?>
    <?php } ?>
</table>