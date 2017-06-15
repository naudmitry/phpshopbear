<!DOCTYPE html>
<html>
<head>
	<title>Большие плюшевые медведи</title>
	<link rel="shortcut icon" href="/template/images/icon.png" type="image/x-icon">
	<link href="/template/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="/template/js/jquery.min.js"></script>
	<!-- Custom Theme files -->
	<!--theme-style-->
	<link href="/template/css/style.css" rel="stylesheet" type="text/css" media="all" />	
	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Когда уже надоели скучные подарки или если не известно, что может порадовать на праздник, то есть вариант – большие плюшевые медведи. Они несут радость, нежность и положительные эмоции." />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!--fonts-->
	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'><!--//fonts-->
	<!-- start menu -->
	<link href="/template/css/memenu.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="/template/js/memenu.js"></script>
	<script>$(document).ready(function(){$(".memenu").memenu();});</script>
	<script src="/template/js/simpleCart.min.js"> </script>
</head>
<body>
<!--header-->
<div class="header">
	<div class="header-top">
		<div class="container">
			
			<div class="header-left">		
				<ul>
					<?php if (User::isGuest()): ?>
						<li><a class="lock"  href="/user/login">Войти</a></li>
						<li><a class="lock" href="/user/register">Регистрация</a></li>
					<?php else: ?>
						<li><a class="lock"  href="/cabinet">Кабинет</a></li>
						<li><a class="lock"  href="/user/logout">Выход</a></li>
					<?php endif; ?>
					<li></li>
				</ul>
				<div class="cart box_1">
					<a href="/cart">
					<h3> 
						<div class="total">
							Корзина (<span id="cart-count"><?php echo Cart::countItems(); ?></span> товаров)
						</div>
						<img src="/template/images/cart.png" alt=""/></h3>
					</a>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="container">
		<div class="head-top">
			<div class="logo">
				<a href="/"><img src="/template/images/logo.png" alt=""></a>	
			</div>
			<div class=" h_menu4">
				<ul class="memenu skyblue">
					<li class="active grid"><a class="color8" href="/">Главная</a></li>	
					<li><a class="color1" href="/catalog/page-1">Магазин</a></li>
					<li><a class="color4" href="/news/">Новости</a></li>				
					<li><a class="color6" href="/contact/">Контакты</a></li>
				</ul> 
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>