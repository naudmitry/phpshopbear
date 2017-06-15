<?php include ROOT.'/views/layouts/header.php'; ?>
	
<div class="container">
	<div class="check">	 
	<?php if ($productsInCart): ?>
		<h1>Мои покупки</h1>
		<div class="col-md-9 cart-items">
			<?php foreach ($products as $product) : ?>
			<div class="cart-header">
				<a href="/cart/del/<?php echo $product['id'];?>">
					<div class="close1"></div>
				</a>
				<div class="cart-sec simpleCart_shelfItem">
					<div class="cart-item cyc">
						<img src="<?php echo Product::getImage($product['id']); ?>" class="img-responsive" alt=""/>
					</div>
					<div class="cart-item-info">
						<h3>
							<a href="/product/<?php echo $product['id'];?>"><?php echo $product['name']; ?></a>
							<span>Номер модели: <?php echo $product['code'];?></span>
						</h3>
						<ul class="qty">
							<li><p>Бренд : <?php echo $product['brand']; ?></p></li>
							<li><p>Количество: <?php echo $productsInCart[$product['id']]; ?></p></li>
							<a class="btn btn-success" href="/cart/add/<?php echo $product['id'];?>" role="button">Добавить</a>
							<a class="btn btn-danger" href="/cart/delete/<?php echo $product['id'];?>" role="button">Уменьшить</a>
						</ul>
						<div class="delivery">
							<p>Плата за доставку: 10 BYN</p>
							<span>Доставка в течение 2-3 рабочих дней</span>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="clearfix"></div>						
				</div>
			</div>
			<?php endforeach; ?>		
		</div>
		<div class="col-md-3 cart-total">
			<a class="continue" href="#">Стоимость</a>
			<div class="price-details">
				<h3>Детали покупки</h3>
				<span>Всего</span>
				<span class="total1"><?php echo $totalPrice; ?></span>
				<span>Плата за доставку</span>
				<span class="total1">10.00</span>
				<div class="clearfix"></div>				 
			</div>	
			<ul class="total_price">
				<li class="last_price"> <h4>ВСЕГО</h4></li>	
				<li class="last_price"><span><?php echo $totalPrice + 10; ?></span></li>
				<div class="clearfix"> </div>
			</ul>
			<div class="clearfix"></div>
			<a class="order" href="/cart/checkout">Оформить заказ</a>
		</div>
		<div class="clearfix"> </div>

		<?php else: ?>
			<h1>Корзина пуста</h1>
		<?php endif; ?>
	</div>
</div>

<?php include ROOT.'/views/layouts/footer.php'; ?>		