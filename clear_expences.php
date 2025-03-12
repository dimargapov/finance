<?php

$db_host = "localhost";
$db_user = "root";
$db_password = "dimys2004";
$db_base = "finance";
$db_table = "expences";

try {
    $conn = new PDO("mysql:host=localhost;dbname=finance", "root", "dimys2004");
}
catch (PDOException $e) {
    echo 'Connection Failed'.$e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'])
    try {
        $sqlclear = "TRUNCATE TABLE expences";
        $conn->exec($sqlclear);
        unset($_SESSION['ExpenceData']);
        header('Location: expences.php');
        exit();
    }
    catch (PDOException $e) {
        echo "Ошибка".$e->getMessage();
    }
?>