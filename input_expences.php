<?php

$expence = $_POST['expences'];
$expenceCategory = $_POST['expences_category'];
$expenceDate = $_POST['expences_date'];

$db_host = "localhost";
$db_user = "root";
$db_password = "dimys2004";
$db_base = "finance";
$db_table = "expences";

try {
    $conn = new PDO("mysql:host=localhost;dbname=finance", "root", "dimys2004");
    $data = array('expence'=>$expence, 'expenceCategory'=>$expenceCategory, 'expenceDate'=>$expenceDate);
    $query = $conn->prepare("INSERT INTO $db_table (expence, exp_category, exp_date) values (:expence, :expenceCategory, :expenceDate)");
    $query->execute($data);
    $result = true;
}
catch (PDOException $e) {
    echo 'Connection Failed'.$e->getMessage();
}

if ($result) {
    $sql = "SELECT expence, exp_category, exp_date FROM expences";
    $stmt = $conn->query($sql);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$results) {
        die("Ошибка выполнения запроса: " . implode(", ", $conn->errorInfo()));
    }
}

session_start();
$_SESSION['ExpenceData'] = $results;
header('Location: expences.php');
exit();
?>