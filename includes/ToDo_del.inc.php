<?php
    
    require_once 'bdpdoconnection.inc.php';
    require_once 'function.inc.php';

    //delet task
    if (isset($_POST["submit"]))
    {
        $id_delet_task = $_POST["but"];
        deleteTask($pdo, $id_delet_task);
    }
    else {   
        readTasks($pdo);
        exit();  
    }
?>