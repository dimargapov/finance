<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Бюджет!</title>
</head>
<body>
<div class="topnav">
    <a href="index.php">Главная</a>
    <a href="budget.php">Бюджет</a>
    <a class="active" href="expences.php">Траты</a>
</div>

<h1 class="welcome">Здесь ты увидишь свои траты!</h1>
<div class="line_shadow"></div>

<div class="input_expences">
    <form action="input_expences.php" method="POST">
        <label class="label_expence" for="expences">Внести траты</label>
        <input class="expence_income" type="number" name="expences" id="expences" placeholder="Внести"><br>
        <label class="label_expence_category" for="expences_category">Категория</label>
        <input class="expence_category" type="text" name="expences_category" id="expences_category" placeholder="Продукты"><br>
        <label class="label_expence_date" for="expences_date">Дата</label>
        <input class="expence_date" type="date" name="expences_date" id="expences_date">
        <Button class="add_income" type="submit">Внести</Button>
    </form>
</div>

<h1 class="welcome">Информация о тратах </h1>

<form action="clear_expences.php" method="POST">
    <button class="clear_budget" type="submit">Очистить данные!</button>
</form>
<div class="line_shadow"></div>

<?php
session_start();

// Проверяем, есть ли данные в сессии
if (isset($_SESSION['ExpenceData'])) {
    $expence_data = $_SESSION['ExpenceData'];
} else {
    $expence_data = []; // Если данных нет, создаем пустой массив
}
?>

<table class="budget_table">
    <thead>
    <tr>
        <th>Потрачено</th>
        <th>Категория</th>
        <th>Дата</th>
    </tr>
    </thead>
    <tbody>
    <?php if (count($expence_data) > 0): ?>
        <?php foreach ($expence_data as $row): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['expence']); ?></td>
                <td><?php echo htmlspecialchars($row['exp_category']); ?></td>
                <td><?php echo htmlspecialchars($row['exp_date']); ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="3">Нет данных для отображения.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>


</body>
</html>