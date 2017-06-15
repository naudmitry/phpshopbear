		<div class="footer">
			<div class="container">
				<div class="footer-top-at">
					<div class="col-md-4 amet-sed">
						<h4>ИНФОРМАЦИЯ</h4>
						<ul class="nav-bottom">
							<li><a href="#">Как заказать</a></li>
							<li><a href="#">FAQ</a></li>
							<li><a href="contact.html">Расположение</a></li>
							<li><a href="#">Доставка</a></li>
							<li><a href="#">Членство</a></li>	
						</ul>	
					</div>
					<div class="col-md-4 amet-sed ">
					<h4>СВЯЗАТЬСЯ С НАМИ</h4>
						<p>Круглосуточно и без выходных!</p>
						<p>Пишите: mymishka.by@mail.ru</p>
						<p>Звоните: +375 (33) 626-97-95</p>
						<ul class="social">
							<li><a href="#"><i> </i></a></li>						
							<li><a href="#"><i class="twitter"> </i></a></li>
							<li><a href="#"><i class="rss"> </i></a></li>
							<li><a href="#"><i class="gmail"> </i></a></li>
						</ul>
					</div>
					<div class="col-md-4 amet-sed">
						<h4>НОВОСТНАЯ РАССЫЛКА</h4>
						<p>Зарегистрируйтесь, чтобы получать уведомления</p>
						<form>
							<input type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
							<input type="submit" value="ОК">
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="footer-class">
				<p>Интернет-магазин плюшевых медведей © 2017</p>
			</div>
		</div>

		<script>
			$(document).ready(function() {
				$(".item_add").click(function() {
					var id = $(this).attr("data-id");
					$.post("/cart/addAjax/"+id, {}, function(data) {
						$("#cart-count").html(data);
					});
					return false;
				});
			});
		</script>

	</body>
</html>