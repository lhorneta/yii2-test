<?php
$this->title = $product['title'];

$this->registerMetaTag([
	'name' => 'description',
	'content' => "description ".$product['title']
]);
$this->registerMetaTag([
	'name' => 'keywords',
	'content' => "keywords ".$product['title']
])
?>

<table id="product">
	<tbody><tr>
		<td class="product_img">
			<div id="slider-wrap">
			    <div id="slider">
			    	<?php foreach ($product['img'] as $key => $image) {?>
				        <div class="slide">
							<img alt="<?=$image['alt']?>" title="<?=$image['title']?>" src="<?=$image['filename']?>">
				        </div>
			        <?}?>
			    </div>
			</div>
			
		</td>
		<td class="product_desc">
			<p>Название: <span class="title"><?=$product['title']?></span></p>
			<p>Год выхода: <span><?=$product['year']?></span></p>
			<p>Дата поступления: <span><?=$product['date']?></span></p>
			<p>Жанр: <span><?=$product['arcade']?></span></p>
			<p>Страна-производитель: <span><?=$product['country']?></span></p>
			<p>Режиссёр: <span><?=$product['director']?></span></p>
			<p>Продолжительность: <span><?=$product['play']?></span></p>
			<p>В ролях: <span><?=$product['cast']?></span></p>
			<table>
				<tbody>
					<tr>
						<td>
							<p class="price"><?=$product['price']?> руб.</p>
						</td>
						<td>
							<p>
								<a href="<?=Yii::$app->urlManager->createUrl(["cart/add", "product_id" => $product['id']]);?>" class="link_cart"></a>
							</p>
						</td>
					</tr>
					<?php foreach ($product['discount'] as $key => $discount) {?>
					<tr>
						<td>
							<hr>
							<p class="price"><?= $discount['name']?></p>
						</td>						
					</tr>
					<tr>
						<td>
							<span class="title"><?= $discount['description']?></span>
							<p>Акция действует с <?= $discount['start']?> по <?= $discount['end']?></p>
							<p>Акционная цена: <? if(isset($discount['price']) && $discount['price'] !=0){ echo $discount['price'];}else{ echo $product['price']-($product['price']*($discount['procent']/100));} ?> руб. (При покупки <?= $discount['product_count']?> билетов)</p>
						</td>						
					</tr>
					<?}?>
				</tbody>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<p class="desc_title">Описание:</p>
			<p class="desc"><?=$product['description']?></p>
		</td>
	</tr>
	</tbody>
</table>