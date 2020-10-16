<?php

$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);

$pass = md5($pass."fghkiju7y6");

$mysql = new mysqli('localhost', 'root', 'root', 'autobox');

$result = $mysql->query("SELECT * FROM `users` WHERE `login`= '$login' AND `password`='$pass'");
$user = $result->fetch_assoc();
if (count($user) == 0) {
  echo "Такого пользователя не существует!";
  exit();
}

/*print_r($user);*/

setcookie('user', $user['name'], time() + 3600 * 24 * 7, "/");
$mysql->close();

header('Location: /index.php');

?>
