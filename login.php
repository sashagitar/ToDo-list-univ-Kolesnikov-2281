<?php 
    include_once "head.php";
?>
<form action="includes/login.inc.php" method="post">
    <div class="vertDiv" style="align-items: center;
                                margin: 3%;">
                <!-- Блок вывода ошибок и инфы -->
                <div name="error" id="error">
                    <?php
                    // Вывод ошибок если таковые есть
                    if (isset($_GET['error'])){
                        switch ($_GET['error']) 
                        {
                            case 'emptyfield':{
                                echo '<span style="color: red">Заполните все поля!!!</span>';
                                break;
                            }
                            case 'uncorrektRepPass':{
                                echo '<span style="color: red">Пароли не совпадают!!!</span>';
                                break;
                            }
                            case 'uncorrektEmail':{
                                echo '<span style="color: red">Введите корректную почту</span>';
                                break;
                            }
                            case 'uncorrekt':{
                                echo '<span style="color: red">Логин или пароль не правильный</span>';
                                break;
                            }
                            
                        }
                    }
                    ?>
                </div>
                <!-- Поля для заполнения чтобы залогиниться -->
                <input type="text" name="email_log" placeholder="Email" style=" width: 20%;
                                                                            height: 20%;
                                                                            text-align: center;
                                                                            font-size: x-large;">
                <input type="password" name="pass_log" placeholder="Pass" style=" width: 20%;
                                                                            height: 20%;
                                                                            text-align: center;
                                                                            font-size: x-large;">
                <input type="submit" name="submit" value="Login" style=" font-size: x-large;">
    </div>
</form>
<?php 
    include_once "footer.php";    
?>