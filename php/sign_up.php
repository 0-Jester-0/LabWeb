<?php

$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);


if(mb_strlen($email) < 5 || mb_strlen($email) > 50) {
    echo "Недопустимая длина Email";
    exit();
} else if(mb_strlen($name) < 2 || mb_strlen($email) > 50) {
    echo "Недопустимая длина имени";
    exit(); 
} else if(mb_strlen($login) < 2 || mb_strlen($login) > 50) {
    echo "Недопустимая длина логина";
    exit();
} else if(mb_strlen($pass) < 2 || mb_strlen($pass) > 10) {
    echo "Недопустимая длина пароля (от 2 до 10 символов)";
    exit();
}

$pass = md5($pass."fghkiju7y6");

$mysql = new mysqli('localhost', 'root', 'root', 'autobox');
$mysql->query("INSERT INTO `users` (`email`, `login`, `password`, `name`) VALUES('$email', '$login', '$pass', '$name')");

$mysql->close();

header('Location: /');
?>
