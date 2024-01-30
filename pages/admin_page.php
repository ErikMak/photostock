<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Админ-панель</title>
	<link href="/files/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap -->
	<link href="/files/bootstrap-reboot.min.css" rel="stylesheet"> <!-- Bootstrap Reboot -->
	<link href="/styles.css" rel="stylesheet"> <!-- Styles -->
</head>
<body>
<?php
session_start();
require '../requests/db.php';
// Ограничение доступа неавторизованным пользователям или без админ прав
if(!$_SESSION['user_data'] || $_SESSION['user_data']['role'] == 1) {
	header('Location: main.php');
}
?>
<nav class="navbar">
  <div class="container-fluid justify-content-between align-items-center px-4">
    <a class="navbar-brand text-white"><b>PhotoStock</b></a>
    <ul class="navbar-nav me-3">
    	<li class="nav-item">
          <a class="nav-link" href="upload.php">Опубликовать</a>
        </li>
    </ul>
<?php 
$user_id = $_SESSION['user_data']['id'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$user_id'"); ?>
<?php foreach ($result as $user): ?>
    <ul class="navbar-nav me-auto">
    	<li class="nav-item">
          <a class="nav-link" href="main.php">Главная</a>
        </li>
    </ul>
    <div class="d-flex align-items-center nav-profile-control">
    	<span class="me-2"><i class="fas fa-user-alt" style="font-size: 0.8em"></i></span>
    	<p class="fw-semibold text-decoration-underline text-white mb-0 me-3"><? echo $user['username']?></p>
<?php endforeach ?>
    	<a class="fw-semibold" href="/requests/logout.php">выйти</a>
    </div>
  </div>
</nav>
<div class="container">
	<main class="col-lg-10 py-4 mx-auto">
		<div class="row row-card mb-4">
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Название</th>
			      <th scope="col">Автор</th>
			      <th scope="col">Действие</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  		/* 
						Админ панель: вывод всех записей из таблицы photo, ссылки удаления с id записи в бд
			  		*/
					$result = mysqli_query($conn, "SELECT * FROM photos");
					foreach ($result as $row):
			  	?>
			    <tr>
			      <th scope="row">#</th>
			      <td><? echo $row["name"] ?></td>
			      <td><? echo $row["author"] ?></td>
			      <!-- id картинки передается в get запросе -->
			      <td><a class="link-danger delete-link text-decoration-underline" href="../requests/delete.php?item_id=<? echo $row['id']?>">Удалить</a></td>
			    </tr>
			    <?php endforeach ?>
			  </tbody>
			</table>
		</div>
	</main>
</div>
</body>
<script src="/files/bootstrap.bundle.min.js"></script> <!--Bootstrap Bundle JS-->
<script src="/scripts/main.js"></script> <!-- JavaScript -->
</html>