<?php include ROOT.'/views/layouts/header.php'; ?>

<!--content-->
<div class="contact">		
	<div class="container">
		<h1>Контакты</h1>
		<div class="contact-form">
			<div class="col-md-8 contact-grid">
				<form action="send.php" method="post">	
					<input type="text" name="name" value="Имя" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Имя';}">
					<input type="text" name="email" value="Email" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Email';}">
					<input type="text" name="thema" value="Тема" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Тема';}">
					<textarea cols="77" name="message" rows="6" value=" " onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Сообщение';}">Сообщение</textarea>
					<div class="send">
						<input type="submit" value="Отправить">
					</div>
				</form>
			</div>
			<div class="col-md-4 contact-in">
				<div class="address-more">
					<h4>Адрес</h4>
					<p>Плюшевые мишки,</p>
					<p>г. Минск, ул. Уручская 19.</p>
					<p>Пн.-Вс. с 09-00 по 18-00.</p>
				</div>
				<div class="address-more">
					<h4>Телефоны</h4>
					<p>+375 (33) 626-97-95</p>
					<p>+375 (29) 626-97-95</p>
					<p>Email:<a href="mailto:mymishka.by@mail.ru"> mymishka.by@mail.ru</a></p>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2347.736474161517!2d27.690318515861385!3d53.95418838011088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dbc937833703c5:0x2f762aea79dae878!2z0YPQuy4g0KPRgNGD0YfRgdC60LDRjyAxOSwg0JzQuNC90YHQug!5e0!3m2!1sru!2sby!4v1478694985370"></iframe>
		</div>
	</div>	
</div>
<!--//content-->

<?php include ROOT.'/views/layouts/footer.php'; ?>