<?php

session_start();
require_once ("connect.php");

$name_brand = $_GET['name_brand'];
$image =$_GET['image'];
$db=connect();
if ($image != NULL) {
    $link = "../img/$image";
    unlink($link);
}

$sth=$db->prepare("DELETE FROM cars WHERE cars.name_brand = :name_brand");
$sth->bindParam(":name_brand",$name_brand);
$sth->execute();

$sth=$db->prepare("DELETE FROM brand WHERE brand.name_brand = :name_brand");
$sth->bindParam(":name_brand",$name_brand);
$sth->execute();

header('Location: ../pages/adminpanel.php');
?>
