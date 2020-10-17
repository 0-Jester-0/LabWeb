<?php
    session_start();
if($_SESSION['user']){
  header('Location: /index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Авторизация</title>

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
                <a class="nav-link" href="/pages/team.php">Наша команда</a>

            </nav>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                <button type="button" class="btn btn-light" onclick="window.location.href ='registration.php'"> Регистрация</button>
                </li>
            </ul>
    </div>
  </nav>
</div>
    </header>

    <div class="container_reg">
        <form  class="auth-form" action="../php/sign_in.php" method="post">
            <h2>Авторизация</h2><br>
            <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"><br>
            <button class="btn-auth" type="submit">Войти</button>
            <?php
                if ($_SESSION['message'])
                {
                    echo '<p class="msg-err">' .$_SESSION['message']. '</p>';
                }
                    unset($_SESSION['message']);
                ?>
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
