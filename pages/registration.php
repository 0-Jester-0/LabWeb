<?php
session_start();
if ($_SESSION['user']) {
    header('Location: ../pages/lk.php');
    define('SITE_KEY', '6LeL9QwaAAAAAMqf5cGir0M9vK9hUsWkU9AnL2ji');
    define('SECRET_KEY', '6LeL9QwaAAAAAO32MI1IyMDuIgmCeaHVfhKvqgMJ');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Регистрация</title>

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
                        <img src="../img/Logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                        AutoBox</a>
                    <nav class="nav">
                        <a class="nav-link" href="/pages/team.php">Наша команда</a>
                    </nav>
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="../pages/auth.php">Вход</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div class="container_reg">
        <form class="register-form" action="../php/sign_up.php" method="post">
            <h2>Регистрация</h2><br>
            <input type="email" class="form-control" name="email" id="email" placeholder="Введите email" required><br>
            <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин" required><br>
            <input type="text" class="form-control" name="name" id="name" placeholder="Введите имя" required><br>
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"><br>
            <input type="password" class="form-control" name="pass2" id="pass2" placeholder="Подтвердите пароль" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"><br>
            <input type="hidden" id="recaptcha" name="recaptcha" /><br >
            <button class="btn-reg" type="submit">Зарегистрироваться</button>
            <?php
            if ($_SESSION['message']) {
                echo '<p class="msg-err">' . $_SESSION['message'] . '</p>';
            }
            unset($_SESSION['message']);
            ?>
        </form>
        <script src='https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>'></script>
        <script>
            grecaptcha.ready(function() {
                grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'homepage'})
                    .then(function(token) {
                        //console.log(token);
                        document.getElementById('recaptcha').value=token;
                    });
            });
        </script>
    </div>

    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="../JS/script.js"></script>
    <script src=" https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
</body>

</html>