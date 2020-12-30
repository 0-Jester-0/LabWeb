<?php
session_start();

require_once ("connect.php");

$db = connect();
$id = $_POST['id'];
$name_brand = $_POST['name_brand'];
$model = $_POST['model'];
$color = $_POST['color'];
$image = $_POST['image'];

if (mb_strlen($name_brand) < 3) {
    $_SESSION['message'] = 'Название марки автомобиля должно содержать минимум 3 символа!';
    header('Location: ../pages/view_brand.php?name_brand=' . $name_brand );
}
if (mb_strlen($model) < 2 || mb_strlen($color) < 2) {
    $_SESSION['message'] = 'Название модели/цвета автомобиля должно содержать минимум 2 символа!';
    header('Location: ../pages/view_brand.php?name_brand=' . $name_brand);
}
if($_POST['Del'] == true) {
    if ($image != NULL) {
        $link = "../img/$image";
        unlink($link);
    }
    $image = NULL;
    $sth = $db->prepare("UPDATE cars SET  image = :file_name, name_brand = :name_brand, model = :model, color = :color WHERE cars.id = :id");
    $sth->bindParam(':image', $file_name);
    $sth->bindParam(':name_brand', $name_brand);
    $sth->bindParam(':model', $model);
    $sth->bindParam(':color', $color);
    $sth->bindParam(':id', $id);
    $sth->execute();

    $_SESSION['message'] = 'Данные успешно изменены!';
    header('Location: ../pages/view_brand.php?name_brand=' . $name_brand);
}
    elseif(!empty($_FILES['image']['name'])) {
        if ($image != NULL) {
            $link = "../img/$image";
            unlink($link);
        }
        $upload_dir = "../img/";
        $my_file = $_FILES['image'];
        $whitelist_type = array('image/jpeg', 'image/png', 'image/gif');
        $file_name = preg_replace("/[^A-Z0-9._-]/i", "_", $my_file['name']);
        $i = 0;
        $parts = pathinfo($file_name);

        while (file_exists($upload_dir . $file_name)) {
            $i++;
            $file_name = $parts['filename'] . "-" . $i . "." . $parts['extension'];
        }

        $upload_file = $upload_dir . basename($file_name);
        $check_file = false;

        for ($k = 0; $k < count($whitelist_type); $k++) {
            if ($my_file['type'] == $whitelist_type[$k]) {
                $check_file = true;
                break;
            }
        }

        if ($check_file) {
            $success = move_uploaded_file($my_file['tmp_name'], $upload_file);
            if (!$success) {
                echo "<p>Не удалось сохранить изображение!</p>";
                exit;
            }
            chmod($upload_dir . $file_name, 0644);

            $sth = $db->prepare("UPDATE cars SET  image = :file_name, name_brand = :name_brand, model = :model, color = :color WHERE cars.id = :id");
            $sth->bindParam(':file_name', $file_name);
            $sth->bindParam(':name_brand', $name_brand);
            $sth->bindParam(':model', $model);
            $sth->bindParam(':color', $color);
            $sth->bindParam(':id', $id);
            $sth->execute();

            $_SESSION['message'] = 'Данные успешно изменены!';
            header('Location: ../pages/view_brand.php?name_brand=' . $name_brand);
        } else {
            echo "<p>Недопустимый формат файла!</p>";
        }
    } else {
    $sth = $db->prepare("UPDATE cars SET name_brand = :name_brand, model = :model, color = :color WHERE cars.id = :id");
    $sth->bindParam(':name_brand', $name_brand);
    $sth->bindParam(':model', $model);
    $sth->bindParam(':color', $color);
    $sth->bindParam(':id', $id);
    $sth->execute();

    $_SESSION['message'] = 'Данные успешно изменены!';
    header('Location: ../pages/view_brand.php?name_brand=' . $name_brand);
    }

    //$mysql->query("UPDATE `cars` SET  `image` = '$file_name', `brand` = '$brand', `model` = '$model', `color` = '$color' WHERE `cars`.`id` = '$id'");
    //$_SESSION['message'] = 'Данные успешно изменены!';
    //header('Location: ../pages/adminpanel.php');

?>