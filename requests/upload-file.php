<?php

if (!isset($_FILES["Submit"])) {
	session_start();
	require_once 'db.php';

	// Константное значение
	define('MB', 1048576);

	$img = $_FILES["image"]["name"];
	$name = $_POST["name"];

	// Проверка на превышение размера
	if ($_FILES["image"]["size"] > 1*MB) {
		echo "<b style='color:red'>Превышен размер фото!</b>";
	}

	// Перемещение в папку
	move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/'.$_FILES['image']['name']);

	$timest = date("H:i");
	$author = $_SESSION['user_data']['username'];
	$result = mysqli_query($conn, "INSERT INTO photos(name,author,filename, timest) VALUES('$name','$author','$img', '$timest')");
	// Редирект
	header('Location: ../pages/upload.php');	
}