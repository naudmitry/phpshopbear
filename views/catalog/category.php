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
		<div class="col-md-9 product1">
			<div class=" bottom-product">
				<?php foreach ($categoryProducts as $product): 
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
						<a href="" class="item_add" data-id="<?php echo $product['id'];?>">
							<p class="number item_price" style="margin-bottom: 2em;"><i> </i><?php echo $product['price'];?> руб.</p>
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