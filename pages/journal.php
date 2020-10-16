<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Журнал потока</title>

  <link rel = "icon" href = "../img/Logo.jpg" type = "image/x-icon">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
    integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

  <!--CSS-->
  <link href="https://fonts.googleapis.com/css2?family=Play&family=Quantico:ital@1&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<div class="container">
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000000;">
    <div class="container-fluid">
    <a class="navbar-brand" href="/index.php ">
            <img src="../img/Logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
            AutoBox</a>
            <nav class="nav">
                <a class="nav-link" href="/pages/auto.php">Список автомобилей</a>
                <a class="nav-link" href="/pages/owner.php">Список владельцев</a>
                <a class="nav-link" href="/pages/journal.php">Журнал </a>
                <a class="nav-link" href="/pages/team.php">Наша команда</a>
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
                <li class="nav-item" ><h6 class="hello-title">Привет, <?= $_SESSION['user']['login'] ?></h6></li>
                <li class="nav-item"><a class="nav-link" href="/pages/lk.php" >Личный кабинет</a><li>
                <li class="nav-item">
                <button type="button" class="btn btn-light" onclick="window.location.href ='/php/exit.php'">Выход</button>
                </li>
                <?php endif; ?>
            </ul>
    </div>
  </nav>
</div>
  </header>
  <section>
      <h3 class="title-page_3">Журнал потока</h3>
      <div class="container-table">      
        <table class="table">
            <tr>
                <th> № </th>
                <th>ФИО Владельца</th>
                <th>Марка автомобиля</th>
                <th> Статус </th>
            </tr>
            <tr class="table-in">
              <td>1</td>
              <td>Петров А.С.</td>
              <td>Porche Cayman</td>
              <td>Прибыл</td>
            </tr>
            <tr class="table-in">
              <td>2</td>
              <td>Парамонов И.А.</td>
              <td>Chevrolet Camaro</td>
              <td>Прибыл</td>
            </tr>
            <tr class="table-out">
              <td>3</td>
              <td>Иванова Е.С.</td>
              <td>Toyota Camry</td>
              <td>Ушел</td>
            </tr>
            <tr class="table-static">
              <td>4</td>
              <td>Кашин Н.П.</td>
              <td>BMW M5</td>
              <td>В гараже</td>
            </tr>
            <tr class="table-static">
              <td>5</td>
              <td>Зайцева К.Н.</td>
              <td>Mazda CX-5</td>
              <td>В гараже</td>
            </tr>
            <tr class="table-out">
              <td>6</td>
              <td>Белкин С.А.</td>
              <td>Nissan GTR</td>
              <td>Ушел</td>
            </tr>
            <tr class="table-in">
              <td>7</td>
              <td>Никитин Е.А.</td>
              <td>Toyota Mark</td>
              <td>Прибыл</td>
            </tr>
            <tr class="table-out">
              <td>8</td>
              <td>Ложкарева Н.Н.</td>
              <td>Subaru Impreza</td>
              <td>Ушел</td>
            </tr>
            <tr class="table-static">
              <td>9</td>
              <td>Артемьев А.И.</td>
              <td>Ford Mustang</td>
              <td>В гараже</td>
            </tr>
            <tr class="table-in">
              <td>10</td>
              <td>Пилипенко Д.И.</td>
              <td>Lamborghini Aventador</td>
              <td>Прибыл</td>
            </tr>
      </table>
    </div>
  </section>
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