<?php

session_start();

$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);

$pass = md5($pass."fghkiju7y6");

$mysql = new mysqli('localhost', 'root', 'root', 'autobox');

$result = $mysql->query("SELECT * FROM `users` WHERE `login`= '$login' AND `password`='$pass'");
$user = $result->fetch_assoc();
if(mysqli_num_rows($result) < 1)
{
  $_SESSION['message'] = 'Неверный логин или пароль!';
  header('Location: ../pages/auth.php');
  exit();
}

$_SESSION ['user'] = [
  "name" => $user['name'],
  "login" => $user['login'],
  "email" => $user['email']
];



print_r($user);

setcookie('user', $user['name'],time() + 3600 * 24 * 7 , "/");
$mysql->close();

header('Location: /index.php');

?>
