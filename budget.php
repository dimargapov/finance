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
    <a class="active" href="budget.php">Бюджет</a>
    <a href="expences.php">Траты</a>
</div>

<h1 class="welcome">Здесь ты увидишь свой бюджет!</h1>
<div class="line_shadow"></div>

<div class="input_income">
    <form action="input_income.php" method="POST">
        <label class="label_income" for="income">Внести бюджет</label>
        <input class="input__income" type="number" name="income" id="income" placeholder="Внести"><br>
        <label class="label_income_category" for="income_category">Категория</label>
        <input class="income_category" type="text" name="income_category" id="income_category" placeholder="Зарплата"><br>
        <label class="label_income_date" for="income_date">Дата</label>
        <input class="income_date" type="date" name="income_date" id="income_date">
        <Button class="add_income" type="submit">Внести</Button>
    </form>
</div>

<h1 class="welcome">Информация о бюджете </h1>

<form action="clear_budget.php" method="POST">
    <button class="clear_budget" type="submit">Очистить данные!</button>
</form>
<div class="line_shadow"></div>

<?php
session_start();

// Проверяем, есть ли данные в сессии
if (isset($_SESSION['BudgetData'])) {
    $budget_data = $_SESSION['BudgetData'];
} else {
    $budget_data = []; // Если данных нет, создаем пустой массив
}
?>

<table class="budget_table">
    <thead>
    <tr>
        <th>Внесено</th>
        <th>Категория</th>
        <th>Дата</th>
    </tr>
    </thead>
    <tbody>
    <?php if (count($budget_data) > 0): ?>
    <?php foreach ($budget_data as $row): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['INCOME']); ?></td>
                <td><?php echo htmlspecialchars($row['CATEGORY']); ?></td>
                <td><?php echo htmlspecialchars($row['INC_DATE']); ?></td>
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