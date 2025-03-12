<?php

$db_host = "localhost";
$db_user = "root";
$db_password = "dimys2004";
$db_base = "finance";
$db_table = "income";

try {
    $conn = new PDO("mysql:host=localhost;dbname=finance", "root", "dimys2004");
}
catch (PDOException $e) {
    echo 'Connection Failed'.$e->getMessage();
}






?>