<?php

if (!isset($error)) {
    $error = array();
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>MySite</title>
</head>
<body>
<div>

<?php if (!empty($error)): ?>
    <ul style="color:red;">
        <?php foreach ($error as $e): ?>
            <li><?php echo htmlspecialchars($e); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if (empty($UID)): ?>

    <!-- Пользователь не авторизован: показываем форму входа -->
    <form action="" method="post">
        Логин: <input type="text" name="login" required><br>
        Пароль: <input type="password" name="password" required><br>
        <input type="submit" name="log_in" value="Войти">
    </form>

<?php else: ?>

    <!-- Пользователь авторизован: подключаем main.php -->
    <?php include './main/main.php'; ?>

<?php endif; ?>

</div>
</body>
</html>
