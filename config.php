<?php

function conectar()
{


    $conn = new PDO ("mysql:dbname=;host=","","");
    return $conn;

}
 ?>
