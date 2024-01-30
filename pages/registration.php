<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Регистрация</title>
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
				<!-- onsubmit вернув false предотвратит отправку формы -->
				<form id="signup" onsubmit="return signupAction();" action="../requests/signup.php" method="post">
				  <h5><b>Регистрация</b></h5>
				  <div class="mb-1">
				    <label class="form-label">Никнейм</label>
				    <input type="text" class="form-control" id="signup-username" name="username">
				    <small class="error-msg hide">error</small>
				  </div>
				  <div class="mb-1 d-flex align-items-center">
				  	<p class="mb-0 me-2">Роль</p>
				  	<select class="form-select form-select-sm" name="role">
					  <option value="1">Пользователь</option>
					  <option value="2">Администратор</option>
					</select>
				  </div>
				  <div class="mb-1">
				    <label class="form-label">E-mail адрес</label>
				    <input type="email" class="form-control" id="signup-email" name="email">
				    <small class="error-msg hide">error</small>
				  </div>
				  <div class="mb-1">
				    <label class="form-label">Пароль</label>
				    <input type="password" class="form-control" id="signup-pass" name="pass">
				    <small class="error-msg hide">error</small>
				  </div>
				  <div class="mb-1">
				    <label class="form-label">Повтор пароля</label>
				    <input type="password" class="form-control" id="signup-confirm-pass">
				    <small class="error-msg hide">error</small>
				  </div>
				  <p class="mb-2">Есть аккаунт? <a class="text-decoration-underline" href="login.php">Войти</a></p>
				  <button type="submit" name="Submit" id="signup-btn" class="btn btn-primary w-50">Зарегистрировать</button>
				</form>
			</div>
		</div>	
	</div>
</body>
<script src="/files/bootstrap.bundle.min.js"></script> <!--Bootstrap Bundle JS-->
<script src="/scripts/main.js"></script> <!-- JavaScript -->
</html>