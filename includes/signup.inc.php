<?php
    if (isset($_POST['submit'])) {
        $login = $_POST['login'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $passRep = $_POST['passRep'];

        require_once 'bdpdoconnection.inc.php';
        require_once 'function.inc.php';

        // заполнение полей
        if (emptyField([$login, $email, $pass, $passRep])) {
            header('location: ../signup.php?error=emptyfield');
            exit();
        }
        if (existUser($pdo, $email)) {
            header('location: ../signup.php?error=emailExist');
            exit();
        }
        // совпадение паролей
        if ($pass !== $passRep) {
            header('location: ../signup.php?error=uncorrektRepPass');
            exit();
        }
        // корректность мыла
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            header('location: ../signup.php?error=uncorrektEmail');
        }
        createUser($pdo, $name, $email, $pwd, $pwdrepert);
        header('location: ../signup.php?error=correctRgrstr');
     }
    else {
        header('location: ../signup.php');
    }

?>