<?php
    // проверка на корректность введённых данных
    if (isset($_POST['submit'])) {
        //вытаскиваем данные с формы
        $email = $_POST['email_log'];
        $pass = $_POST['pass_log'];
        // подключаеь БД SQL
        require_once 'bdpdoconnection.inc.php';
        // берём наши функции
        require_once 'function.inc.php';

        // заполнение полей
        if (emptyField([$email, $pass])) {
            header('location: ../login.php?error=emptyfield');
            exit();
        }
        // корректность мыла
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header('location: ../login.php?error=uncorrektEmail');
            exit();
        }
        // вызываем пользователя
        if (getUser($pdo, $email, $pass)){
            header('location: ../login.php?error=uncorrekt');
            exit();
        }
        else { 
            header('location: ../ToDo.php?user='.$email);
        }
    }
    else {
        // ребутаем если что-то пошло не так
        header('location: ../login.php');
    }

?>