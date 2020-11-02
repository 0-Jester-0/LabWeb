<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: ../pages/auth.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Калькулятор</title>
    <link rel="icon" href="../img/Logo.jpg" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

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
                            <h6 class="hello-title">Привет, <?= $_SESSION['user']['login'] ?></h6>
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
    <div class="conateier">
        <h2>Калькулятор</h2>
        <div class="container-lg">
            <div class="item-input">
                <form class="form-calc" name="form">
                    <input class="input-calc" type="text" name="textview" readonly>
                </form>
            </div>
            <div class="item clean"><button class="btn-calc-width" onclick="clean()">C</button></div>
            <div class="item back"><button class="btn-calc-width" onclick="back()">&larr;</button></div>
            <div class="item"><button class="btn-calc" onclick="insert('+')">+</button></div>
            <div class="item"><button class="btn-calc" onclick="insert('-')">&minus;</button></div>
            <div class="item"><button class="btn-calc" onclick="insert('*')">&times;</button></div>
            <div class="item"><button class="btn-calc" onclick="insert('/')">&divide;</button></div>
            <div class="item"><button class="btn-calc" onclick="insert('7')">7</button></div>
            <div class="item"><button class="btn-calc" onclick="insert('8')">8</button></div>
            <div class="item"><button class="btn-calc" onclick="insert('9')">9</button></div>
            <div class="item"><button class="btn-calc" onclick="insert('(')">(</button></div>
            <div class="item"><button class="btn-calc" onclick="insert('4')">4</button></div>
            <div class="item"><button class="btn-calc" onclick="insert('5')">5</button></div>
            <div class="item"><button class="btn-calc" onclick="insert('6')">6</button></div>
            <div class="item"><button class="btn-calc" onclick="insert(')')">)</button></div>
            <div class="item"><button class="btn-calc" onclick="insert('1')">1</button></div>
            <div class="item"><button class="btn-calc" onclick="insert('2')">2</button></div>
            <div class="item"><button class="btn-calc" onclick="insert('3')">3</button></div>
            <div class="item equal"><button class="btn-calc-equal" onclick="equal()">=</button></div>
            <div class="item zero"><button class="btn-calc-width" onclick="insert('0')">0</button></div>
            <div class="item"><button class="btn-calc" onclick="insert('.')">.</button></div>
            <div style="margin-bottom: 5px;" class="item"><button class="btn-calc" onclick="factorial()">!</button></div>
            <div style="margin-bottom: 5px;" class="item"><button class="btn-calc" onclick="cvadr()">&sup2;</button></div>
            <div style="margin-bottom: 5px;" class="item"><button class="btn-calc" onclick="qube()">&sup3;</button></div>
            <div style="margin-bottom: 5px;" class="item"><button class="btn-calc" onclick="sqrt()">&radic;</button></div>
        </div>
    </div>
    < <!-- Optional JavaScript -->
        <!-- Popper.js first, then Bootstrap JS -->
        <script>
            function insert(num) {
                document.form.textview.value = document.form.textview.value + num;
            }

            function clean() {
                document.form.textview.value = "";
            }

            function back() {
                var exp = document.form.textview.value;
                document.form.textview.value = exp.substring(0, exp.length - 1);
            }

            function equal() {
                var exp = document.form.textview.value;
                if (exp) {
                    document.form.textview.value = eval(exp);
                }
            }

            function sqrt() {
                var exp = document.form.textview.value;
                if (exp) {
                    document.form.textview.value = Math.sqrt(eval(exp));
                }
            }

            function cvadr() {
                var exp = document.form.textview.value;
                if (exp) {
                    document.form.textview.value = Math.pow(eval(exp), 2);
                }
            }

            function qube() {
                var exp = document.form.textview.value;
                if (exp) {
                    document.form.textview.value = Math.pow(eval(exp), 3);
                }
            }

            function factorial() {
                var exp = 1;
                var n = document.form.textview.value;
                while (n) {
                    exp *= n--;
                }
                document.form.textview.value = eval(exp);
            }
        </script>
        <script src=" https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
        </script>
</body>

</html>