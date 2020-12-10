<?php
session_start();

require_once 'connect.php';

$brand = filter_var(trim($_POST['brand']), FILTER_SANITIZE_STRING);
$model = filter_var(trim($_POST['model']), FILTER_SANITIZE_STRING);
$color = filter_var(trim($_POST['color']), FILTER_SANITIZE_STRING);
$path = 'img/' . time() . $_FILES['image']['name'];
if(strlen($brand) < 3){
    $_SESSION['message'] = 'Название марки автомобиля должно содержать минимум 3 символа!';
    header('Location: ../pages/adminpanel.php');
}
elseif(strlen($model) < 2 || strlen($color) < 2){
    $_SESSION['message'] = 'Название модели/цвета автомобиля должно содержать минимум 2 символа!';
    header('Location: ../pages/adminpanel.php');
}elseif (move_uploaded_file($_FILES['image']['tmp_name'], '../' . $path)) {
        $_SESSION['message'] = 'Ошибка при загрузке изображения';
        header('Location: ../pages/adminpanel.php');
}
else{
    $mysql->query("INSERT INTO `cars` (`image`, `brand`, `model`, `color`) VALUES('$path', '$brand', '$model', '$color')");
    $_SESSION['message'] = 'Автомобиль успешно добавлен!';
    header('Location: ../pages/adminpanel.php');
}

$mysql->close();
?>