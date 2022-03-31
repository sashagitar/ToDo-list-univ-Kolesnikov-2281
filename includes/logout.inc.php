<?php 
    session_start();
    $_SESSION['usersid'] = -1;
    session_destroy();
    header("location: ../index.php");
    exit();  
?>