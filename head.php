<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/class.css" type="text/css">
        <link rel="stylesheet" href="css/div.css" type="text/css">
        <link rel="stylesheet" href="css/main.css" type="text/css">
    </head>
    <body>
        <header> 
            <div class="divMainReg"> <!-- меню с регистрацией -->
                <nav>
                    <ul>
                        <li><a href = "signup.php"> Sing Up </a></li>
                        <li><a href = "login.php"> Login </a></li>
                    </ul>
                </nav>
                <a href="includes/logout.inc.php" >Выход</a>
            </div>
            <div class="orangeLine"></div>
            <div class="divLogo"><!-- лого и картинка -->
                <div class="vertDiv"> 
                    <h1>ToDo</h1>
                    <h5>Колесников Александр Григорьевич</h5>
                </div>
            </div>
        </header>