<?php
    
    require_once 'bdpdoconnection.inc.php';
    require_once 'function.inc.php';

    //create task
    if (isset($_POST["submit"]))
    {
        $task = $_POST["task"];
        $date_finish = $_POST["date_finish"];
    
        // отлов пустых полей

        if (emptyInputTask($task) !== false) {
            header("location: ../ToDo.php?error=emptyinput");
            exit();              
        }
        addTask($pdo, $task, $date_finish);
    } 
    else {   
        readTasks($pdo);
        exit();  
    }
   

?>