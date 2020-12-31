<?php
session_start();

require_once ("connect.php");
define('SITE_KEY', '6LeL9QwaAAAAAMqf5cGir0M9vK9hUsWkU9AnL2ji');
define('SECRET_KEY', '6LeL9QwaAAAAAO32MI1IyMDuIgmCeaHVfhKvqgMJ');

if($_POST){
    function getCaptcha($SecretKey){
        $Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$SecretKey}");
        $Return = json_decode($Response);
        return $Return;
    }
    $Return = getCaptcha($_POST['g-recaptcha-response']);
    //var_dump($Return);
    if($Return->success == true && $Return->score > 0.5){
        $capcha = true;
    }else{
        $capcha = false;
    }
}
if($capcha) {
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

    $db = connect();
    $sth = $db->prepare("SELECT * FROM users WHERE login = :login AND email = :email");
    $sth->bindParam(':login', $login);
    $sth->bindParam(':email', $email);
    $sth->execute();
    foreach ($sth as $result) {
        if ($result != NULL) {
            $_SESSION['message'] = 'Пользователь с таким логином или email уже существует!';
            header('Location: ../pages/registration.php');
            exit();
        }
    }

    $sth1 = $db->prepare("INSERT INTO users (email, login, password, name) VALUES(:email, :login, :password, :name)");
    $sth1->bindParam(':email', $email);
    $sth1->bindParam(':login', $login);
    $sth1->bindParam(':password', $pass);
    $sth1->bindParam(':name', $name);
    $sth1->execute();
    $_SESSION['message'] = 'Регистрация прошла успешно!';
    header('Location: ../pages/auth.php');
} else {
    $_SESSION['message'] = 'Проверка reCaptcha не пройдена!';
    header('Location: ../pages/registration.php');
    exit();
}

?>