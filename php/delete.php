<?php

session_start();
require_once ("connect.php");

$id = $_GET['id'];
$image=$_GET['image'];
$db=connect();
if ($image != NULL) {
    $link = "../img/$image";
    unlink($link);
}

$sth=$db->prepare("DELETE FROM cars WHERE cars.id = :id");
$sth->bindParam(":id",$id);
$sth->execute();

header('Location: ../pages/admin2.php');
?>