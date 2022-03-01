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
    function existEmail($pdo, $email) {
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
    // function getUser($pdo, $user){      это я доделаю потом
    //     $stmt = $pdo -> prepare("SELECT * FROM users WHERE user = ?;");
    //     $stmt->execute([$user]);
    //     $row = $stmt -> fetch();
    //     $haaaaa = ['id', 'user', 'email', 'pass'];
    //     for ($i = 0; $i < count(($row)); $i++){
    //         echo $row[$haaaaa[$i]];
    //     }
    // }
    // Создаём пользователя
    function createUser($pdo, $user, $email, $pass, $passRep) {
        $sql = "INSERT INTO users (user, email, pass) VALUES (?, ?, ?);";
        try {
            $stmt = $pdo -> prepare($sql);
            $hashPwd = md5($pass);
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