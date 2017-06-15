<?php include ROOT.'/views/layouts/header.php'; ?>

<div class="container">
	<?php if (isset($errors) && is_array($errors)): ?>
		<ul>
			<?php foreach ($errors as $error): ?>
				<li><?php echo $error; ?></li>
			<?php endforeach;?>
		</ul>
	<?php endif; ?>

	<div class="account">
		<h1>Вход на сайт</h1>
		<div class="account-pass">
			<div class="col-md-8 account-top">
				<form action="" method="post">
					<div> 	
						<span>Email</span>
						<input type="text" name="email" value="<?php echo $email; ?>"> 
					</div>
					<div> 
						<span >Пароль</span>
						<input type="password" name="password" value="<?php echo $password; ?>">
					</div>				
					<input type="submit" name="submit" value="Войти"> 
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>

<?php include ROOT.'/views/layouts/footer.php'; ?>