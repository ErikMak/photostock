<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Авторизация</title>
	<link href="/files/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap -->
	<link href="/files/bootstrap-reboot.min.css" rel="stylesheet"> <!-- Bootstrap Reboot -->
	<link href="/styles.css" rel="stylesheet"> <!-- Styles -->
</head>
<body>
<? 
session_start();
// Ограничение доступа авторизованным пользователям
if($_SESSION['user_data']) {
	header('Location: main.php');
}
?>
	<div class="container">
		<div class="col">
			<div class="row mx-auto" style="width: 30%; margin-top: 5%">
				<form action="../requests/signin.php" method="post">
				  <h5><b>Авторизация</b></h5>
				  <div class="mb-3">
				    <label class="form-label">E-mail адрес</label>
				    <input type="email" class="form-control" name="email">
				  </div>
				  <div class="mb-3">
				    <label class="form-label">Пароль</label>
				    <input type="password" class="form-control" name="pass">
				  </div>
				  <p class="mb-2">Нет аккаунта? <a class="text-decoration-underline" href="registration.php">Регистрация</a></p>
				  <button type="submit" name="Submit" id="signin-btn" class="btn btn-primary w-50">Войти</button>
				</form>
			</div>
		</div>	
	</div>
</body>
<script src="/files/bootstrap.bundle.min.js"></script> <!--Bootstrap Bundle JS-->
<script src="/scripts/main.js"></script> <!-- JavaScript -->
</html>