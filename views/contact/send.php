<?php 
	$name=$_POST['name'];
	$message=$_POST['message'];

	$name = htmlspecialchars($name);
	$message = htmlspecialchars($message);

	$name = urldecode($name);
	$message = urldecode($message);

	$name = trim($name);
	$message = trim($message);

	echo $name;
	echo "<br>";
	echo $message;
?>