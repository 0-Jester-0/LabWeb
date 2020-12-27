<?php
session_start();

require_once 'connect.php';

$brand = $_POST['brand'];
$model = $_POST['model'];
$color = $_POST['color'];
$image = $_POST['image'];
if (!empty($_FILES['image']['name'])){
    $upload_dir = "../img/";
    $my_file = $_FILES['image'];
    $whitelist_type = array('image/jpeg','image/png', 'image/gif');
    if($my_file['error'] != UPLOAD_ERR_OK){
        echo "<p>Error!</p>";
        exit;
    }

    $file_name = preg_replace("/[^A-Z0-9._-]/i", "_", $my_file['name']);

    $i = 0;
    $parts = pathinfo($file_name);

    while(file_exists($upload_dir . $file_name)){
        $i++;
        $file_name = $parts['filename'] . "-" . $i . "." . $parts['extension'];
    }

    $upload_file = $upload_dir . basename($file_name);

    $check_file = false;

    for($k =0; $k < count($whitelist_type); $k++){
        if($my_file['type'] == $whitelist_type[$k]){
            $check_file = true;
            break;
        }
    }

    if($check_file){
        $success = move_uploaded_file($my_file['tmp_name'], $upload_file);
        if (!$success){
            echo "<p>Не удалось сохранить изображение!</p>";
            exit;
        }
    }
    else {
        echo "<p>Недопустимый формат файла!</p>";
    }
    chmod($upload_dir . $file_name, 0644);
}
if(mb_strlen($brand) < 3){
    $_SESSION['message'] = 'Название марки автомобиля должно содержать минимум 3 символа!';
    header('Location: ../pages/adminpanel.php');
}
elseif(mb_strlen($model) < 2 || mb_strlen($color) < 2){
    $_SESSION['message'] = 'Название модели/цвета автомобиля должно содержать минимум 2 символа!';
    header('Location: ../pages/adminpanel.php');
}
else{
    $mysql->query("INSERT INTO `cars` (`image`, `brand`, `model`, `color`) VALUES('$file_name', '$brand', '$model', '$color')");
    $_SESSION['message'] = 'Автомобиль успешно добавлен!';
    header('Location: ../pages/adminpanel.php');
}

$mysql->close();
?>