<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LB4 VAR1 Dmitry</title>

    <!--===== CSS =====-->
    <link rel="stylesheet" href="login-form.css"/>
</head>
<body>
<div class="login-form">
    <form action="" method="post" class="form">
        <h1 class="form__title">Sign In</h1>

        <div class="form__field">
            <input type="text" id="auth_login" name="login" class="form__input" required placeholder=" "/>
            <label for="auth_login" class="form__label">Login</label>
        </div>

        <div class="form__field">
            <input type="password" id="auth_pass" name="password" class="form__input" required placeholder=" "/>
            <label for="auth_pass" class="form__label">Password</label>
        </div>

        <input type="submit" name="submit" class="form__button" value="Sign In"/>
    </form>
</div>

<?php

// Проверяем отправленную форму входа
if (isset($_POST['submit'])) {

    //Считываем содержимое файла users.txt
    $data = file('users.txt');

    // Инициализируем массив, в котором будут содержаться данные о пользователях
    $users = array();

    foreach ($data as $item) {
        // Убираем пробелы
        $item = trim($item);

        // Разбиваем по знаку "::"
        list($f_login, $f_pass) = explode('::', $item);

        // Заносим в массив
        $users[$f_login] = $f_pass;
    }

    //Проверяем и назначаем отправленные имя пользователя и пароль новой переменной
    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $pass = isset($_POST['password']) ? $_POST['password'] : '';

    // Проверяем наличие имени пользователя и пароля в заданном массиве
    if (array_key_exists($login, $users) && $pass == $users[$login]) {
        echo "Вы залогинены!";
    } else {
        echo "Заполните данные еще раз!";
    }
}
?>

</body>
</html>