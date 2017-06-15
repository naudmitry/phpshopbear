<?php include ROOT . '/views/layouts/header.php'; ?>

<!--content-->
<div class="blog">
	<div class="container">
	   	<div class="blog-top">
		  	<div class=" grid_3 grid-1">
				<h3><a href="/news/<?php echo $newsItem['id'];?>"><?php echo $newsItem['title']?></a></h3>
				<a href="/news/<?php echo $newsItem['id'];?>"><img src="<?php echo News::getImage($newsItem['id']); ?>" class="img-responsive" alt=""/></a>
				<div class="blog-poast-info">
					<ul>
						<li><a class="admin" href="#"><i> </i> <?php echo $newsItem['author_name'];?> </a></li>
						<li><span><i class="date"> </i><?php echo $newsItem['date'];?></span></li>
						<li><a class="p-blog" href="#"><i class="comment"> </i>Без комментариев</a></li>
					</ul>
			    </div>
			    <p><?php echo $newsItem['content']?></p>
			</div>
			<div class="single-bottom">
				<h3>Оставить коментарий</h3>
				<form>	
					<input type="text" value="Имя" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Имя';}">
					<input type="text" value="Email" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Email';}">
					<input type="text" value="Тема" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Тема';}">
					<textarea cols="77" rows="6" value=" " onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Сообщение';}">Сообщение</textarea>
					<input type="submit" value="Отправить">	
				</form>
			</div>
		</div>
	</div>
</div>
<!--//content-->

<?php include ROOT.'/views/layouts/footer.php'; ?>			