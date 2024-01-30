<?php
if(isset($_GET['item_id'])) {
	require_once 'db.php';

	$item_id = $_GET['item_id'];

	// Удалить фото с id - item_id
	mysqli_query($conn, "DELETE FROM photos WHERE id=$item_id");

	// Редирект
	header('Location: ../pages/admin_page.php');	
}