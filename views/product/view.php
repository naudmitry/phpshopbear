<?php include ROOT . '/views/layouts/header.php'; ?>

<!--content-->
<div class="product">
	<div class="container">
		<div class="col-md-3 product-price">
			<div class=" rsidebar span_1_of_left">
				<div class="of-left">
					<h3 class="cate">Категории</h3>
				</div>
				<br>
				<div class="panel-group category-products">
				   <?php foreach ($categories as $categoryItem): ?>
				   <div class="panel panel-default">
				      <div class="panel-heading">
				         <h4 class="panel-title">
				            <a href="/category/<?php echo $categoryItem['id']; ?>">
				            	<?php echo $categoryItem['name']; ?>
				            </a>
				         </h4>
				      </div>
				   </div>
				   <?php endforeach; ?>
				</div>
			</div>
		</div>
		<div class="col-md-9 product-price1">
			<div class="col-md-5 single-top">	
				<div class="flexslider">
					<ul class="slides">
						<li data-thumb="<?php echo Product::getImage($product['id']); ?>">
							<img src="<?php echo Product::getImage($product['id']); ?>" />
						</li>
  					</ul>
				</div>
				<!-- FlexSlider -->
  				<script defer src="/template/js/jquery.flexslider.js"></script>
				<link rel="stylesheet" href="/template/css/flexslider.css" type="text/css" media="screen" />
				<script>
					// Can also be used with $(document).ready()
					$(window).load(function() {
						$('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						});
					});
				</script>
			</div>	
			<div class="col-md-7 single-top-in simpleCart_shelfItem">
				<div class="single-para ">
					<h4><?php echo $product['name']; ?></h4>
					<h5 class="item_price"><?php echo $product['price']; ?> BYN</h5>
					<p><?php echo $product['description']; ?></p>
					<div class="available">
						<p>ДОСТАВКА И ОПЛАТА</p>
						<p>Самовывоз в Минске</p>
						Вы можете забрать Ваш заказ по адресу ул. Уручская 19, ежедневно.
						<p>Доставка по Минску от 30 минут</p>
						Наша курьерская служба самая быстрая по Минску. От звонка до доставки 30-60 минут.
						<p>Ускоренная доставка по Беларуси</p>
						Доставка за сутки при помощи EMS службы - экономически целесообразная доставка вашего заказа.
					</div>
					<a href="#" class="item_add" data-id="<?php echo $product['id'];?>">
							<p class="number item_price" style="margin-bottom: 2em;"><i> </i><?php echo $product['price'];?> руб.</p>
						</a>	
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!--//content-->

<?php include ROOT.'/views/layouts/footer.php'; ?>	