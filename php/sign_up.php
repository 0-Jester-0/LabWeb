<?php
session_start();

require_once 'connect.php';

$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
$pass2 = filter_var(trim($_POST['pass2']), FILTER_SANITIZE_STRING);

if ($pass != $pass2) {
  $_SESSION['message'] = 'Пароли не совпадают';
  header('Location: ../pages/registration.php');
  exit();
}

$pass = md5($pass . "fghkiju7y6");

$result = $mysql->query("SELECT * FROM `users` WHERE `login`= '$login' AND `email`='$email'");
$user = $result->fetch_assoc();
if (mysqli_num_rows($result) > 0) {
  $_SESSION['message'] = 'Пользователь с таким логином или email уже существует!';
  header('Location: ../pages/registration.php');
  exit();
}

$mysql->query("INSERT INTO `users` (`email`, `login`, `password`, `name`) VALUES('$email', '$login', '$pass', '$name')");
$_SESSION['message'] = 'Регистрация прошла успешно!';
header('Location: ../pages/auth.php');

$mysql->close();

header('Location: ../pages/auth.php');
