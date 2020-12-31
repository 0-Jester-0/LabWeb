<?php

require_once ("connect.php");

function search($query){
    $db = connect();

    $query = trim($query);
    $query = htmlspecialchars($query);

    if(!empty($query)){
        if(strlen($query) < 3){
            $msg = '<p>Слишком короткий запрос</p>';
        } elseif (strlen($query) > 128 ){
            $msg = '<p>Слишком длинный запрос</p>';
        } else {
            $q = "SELECT * FROM brand  WHERE id LIKE %query% OR name_brand LIKE %query% OR country LIKE %query%; 
            $result = mysql_query($q);
            
        }
    }
}

