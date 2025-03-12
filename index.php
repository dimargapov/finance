<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Отслеживание трат!</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
require "TotalBudget.php";

$sumsql = "SELECT SUM(COALESCE(INCOME, 0)) AS TotalIncome FROM income";
$sumBudget = $conn->query($sumsql);
if ($sumBudget) {
    $row = $sumBudget->fetch(PDO::FETCH_ASSOC);
} else {
    echo "Ошибка выполнения запроса: " . $conn->errorInfo()[2];
}

$sumSqlExp = "SELECT SUM(COALESCE(expence, 0)) AS TotalExpences FROM expences";
$sumExp = $conn->query($sumSqlExp);
if ($sumExp) {
    $rowExp = $sumExp->fetch(PDO::FETCH_ASSOC);
        if ($row['TotalIncome'] > 0) {
            $row['TotalIncome'] -= $rowExp['TotalExpences'];
        }
}
else {
    echo "Ошибка выполнения запроса: " . $conn->errorInfo()[2];
}



?>
<div class="topnav">
    <a class="active" href="index.php">Главная</a>
    <a href="budget.php">Бюджет</a>
    <a href="expences.php">Траты</a>
</div>
<h1 class="welcome">Добро пожаловать в приложение по контролю бюджета!</h1>

<div class="line_shadow"></div>
<div class="general">
    <div>Текущий бюджет:<?php echo " ".$row['TotalIncome'] ?> </div>
    <br>
    <div>Всего расходов: <?php echo " ".$rowExp['TotalExpences'] ?> </div>
</div>

</body>
</html>