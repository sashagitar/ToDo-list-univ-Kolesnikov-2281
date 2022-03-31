<?php
    
    require_once 'bdpdoconnection.inc.php';
    require_once 'function.inc.php';

    //delet task
   if (isset($_POST["but"]))
   {
       $id_delet_task = $_POST["but"];
       deleteTask($pdo, $id_delet_task);
       header("location: ../ToDo.php");
       exit();
   }
   else {
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
    }
?>