<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Наша команда</title>

  <link rel = "icon" href = "../img/Logo.jpg" type = "image/x-icon">

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
    <h1 class="title-team-1">Наша команда</h1>
    <div class="container-team">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <h3 class="title-team">Наше руководство</h3>
            <div class="row">
              <div class="col">
                <div class="card" style="width: 18rem;">
                  <img src="https://www.firestock.ru/wp-content/uploads/2014/03/photodune-2567797.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <p class="card-text">Шапкин А.Г.<br> Должность: Директор компании<br> Основатель компании AutoBox</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card" style="width: 18rem;">
                  <img src="http://crt.gotoural.com/uploads/post/image/1273/xlarge_e5155c0eee1cf805c089cccb00ccde51.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <p class="card-text">Жилякова А.Д.<br> Должность:Заместиель директора<br> Сооснователь компании</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card" style="width: 18rem;">
                  <img src="https://roz.ru/wp-content/uploads/2018/04/бизнесмен1-RGB.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <p class="card-text">Антонов С.Н.<br> Должность:Старший менеджер<br> Сооснователь компании</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <h3 class="title-team">Наши сторожи</h3>
            <div class="row">
              <div class="col">
                <div class="card" style="width: 18rem;">
                  <img src="https://mylists.ru/images/2019/08/09/2328/aptechnomu-skladu-trebujutsja-storozh_1.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <p class="card-text">Сазонов М.Л.<br>Должность: Старший сторож<br> Гараж №1</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card" style="width: 18rem;">
                  <img src="https://kinoeb.ru/_sf/14/64100182.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <p class="card-text">Бородач А.Р.<br>Должность: Младший сторож<br>Гараж №3</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card" style="width: 18rem;">
                  <img src="https://avatars.mds.yandex.net/get-zen_doc/1687249/pub_5f06c5a42a24f53e90f2e2c2_5f06c5fc9bbac006a2f29983/scale_1200" class="card-img-top" alt="...">
                  <div class="card-body">
                    <p class="card-text">Зубенко М.П.<br>Должность: Сторож<br> Гараж №2</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <h3 class="title-team">Наш рядовой персонал</h3>
            <div class="row">
              <div class="col">
                <div class="card" style="width: 18rem;">
                  <img src="https://impaka.ru/file.dyn?id=68163" class="card-img-top" alt="...">
                  <div class="card-body">
                    <p class="card-text">Железная А.П.<br>Должность: Диспетчер Колл-центра</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card" style="width: 18rem;">
                  <img src="https://pbs.twimg.com/media/EFI_8iNXkAASNsY.jpg:large" class="card-img-top" alt="...">
                  <div class="card-body">
                    <p class="card-text">Смирнов Н.О.<br>Должность: Электротехник</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card" style="width: 18rem;">
                  <img src="https://nehirceinsankaynaklari.files.wordpress.com/2015/09/bigstock-portrait-of-female-cleaner-in-71110690.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <p class="card-text">Михайлова П.А.<br>Должность: Работник Тех.персонала</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
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
