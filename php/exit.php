<?php
    session_start();
    setcookie('user', $user['name'], time() - 3600 * 24 * 7, "/");
    unset($_SESSION['message']);
    header('Location: ../index.php');
?>