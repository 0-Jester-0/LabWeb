<?php
function connect(){
    $host = 'localhost';
    $dbname = 'autobox';
    $user = 'root';
    $pass = 'root';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
    $option = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $db=new PDO($dsn,$user,$pass,$option);
    return $db;
}
?>