<?php
session_start();
unset($_SESSION['user_data']);
header('Location: ../pages/login.php');