<?php
require_once 'function.php';
if (!isAutorizedUser()) {
    header ($_SERVER['SERVER_PROTOCOL'] . ' 403 Forbidden');
    exit;
}
addTest();

?>
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Тест</title>
    </head>
    <body>
        <h1>Загрузите файл с тестом</h1>
        <form enctype="multipart/form-data" method="post">
            <p><input name="testfile" type="file"></p>
            <input type="submit" value="Загрузить">
        </form>
        <p><a href="list.php">К списку загруженных тестов</a></p>
        <p><a href="logout.php">Выход</a></p>
    </body>
</html>