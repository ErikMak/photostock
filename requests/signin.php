<?php 
if(isset($_POST['Submit'])) {
	session_start();
	require_once '../requests/db.php';

	$email = $_POST['email'];
	$password = $_POST['pass'];

	/* 
	 Выбрать id, email, password из таблицы users где email = переменной email И 
	 password = переменной password
	*/
	$result = mysqli_query($conn, "SELECT * FROM users WHERE (email = '$email' AND password = '$password')");

	// Если аккаунта не существует
	if (mysqli_num_rows($result) == 0) {
		echo "<b style='color:red'>Не верный логин или пароль!</b>";
	} else {
		foreach($result as $user) {
			// Создать сессию
			$_SESSION['user_data'] = [
				"isLogged" => TRUE,
				"id" => $user['id'],
				"username" => $user['username'],
				"role" => $user['role']
			];
		}
		// Редирект
		header('Location: ../pages/main.php');	
	}
}
?>