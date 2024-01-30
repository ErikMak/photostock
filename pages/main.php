<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Главная страница</title>
	<link href="/files/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap -->
	<link href="/files/bootstrap-reboot.min.css" rel="stylesheet"> <!-- Bootstrap Reboot -->
	<link href="/styles.css" rel="stylesheet"> <!-- Styles -->
</head>
<body>
<?php
session_start();
require '../requests/db.php';
// Ограничение доступа неавторизованным пользователям
if(!$_SESSION['user_data']) {
	header('Location: login.php');
}
?>
	<nav class="navbar">
	  <div class="container-fluid justify-content-between align-items-center px-4">
	    <a class="navbar-brand text-white"><b>PhotoStock</b></a>
	    <ul class="navbar-nav">
	    	<li class="nav-item me-3">
	          <a class="nav-link" href="upload.php">Опубликовать</a>
	        </li>
	    </ul>
<?php 
$user_id = $_SESSION['user_data']['id'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$user_id'"); ?>
<?php foreach ($result as $user): ?>
<?php if($user['role'] == 2) : ?>
	    <ul class="navbar-nav">
	    	<li class="nav-item">
	          <a class="nav-link" href="admin_page.php">Админ-панель</a>
	        </li>
	    </ul>
<?php endif; ?>
	    <div class="d-flex align-items-center nav-profile-control ms-auto">
	    	<span class="me-2"><i class="fas fa-user-alt" style="font-size: 0.8em"></i></span>
	    	<p class="fw-semibold text-decoration-underline text-white mb-0 me-3"><? echo $user['username']?></p>
<?php endforeach ?>
	    	<a class="fw-semibold" href="/requests/logout.php">выйти</a>
	    </div>
	  </div>
	</nav>
	<div class="container">
		<main class="col-lg-9 py-4 mx-auto">
			<div class="row row-card mb-4">
				<?php 
					$result = mysqli_query($conn, "SELECT * FROM photos ORDER BY RAND() LIMIT 1");
					foreach ($result as $photo):
						// pic_id - id картинки в базе данных
						$pic_id = $photo["id"];
				?>
				<div class="img-header d-flex mb-2">
					<h5 class="fw-semibold mb-0 me-1"><? echo $photo["name"] ?></h5>
					<i class="mx-1" style="color: #7c7e7d">&#8226;</i>
					<h5 class="fw-semibold mb-0 ms-1" style="color: #7c7e7d"><? echo $photo["author"] ?></h5>
				</div>
				<div class="img-container mb-2">
					<img src="../uploads/<? echo $photo["filename"] ?>" class="img-fluid">
				</div>
				<div class="img-footer d-flex justify-content-between align-items-center">
					<small>Добавлено&nbsp;&mdash;&nbsp;<? echo $photo["timest"] ?></small>
					<small><a href="../uploads/<? echo $photo["filename"]?>" class="text-decoration-underline">Открыть в оригинале</a></small>
				</div>
				<?php endforeach ?>
			</div>
			<div class="row mb-3">
				<div class="col comments-header py-3 px-4 rounded me-3 position-relative">
					<div class="d-flex justify-content-between">
						<h6 class="fw-semibold text-white mb-0">Комментарии</h6>
						<span class="text-white">

						</span>
					</div>
				</div>
				<div class="col-auto comments-header rounded position-relative" style="width: 56px;">
					<span class=""><a class=" py-3 ps-2 text-white position-absolute" id="addComment" href="#" data-bs-toggle="modal" data-bs-target="#addCommentModal">+</a></span>
				</div>
			</div>
			<div class="row">
				<?php 
				/* 
				  Система комментариев: вывод из таблицы comments комментариев, где photo_id = текущему 
				  id картинки (заранее записали id в переменную pic_id в
				  ыше)
				*/
				  $result = mysqli_query($conn, "SELECT * FROM comments WHERE photo_id = '$pic_id'");
				foreach ($result as $comment):
				?>
				<div class="comments-item py-3 px-4 rounded mb-3"> 
					<div class="row">
						<div class="col">
							<b><? echo $comment["username"] ?></b>
							<p class="mb-0"><? echo $comment["txt"] ?></p>
						</div>
					</div>
				</div>
				<?php endforeach ?>
			</div>
		</main>
	</div>
	<div class="modal fade" id="addCommentModal" tabindex="-1" aria-labelledby="addCommentLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title fw-semibold" id="addCommentLabel">Добавить комментарий</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        <form action="../requests/send-comment.php" method="post">
	          <input class="form-control visually-hidden" type="text" name="pic_id" value="<? echo $pic_id; ?>" readonly>
			  <label class="form-label">Текст комментария:</label>
			  <textarea class="form-control mb-3" id="text-comment" rows="3" name="text"></textarea>
			  <button type="submit" name="Submit" class="btn btn-primary">Отправить</button>
			</form>
	      </div>
	    </div>
	  </div>
	</div>
</body>
<script src="/files/bootstrap.bundle.min.js"></script> <!--Bootstrap Bundle JS-->
<script src="/scripts/main.js"></script> <!-- JavaScript -->
</html>