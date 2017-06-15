<?php include ROOT.'/views/layouts/header.php'; ?>

<!--content-->
<div class="blog">
	<div class="container">
		<h1>Новости</h1>
		<div class="blog-top">
			<?php foreach ($newsList as $newsItem):?>
				<div class="col-md-6 grid_3">
					<h3 style="height: 36px;"><a href="/news/<?php echo $newsItem['id'];?>"><?php echo $newsItem['title'];?></a></h3>
					<a href="/news/<?php echo $newsItem['id'];?>"><img src="<?php echo News::getImage($newsItem['id']); ?>" class="img-responsive" alt=""/></a>
					<div class="blog-poast-info">
						<ul>
							<li><a class="admin" href="#"><i> </i> <?php echo $newsItem['author_name'];?> </a></li>
							<li><span><i class="date"> </i><?php echo date_create($newsItem['date'])->Format('Y-m-d');?></span></li>
							<li><a class="p-blog" href="#"><i class="comment"> </i>Без комментариев</a></li>
						</ul>
					</div>
					<p style="height: 63px;"><?php echo $newsItem['short_content'];?></p>
					<div class="button"><a href="/news/<?php echo $newsItem['id'];?>">Посмотреть</a></div>
				</div>
			<?php endforeach;?>
			<div class="clearfix"> </div>
		</div> 
	</div>
</div>
<!--//content-->

<?php include ROOT.'/views/layouts/footer.php'; ?>			