<?php
if(isset($_POST['Submit'])) {
	session_start();
	require_once 'db.php';

	$txt = $_POST["text"];
	$pic_id = $_POST["pic_id"];


	/*
		Вставить в таблицу comments комментарий под картинку с pic_id, username из сессии
	*/
	$username = $_SESSION['user_data']['username'];
	$result = mysqli_query($conn, "INSERT INTO comments(txt,photo_id,username) VALUES('$txt','$pic_id','$username')");
	
	// Редирект
	header('Location: ../pages/main.php');	
}