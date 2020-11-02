<?php

global $mysql;

$mysql = new mysqli('localhost', 'root', 'root', 'autobox');

if (!$mysql) {
    die('Error connect to database!');
}
