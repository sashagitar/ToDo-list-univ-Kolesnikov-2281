<?php

use LDAP\Result;

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
    function existUser($pdo, $email) {
        $sql = "SELECT * FROM users WHERE 'email' = ?";
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute([$email]);

        if ($stmt -> rowCount() === 0){ return false; }
        else { return true; }
    }

    function createUser($pdo, $login, $email, $pass, $passRep) {
        $sql = "INSERT INTO users ('login', email, pass) VALUES (?, ?, ?);";
        try {
            $stmt = $pdo -> prepare($sql);
            $hashPwd = password_hash($pass, PASSWORD_DEFAULT);
            $stmt -> execute([$login, $email, $hashPwd]);
            header("location: ../signup.php?error=none");
            exit();
        }
        catch( PDOException $e) {
            header("location: ../signup.php?error=stmt&message=".$e ->getMessage());
            exit();
        }
    }
?>