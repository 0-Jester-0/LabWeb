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
                <a class="nav-link" href="auto.php">Список автомобилей</a>
                <a class="nav-link" href="owner.php">Список владельцев</a>
                <a class="nav-link" href="journal.php">Журнал </a>
                <a class="nav-link" href="team.php">Наша команда</a>
                <?php
                endif;
                ?>
            </nav>
            <ul class="nav justify-content-end">
            <li class="nav-item">
            <?php if (!empty($_COOKIE['user'])) : ?>
                <a class="nav-link" href="auth.php">Вход</a>
            <?php endif;?> 
                </li>
                <li class="nav-item">
                <button type="button" class="btn btn-light" onclick="window.location.href ='registration.php'"> Регистрация</button>
                </li>
            </ul>
    </div>
  </nav>
</div>
        <!--<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000000;">
            <div class="container">
                <div class="cap">
                    <a class="navbar-brand" href="/index.php">
                        <img src="img/Logo.jpg" width="30" height="30" class="d-inline-block align-top" alt=""
                            loading="lazy">
                        AutoBox</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <nav class="navbar-nav">
                            <a class="nav-link" href="auto.php">Список автомобилей</a>
                            <a class="nav-link" href="owner.php">Список владельцев</a>
                            <a class="nav-link" href="journal.php">Журнал </a>
                            <a class="nav-link" href="team.php">Наша команда</a>
                        </nav>
                    </div>
                </div>
            </div>
        </nav>-->
    </header>

    <div class="container_reg">
        <h2>Авторизация</h2><br>
        <form action="/php/sign_in.php" method="post">
            <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"><br>
            <button class="btn btn-success" type="submit">Войти</button>
        </form>
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
