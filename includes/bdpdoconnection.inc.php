<?php
    // данные для подключения базы данных
    $serverName = "localhost";
    $dBUserName = "root";
    $dBPassword = "";
    $dBName = "todo";
    $dsn = "mysql:host=$serverName; dbname=$dBName; charset=utf8";
    // какие-то непонятные но нужные букавки потом надо уточнить
    // вроде как опции для базы данных
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    try {
        // штука для запросов в БД
        $pdo = new PDO($dsn, $dBUserName, $dBPassword, $opt);
    }
    catch (PDOException $e) {
        // Если жопа то информируем
        echo "Error!: .$e -> getMessage()";
        die();
    }
?>