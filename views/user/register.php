<?php include ROOT.'/views/layouts/header.php'; ?>

<div class="container">
	<?php if ($result) : ?>
		<div class="register">
			<h1>Вы зарегистрированы!</h1>
		</div>
	<?php else :?>
		<?php if (isset($errors) && is_array($errors)) : ?>
			<ul>
				<?php foreach ($errors as $error) : ?> 
				<li><?php echo $error;?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<div class="register">
			<h1>Регистрация</h1>
			<form action="" method="POST"> 
				<div class="col-md-6 register-top-grid">
					<h3>Персональная информация</h3>
					<div>
						<span>Имя</span>
						<input type="text" name="name" value="<?php echo $name; ?>"> 
					</div>
					<div>
						<span>Адрес</span>
						<input type="text" name="address" value="<?php echo $address; ?>"> 
					</div>
				</div>
				<div class="col-md-6 register-bottom-grid">
					<h3>Информация для входа</h3>
					<div>
						<span>Email</span>
						<input type="text" name="email" value="<?php echo $email; ?>"> 
					</div>
					<div>
						<span>Пароль</span>
						<input type="password" name="password" value="<?php echo $password; ?>">
					</div>
					<input type="submit" name="submit" value="Регистрация">		
				</div>
				<div class="clearfix"> </div>
			</form>
		</div>
	<?php endif; ?>
</div>

<?php include ROOT.'/views/layouts/footer.php'; ?>			