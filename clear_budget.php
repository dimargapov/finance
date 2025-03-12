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

if ($_SERVER['REQUEST_METHOD'])
    try {
        $sqlclear = "TRUNCATE TABLE income";
        $conn->exec($sqlclear);
        unset($_SESSION['BudgetData']);
        header('Location: budget.php');
        exit();
    }
    catch (PDOException $e) {
    echo "Ошибка".$e->getMessage();
    }
?>