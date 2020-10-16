<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>AutoBox</title>

  <link rel="icon" href="../img/Logo.jpg" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
    integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

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
            <img src="../img/Logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
            AutoBox</a>
            <nav class="nav">
            <?php
                if (!empty($_COOKIE['user'])) :
              ?>
                <a class="nav-link" href="/pages/auto.php">Список автомобилей</a>
                <a class="nav-link" href="/pages/owner.php">Список владельцев</a>
                <a class="nav-link" href="/pages/journal.php">Журнал </a>
                <a class="nav-link" href="/pages/team.php">Наша команда</a>
                <?php
                endif;
                ?>
            </nav>
            <ul class="nav justify-content-end">
            <?php
                if (empty($_COOKIE['user'])) :
              ?>
            <li class="nav-item">
                <a class="nav-link" href="/pages/auth.php">Вход</a>
                </li>
                <li class="nav-item">
                <button type="button" class="btn btn-light" onclick="window.location.href ='/pages/registration.php'">Регистрация</button>
                </li>
                <?php else : ?>
                <li class="nav-item" ><h6>Привет,<br><?= $_COOKIE['user'] ?></h6></li>
                <li class="nav-item">
                <button type="button" class="btn btn-light" onclick="window.location.href ='/php/exit.php'">Выход</button>
                </li>
                <?php endif; ?>
            </ul>
    </div>
  </nav>
</div>
  </header>
  <div class="container-lk"> 
  <?php
$mysql = new mysqli('localhost','root','root','autobox');
$name = $_COOKIE['user'];
$result= $mysql->query("SELECT `email`, `login` FROM `users` WHERE `name` = '$name'");
$arr=$result->fetch_assoc();
$email=$arr['email'];
$login = $arr['login'];

?> 
<table class="table">
  <thead>
    <tr>
      <th><h3>Личный кабинет</h3></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><h6>Имя:</h6><?= $_COOKIE['user'] ?></td>
    <tr>
      <td><h6>Логин:</h6><?=$login?></td>
    </tr>
    <tr>
      <td><h6>Email:</h6><?=$email?></td>
    </tr>
  </tbody>
</table>
  </div>


  <!-- Optional JavaScript -->
  <!-- Popper.js first, then Bootstrap JS -->
  <script src=" https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
    integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
  </script>
</body>

</html>