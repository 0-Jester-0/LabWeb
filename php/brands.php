<?php
session_start();

require_once ("connect.php");

$name_brand = $_POST['name_brand'];
$country = $_POST['country'];
if(mb_strlen($name_brand) < 3){
    $_SESSION['message'] = 'Название марки автомобиля должно содержать минимум 3 символа!';
    header('Location: ../pages/adminpanel.php');
}

if(mb_strlen($country) < 2){
    $_SESSION['message'] = 'Название страны изготовителя должно содержать минимум 2 символа!';
    header('Location: ../pages/adminpanel.php');
}

$db = connect();
$sth = $db->prepare("INSERT INTO brand (name_brand, country) VALUES(:name_brand, :country)");
$sth->bindParam(':name_brand', $name_brand);
$sth->bindParam(':country', $country);
$sth->execute();

$_SESSION['message'] = 'Марка успешно добавлена!';
header('Location: ../pages/adminpanel.php');

$db = null;
?>
