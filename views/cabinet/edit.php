<?php include ROOT.'/views/layouts/header.php'; ?>

<div class="container">
	<?php if ($result): ?>
		<p>Данные отредактированы</p>
	<?php else: ?>
		<?php if (isset($errors) && is_array($errors)): ?>
			<ul>
				<?php foreach ($errors as $error): ?>
					<li><?php echo $error; ?></li>
				<?php endforeach;?>
			</ul>
		<?php endif; ?>

	<div class="account">
		<h1>Редактирование данных</h1>
		<div class="account-pass">
			<div class="col-md-8 account-top">
				<form action="" method="post">
					<div> 	
						<span>Имя</span>
						<input type="text" name="name" value="<?php echo $name; ?>"> 
					</div>
					<div> 
						<span >Пароль</span>
						<input type="password" name="password" value="<?php echo $password; ?>">
					</div>	
					<div> 
						<span >Адрес</span>
						<input type="text" name="address" value="<?php echo $address; ?>">
					</div>			
					<input type="submit" name="submit" value="Сохранить"> 
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<?php endif; ?>
</div>

<?php include ROOT.'/views/layouts/footer.php'; ?>