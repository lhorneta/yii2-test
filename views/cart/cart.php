<div id="cart">
	<h2>Корзина</h2>
	<form name="cart" action="<?/*=$this->action*/?>" method="post">
		<table>
			<? 
			//var_dump($_SESSION['item']);

			if(count($_SESSION['item'])){ ?>
			<tr>
				<td colspan="8" id="cart_top"></td>
			</tr>
			<tr>
				<td class="cart_left"></td>
				<td colspan="2">Товар</td>
				<td>Цена за 1 шт.</td>
				<td>Количество</td>
				<td>Стоимость</td>
				<td></td>
				<td class="cart_right"></td>
			</tr>
			<tr>
				<td class="cart_left"></td>
				<td colspan="6">
					<hr />
				</td>
				<td class="cart_right"></td>
			</tr>
			<?php 
			$session['item'] = $_SESSION['item'];

			foreach ($session['item'] as $key=>$value) { ?>
				<tr class="cart_row">
					<td class="cart_left"></td>
					<td class="img">
						<img src="<?=$value["img"]?>" alt="<?=$value["title"]?>" />
					</td>
					<td class="title"><a href="<?=$value['link']?>"><?=$value["title"]?></a></td>
					<td><?=$value["price"]?> руб.</td>
					<td>
						<table class="count">
							<tr>
								<td>
									<input class="recount" type="text" name="<?=$value["id"]?>" value="<?=$value["qty"]?>" />
								</td>
								<td>шт.</td>
								<td><span class="recount_span">Обновить</span></td>
							</tr>
						</table>
					</td>
					<td class="bold"><?=$value["qty"]*$value["price"]?> руб.</td>
					<td>
						<a href="<?=Yii::$app->urlManager->createUrl(["cart/delete", "product_id" => $value['id'],]);?>" class="link_delete">x удалить</a>
					</td>
					<td class="cart_right"></td>
				</tr>
				<?php if ($key + 1 != count($value)) { ?>
					<tr>
					<td class="cart_left"></td>
					<td colspan="6" class="cart_border">
						<hr />
					</td>
					<td class="cart_right"></td>
				</tr>
				<?php } ?>
			<?php } ?>
			<!--<tr id="discount">
				<td class="cart_left"></td>
				<td colspan="6">
					<form name="discount" action="#" method="post">
						<table>
							<tr>
								<td>Введите номер купона со скидкой<br /><span>(если есть)</span></td>
								<td>
									<input type="text" name="discount" value="" />
								</td>
								<td>
									<input type="image" src="images/cart_discount.png" alt="Получить скидку" onmouseover="this.src='images/cart_discount_active.png'" onmouseout="this.src='images/cart_discount.png'" />
								</td>
							</tr>
						</table>
					</form>
				</td>
				<td class="cart_right"></td>
			</tr>-->
			<tr id="summa">
				<td class="cart_left"></td>
				<td colspan="6">
					<p>Итого (без учёта скидки) <span><?=$_SESSION['cart_cost'];?> руб.</span></p>
				</td>
				<td class="cart_right"></td>
			</tr>
			<tr>
				<td class="cart_left"></td>
				<td colspan="2">
					<div class="left">
						<!--<input type="image" src="images/cart_recalc.png" alt="Пересчитать" onmouseover="this.src='images/cart_recalc_active.png'" onmouseout="this.src='images/cart_recalc.png'" />-->
					</div>
				</td>
				<td colspan="4">
					<div class="right">
						<input type="hidden" name="func" value="cart" />
						<a href="<?=Yii::$app->urlManager->createUrl(["cart/checkout"]);?>">
							<img src="images/cart_order.png" alt="Оформить заказ" onmouseover="this.src='images/cart_order_active.png'" onmouseout="this.src='images/cart_order.png'" />
						</a>
					</div>
				</td>
				<td class="cart_right"></td>
			</tr>
			<tr>
				<td colspan="8" id="cart_bottom"></td>
			</tr>
		<?	}else{?>
			<tr>
				<td colspan="8">Ваша корзина пуста</td>
			</tr>
		<?	} ?>
		</table>
	</form>
</div>