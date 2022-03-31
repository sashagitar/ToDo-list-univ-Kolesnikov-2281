<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
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
    function loginUser($pdo, $email, $pass) {
        $stmt = $pdo -> prepare("SELECT * FROM users WHERE email = ?;");
        $stmt->execute([$email]);
        $row = $stmt -> fetch(PDO::FETCH_LAZY);
        if (password_verify($pass, $row -> pass)) {
            $_SESSION["favcolor"] = $row -> id;
            return false;
        }
        else return true;
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
    // Считывание заданий
    function readTasks($pdo){ 
        $sql = 'SELECT * FROM tasks WHERE id_user = ?;';
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$_SESSION["favcolor"]]);
            while ($row = $stmt->fetch(PDO::FETCH_LAZY))
            {
                echo   '<div class="task">
                            <p><b>' . $row->task . '</b></p>
                            Дата выполнения '.$row->date_finish.'
                            <button type="submit" name="but" value="'.$row -> id.'">Удалить</button>
                        </div>';
            }
        }
        catch ( PDOException $e ){
            header("location: ../ToDo.php?error=uncorrecruser");
            exit();
        }
    }
    // Добавление заданий
    function addTask($pdo, $task, $date_finish){
        $sql = "INSERT INTO tasks (id_user, task, date_finish) VALUES (?, ?, ?);";
        $id = $_SESSION["favcolor"];
        try{
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([$id, $task, $date_finish]);
            header("location: ../ToDo.php?error=none");
            exit();
        }
        catch ( PDOException $e ){
            header("location: ../ToDo.php?error=uncorrecruser");
            exit();
        }
    }
    // Удаление задания 
    function deleteTask($pdo, $idDeleted){

        $sql = 'DELETE FROM `tasks` WHERE `id` = ?';
        try {
            $query = $pdo->prepare($sql);
            $query->execute([$idDeleted]);
            header("location: ../ToDo.php"); 
            exit();
        }
        catch ( PDOException $e ){
            header("location: ../ToDo.php?error=uncorrecruser");
            exit();
        }
       
    }

    function emptyInputTask($taskName) {
        if (empty($taskName)) {
            return true;
        }
        else {
            return false;
        }
    }
?>