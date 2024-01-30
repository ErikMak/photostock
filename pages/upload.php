<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Загрузить фото</title>
	<link href="/files/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap -->
	<link href="/files/bootstrap-reboot.min.css" rel="stylesheet"> <!-- Bootstrap Reboot -->
	<link href="/styles.css" rel="stylesheet"> <!-- Styles -->
</head>
<body>
<?php
	session_start();
	// Ограничение доступа неавторизованным пользователям
	if(!$_SESSION['user_data']) {
		header('Location: login.php');
	}
?>
	<div class="container">
		<div class="col">
			<div class="row mx-auto" style="width: 30%; margin-top: 5%">
				<form action="../requests/upload-file.php" method="POST" enctype="multipart/form-data">
				  <h5><b class="fw-semibold">Загрузка фото</b></h5>
				  <div class="mb-3">
				    <label class="form-label">Название</label>
				    <input type="text" class="form-control" name="name">
				  </div>
				  <div class="mb-1">
					 <label class="form-label">Добавить файл</label>
					 <input class="form-control" type="file" name="image" accept="image/*">
				  </div>
				  <p class="mb-2">Вернуться назад? <a class="text-decoration-underline" href="main.php">Главная</a></p>
				  <button type="submit" name="Submit" class="btn btn-primary w-50">Загрузить</button>
				</form>
			</div>
		</div>	
	</div>
</body>
<script src="/files/bootstrap.bundle.min.js"></script> <!--Bootstrap Bundle JS-->
<script src="/scripts/main.js"></script> <!-- JavaScript -->
</html>