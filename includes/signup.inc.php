<?php
    // проверка на корректность введённых данных
    if (isset($_POST['submit'])) {
        //вытаскиваем данные с формы
        $user = $_POST['user'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $passRep = $_POST['passRep'];

        // подключаеь БД SQL
        require_once 'bdpdoconnection.inc.php';
        // берём наши функции
        require_once 'function.inc.php';

        // заполнение полей
        if (emptyField([$user, $email, $pass, $passRep])) {
            header('location: ../signup.php?error=emptyfield');
            exit();
        }
        // совпадение паролей
        if ($pass !== $passRep) {
            header('location: ../signup.php?error=uncorrektRepPass');
            exit();
        }
        // корректность мыла
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header('location: ../signup.php?error=uncorrektEmail');
            exit();
        }
        // есть ли почта в базе
        if (existEmail($pdo, $email)) {
            header('location: ../signup.php?error=emailExist');
            exit();
        }
        // создаём пользователя, если не вылетили до этого
        createUser($pdo, $user, $email, $pass, $pwdrepert);
    }
    else {
        // ребутаем если что-то пошло не так
        header('location: ../signup.php');
    }

?>