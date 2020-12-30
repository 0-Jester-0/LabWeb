<?php
session_start();

require_once ("connect.php");

$db = connect();
$id = $_POST['id'];
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

$sth = $db->prepare("UPDATE brand SET name_brand = :name_brand, country = :country WHERE brand.id = :id");
$sth->bindParam(':name_brand', $name_brand);
$sth->bindParam(':country', $country);
$sth->bindParam(':id', $id);
$sth->execute();

$_SESSION['message'] = 'Данные успешно обновлены';
header('Location: ../pages/adminpanel.php');

?>