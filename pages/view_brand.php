<?php
session_start();
require_once ("../php/connect.php");

$brand_name = $_GET['name_brand'];
$db = connect();
$brands = $db -> prepare( "SELECT * FROM brand WHERE name_brand = :name_brand");
$brands -> bindParam(':name_brand',$brand_name);
$brands->execute();
$brand = $brands->fetch(PDO::FETCH_ASSOC);

$cars = $db -> prepare( "SELECT * FROM cars WHERE name_brand = :name_brand");
$cars->bindParam(':name_brand', $brand_name);
$cars->execute();

if (!$_SESSION['user']) {
    header('Location: ../pages/auth.php');
}
if ($_SESSION['user'] != 2) {
    header('Location: ../pages/lk.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Управление данными</title>

    <link rel="icon" href="../img/Logo.jpg" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <!--CSS-->
    <link href="https://fonts.googleapis.com/css2?family=Play&family=Quantico:ital@1&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000000;">
            <div class="container-fluid">
                <a class="navbar-brand" href="/index.php ">
                    <img src="../img/Logo.jpg" width="30" height="30" class="d-inline-block align-top" loading="lazy">
                    AutoBox</a>
                <nav class="nav">
                    <a class="nav-link" href="/pages/auto.php">Список автомобилей</a>
                    <a class="nav-link" href="/pages/owner.php">Список владельцев</a>
                    <a class="nav-link" href="/pages/journal.php">Журнал </a>
                    <a class="nav-link" href="/pages/team.php">Наша команда</a>
                </nav>
                <ul class="nav justify-content-end">
                    <?php
                    if (!isset($_SESSION['user'])) :
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/pages/auth.php">Вход</a>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-light" onclick="window.location.href ='/pages/registration.php'">Регистрация</button>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <h6 class="hello-title">Привет, <?= $_SESSION['array']['login'] ?></h6>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="/pages/lk.php">Личный кабинет</a>
                        <li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-light" onclick="window.location.href ='/php/logout.php'">Выход</button>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </div>
</header>
<div class="admin">
    <h2>Название бренда: <?= $brand['name_brand'] ?></h2>
    <h4>Страна: <?= $brand['country'] ?></h4>


    <table class="table">
        <tr>
            <th>ID</th>
            <th>IMAGE</th>
            <th>BRAND</th>
            <th>MODEL</th>
            <th>COLOR</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        while($auto = $cars->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?= $auto['id'] ?></td>
                <td><?= $auto['image'] ?></td>
                <td><?= $auto['name_brand'] ?></td>
                <td><?= $auto['model'] ?></td>
                <td><?= $auto['color'] ?></td>
                <td><a href="update.php?id=<?= $auto['id'] ?>&name_brand=<?= $brand['name_brand'] ?>">Обновить</a></td>
                <td><a style="color: #ff0000;" href="../php/delete.php?id=<?= $auto['id'] ?>&image=<?= $auto['image'] ?>">Удалить</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <button type="button" class="btn-auto" onclick="window.location.href ='adminpanel.php'">Марки автомобилей</button>
    <div class="container_reg">
        <form style="margin-top: 55px; background-color: rgba(0, 0, 0, 0.4); padding: 10px" class="register-form" name="register-form" id="register-form" action="../php/create.php" method="post" enctype="multipart/form-data">
            <h2>Добавление автомобиля</h2><br>
            <input type="hidden" name="name_brand" value="<?= $brand['name_brand'] ?>">
            <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
            <input type="file" class="form-control" name="image"><br>
            <label style="color:white; text-align: left;" for="color">Модель автомобиля * <span id="md"></span></label>
            <input type="text" class="form-control" name="model" id="md" onBlur="validationModel()" placeholder="Введите модель автомобиля"><br>
            <label style="color:white; text-align: left;    " for="color">Цвет автомобиля * <span id="cl"></span></label>
            <input type="text" class="form-control" name="color" id="cl" onBlur="validationColor()" placeholder="Введите цвет автомобиля"><br>
            <button class="btn-reg" onclick="checkall()" type="submit">Добавить</button>
            <?php
            if ($_SESSION['message']) {
                echo '<p class="msg-err">' . $_SESSION['message'] . '</p>';
            }
            unset($_SESSION['message']);
            ?>
        </form>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- Popper.js first, then Bootstrap JS -->
<script>
    function validationModel() {
        var x = document.forms["register-form"]["model"].value;
        if (x.length < 2) {
            document.getElementById('md').innerHTML = '(мин. 2 символа)';
            return false;
        } else {
            document.getElementById('md').innerHTML = '';
            return true;
        }
    }
    function validationColor() {
        var x=document.forms["register-form"]["color"].value;
        if (x.length < 2) {
            document.getElementById('cl').innerHTML = '(мин. 2 символа)';
            return false;
        } else {
            document.getElementById('cl').innerHTML = '';
            return true;
        }
    }
    function checkall(){
        if(validationBrand() && validationModel() && validationColor() ) return true;
        else return false;
    }
</script>
<script src=" https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
</script>
</body>

</html>
