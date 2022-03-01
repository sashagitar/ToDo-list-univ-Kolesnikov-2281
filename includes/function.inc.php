<?php

use LDAP\Result;
    // Проверка на заполнение всех полей
    function emptyField($fiels) {
        $result = false;
        foreach ($fiels as $filed) 
        {
            if (empty($filed)) {
                $result = true;
                break;
            }
        }
        return $result;
    }
    // чекаем, есть ли почта в базе
    function existUser($pdo, $email) {
        $sql = "SELECT * FROM users WHERE email = ?;";
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute([$email]);

        if ($stmt) {
            if ($stmt -> rowCount() === 0)
            { 
                return false; 
            }
            else 
            { 
                return true; 
            }
        }
    }
    // Создаём пользователя
    function createUser($pdo, $user, $email, $pass, $passRep) {
        $sql = "INSERT INTO users (user, email, pass) VALUES (?, ?, ?);";
        try {
            $stmt = $pdo -> prepare($sql);
            $hashPwd = password_hash($pass, PASSWORD_DEFAULT);
            $stmt -> execute([$user, $email, $hashPwd]);
            header("location: ../signup.php?error=none");
            exit();
        }
        catch( PDOException $e) {
            header("location: ../signup.php?error=stmt&message=".$e ->getMessage());
            exit();
        }
    }
?>