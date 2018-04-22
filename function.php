<?php

session_start();
$errors = [];

function getUsersData() {
    $usersData = json_decode(file_get_contents(__DIR__ . '/login.json'), true);
    if (!$usersData) {
        return [];
    }
    return $usersData;
}

function getUserData($login) {
    $users = getUsersData();
    foreach ($users as $user) {
        if ($user['login'] == $login) {
            return $user;
        }
    }
    return null;
}

function isAutorizedUser() {
    return !empty($_SESSION['user']['login']);
}

function isGuest() {
    return !empty($_SESSION['user']['username']);
}

function addTest() {
    if (isset($_FILES['testfile']['tmp_name']) && file_exists($_FILES['testfile']['tmp_name'])) {
        $json = "json";

        $tempName = $_FILES['testfile']['tmp_name'];
        $explode = explode(".", $_FILES['testfile']['name']);

        if ($explode[1] == $json) {
            if ($data = json_decode(file_get_contents($tempName), true)) {
                $files = scandir('tests/');
                $num_test = count($files) - 1;
                if (move_uploaded_file($tempName, 'tests/' . 'Test' . $num_test . '.json')) {
                    echo "<p>Файл успешно загружен!</p>";
                }
            }
        } else {
            echo '<p>Ошибка! Можно загружать только файлы с разрешением json.</p>';
        }
    }
}
