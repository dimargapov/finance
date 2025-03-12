<?php

$income = $_POST['income'];
$incomeCategory = $_POST['income_category'];
$incomeDate = $_POST['income_date'];

$db_host = "localhost";
$db_user = "root";
$db_password = "dimys2004";
$db_base = "finance";
$db_table = "income";

try {
    $conn = new PDO("mysql:host=localhost;dbname=finance", "root", "dimys2004");
    $data = array('income'=>$income, 'incomeCategory'=>$incomeCategory, 'incomeDate'=>$incomeDate);
    $query = $conn->prepare("INSERT INTO $db_table (INCOME, CATEGORY, INC_DATE) values (:income, :incomeCategory, :incomeDate)");
    $query->execute($data);
    $result = true;
}
catch (PDOException $e) {
    echo 'Connection Failed'.$e->getMessage();
}

if ($result) {
    $sql = "SELECT INCOME, CATEGORY, INC_DATE FROM income";
    $stmt = $conn->query($sql);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$results) {
            die("Ошибка выполнения запроса: " . implode(", ", $conn->errorInfo()));
    }
}

session_start();
$_SESSION['BudgetData'] = $results;
header('Location: budget.php');
exit();
?>