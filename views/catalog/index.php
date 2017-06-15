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
			<!--initiate accordion-->
			<script type="text/javascript">
				$(function() {
					var menu_ul = $('.menu > li > ul'), menu_a  = $('.menu > li > a');
					menu_ul.hide();
					menu_a.click(function(e) {
						e.preventDefault();
						if(!$(this).hasClass('active')) {
							menu_a.removeClass('active');
							menu_ul.filter(':visible').slideUp('normal');
							$(this).addClass('active').next().stop(true,true).slideDown('normal');
						} else {
							$(this).removeClass('active');
							$(this).next().stop(true,true).slideUp('normal');
						}
					});
				});

				function setName(id) {
					document.getElementById(id).innerHTML="В корзине";
				};
			</script>
		</div>
		<div class="col-md-9 product1">
			<div class=" bottom-product">
				<?php foreach ($productsAll as $product): 
					$productName = $product['name'];
					if (strlen($productName) > 28) 
						$productName = rtrim(mb_substr($productName, 0, 15, 'UTF-8'), "!,.-")."&#8230;";?>
					<div class="col-md-4 bottom-cd simpleCart_shelfItem">
						<div class="product-at ">
							<a href="/product/<?php echo $product['id'];?>">
								<img class="img-responsive" src="<?php echo Product::getImage($product['id']); ?>" alt="">
								<div class="pro-grid">
									<span class="buy-in">Подробнее</span>
								</div>
							</a>	
						</div>
						<p class="tun"><?php echo $productName;?></p>
						<a href="#" class="item_add" data-id="<?php echo $product['id'];?>" onclick="setName('p<?php echo $product['id'];?>')">
							<p id="p<?php echo $product['id'];?>" class="number item_price" style="margin-bottom: 2em;"><i> </i>
								<?php 
									if ($productsInCart && array_key_exists($product['id'], $productsInCart)) 
										echo 'В корзине'; 
									else 
										echo $product['price'], ' руб.';
								?>
							</p>
						</a>						
					</div>
				<?php endforeach;?>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="clearfix"> </div>
		<nav class="in">
			<?php echo $pagination->get(); ?>
		</nav>
	</div>	
</div>
<!--//content-->

<?php include ROOT.'/views/layouts/footer.php'; ?>			