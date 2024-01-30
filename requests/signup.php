<?php
require_once 'db.php';

if(isset($_POST['Submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['pass'];
	$role = $_POST['role'];

	// Добавить в таблицу users данные пользователя: email, password, username, role соответсвующие переменным
	$result = mysqli_query($conn, "INSERT INTO users(email,password,username,role) VALUES('$email','$password','$username', '$role')");

	// Редирект
	header('Location: ../pages/login.php');	
}