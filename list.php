<?php
require_once 'function.php';

if (!isGuest() && !isAutorizedUser()) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Forbidden');
    exit;
} else {
    if (isAutorizedUser()) {
        echo '<h3>Добавить тест</h3>
        <form enctype="multipart/form-data" method="post">
            <p><input name="testfile" type="file"></p>
            <input type="submit" value="Добавить">
        </form>
        <a href="logout.php">Выход</a>';
        addTest();
    }
}
$testList = glob('tests/*.json');
?>    
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Загруженные тесты</title>
    </head>
    <body>
        <h2>Выберите тест</h2>
        <ol>
            <?php foreach ($testList as $numberTest => $test):
                $testName = basename($test, ".json");
                ?>
                <li>
                    <a href="test.php?selectNumberTest=<?= ++$numberTest ?>"><?= $testName ?></a>
                </li>
            <?php endforeach ?>
        </ol>
        <a href="index.php">Назад к регистрации</a>
        
    </body>
</html>