<?php

session_start();

require_once ("connect.php");

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

$pass = md5($pass . "fghkiju7y6");

$db = connect();
$sth = $db->prepare("SELECT * FROM users WHERE login = :login AND password = :password");
$sth -> bindParam(':login',$login);
$sth -> bindParam(':password',$pass);
$sth -> execute();
foreach ($sth as $user){
    if($user != NULL){
        $_SESSION['user'] = $user['id'];

        if (isset($_SESSION['user'])) {
            $_SESSION['array']  = [
                "name" => $user['name'],
                "login" => $user['login'],
                "email" => $user['email']
            ];

            header('Location: ../index.php');
            exit();
        }
    }

}
$_SESSION['message'] = 'Неверный логин или пароль!';
header('Location: ../pages/auth.php');
exit();

$db = null;

?>