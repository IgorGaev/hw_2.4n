<?php
require_once 'function.php';
$errors = [];

if (isAutorizedUser()) {
    header('Location: list.php');;
    exit;
}

if (!empty($_POST['userLogin']) && (!empty($_POST['userPass']))) {
    $login = $_POST['userLogin'];
    $password = $_POST['userPass'];
    $user = getUserData($login);
    if ($user && $password == $user['password']) {
        unset($user['password']);
        $_SESSION['user'] = $user;
        header('Location: admin.php');
        exit;
    } else {
        $errors[] = 'Некорректный логин или пароль';
    }
}
if (!empty($_POST['username'])) {
    $_SESSION['user']['username'] = $_POST['username'];
    header('Location: list.php');
    exit;
}
?>
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Авторизация</title>
    </head>
    <body>
        <h1>Авторизация</h1>

        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>

        <h2>Для авторизованного входа введите Ваше имя и пароль</h2>
        <form method="post">
            <label>
                <input  type="text" name="userLogin" placeholder="Логин">
            </label>
            <label>
                <input type="password" name="userPass" placeholder="Пароль">
            </label>
            <input type="submit" value="Авторизоваться">
        </form>
        <h2>Для входа в качестве гостя введите Ваше имя</h2>
        <form method="post">
            <label>
                <input  type="text" name="username" placeholder="Имя">
            </label>
            <input type="submit" value="Войти как гость">
        </form>
    </body>
</html>