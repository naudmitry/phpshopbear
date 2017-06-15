<?php include ROOT.'/views/layouts/header.php'; ?>

<div class="banner">
	<div class="container">
		<script src="/template/js/responsiveslides.min.js"></script>
  		<script>
    		$(function () {
	      		$("#slider").responsiveSlides({
	      			auto: true,
	      			nav: true,
	      			speed: 500,
	        		namespace: "callbacks",
	        		pager: true,
	      		});
    		});
  		</script>
		<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider">
			    <?php foreach ($news as $newsItem):?>
			    <li>
					<div class="banner-text">
						<h3><?php echo $newsItem['title'];?></h3>
						<p><?php echo $newsItem['short_content'];?></p>
						<a href="/news/<?php echo $newsItem['id'];?>">Посмотреть</a>
					</div>
				</li>
				<?php endforeach;?>
			</ul>
		</div>
	</div>
</div>

<!--content-->
<div class="content">
	<div class="container">
		<div class="content-top">
			<h1>ЛУЧШИЕ ПРЕДЛОЖЕНИЯ</h1>
			<div class="grid-in">
				<?php foreach($latestProducts as $product):?>
					<div class="col-md-4 grid-top">
						<a href="/product/<?php echo $product['id'];?>" class="b-link-stripe b-animate-go thickbox">
						<img class="img-responsive" src="<?php echo Product::getImage($product['id']); ?>" alt="">
							<div class="b-wrapper">
								<h3 class="b-animate b-from-left b-delay03 ">
									<span><?php echo $product['brand'];?></span>	
								</h3>
							</div>
						</a>
						<p><a href="single.html"><?php echo $product['name'];?></a></p>
					</div>
				<?php endforeach;?>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="content-bottom">
			<ul>
				<li><a href="#"><img class="img-responsive" src="/template/images/lo.png" alt=""></a></li>
				<li><a href="#"><img class="img-responsive" src="/template/images/lo1.png" alt=""></a></li>
				<li><a href="#"><img class="img-responsive" src="/template/images/lo2.png" alt=""></a></li>
				<li><a href="#"><img class="img-responsive" src="/template/images/lo3.png" alt=""></a></li>
				<li><a href="#"><img class="img-responsive" src="/template/images/lo4.png" alt=""></a></li>
				<li><a href="#"><img class="img-responsive" src="/template/images/lo5.png" alt=""></a></li>
				<div class="clearfix"> </div>
			</ul>
		</div>
	</div>
</div>

<?php include ROOT.'/views/layouts/footer.php'; ?>	