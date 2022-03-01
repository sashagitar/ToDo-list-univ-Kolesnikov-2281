<?php 
    include_once "head.php";
?>
<form action="includes/signup.inc.php" method="post">
    <div class="vertDiv" style="align-items: center;
                            margin: 3%;">

        <div name="error" id="error"></div>
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
                        case 'emailExist':{
                            echo '<span style="color: red">"Эта почта уже используется.</span>';
                            break;
                        }
                        case 'none':{
                            echo '<span style="color: green">Вы зарегестрированны)</span>';
                            break;
                        }
                        
                    }
                }
            ?>
        <!--                    Поля для регистрации                                         -->
        <input type="text" name="email" placeholder="email" style=" width: 20%;
                                                                    height: 20%;
                                                                    text-align: center;
                                                                    font-size: x-large;">
        <input type="text" name="user" placeholder="User name" style=" width: 20%;
                                                                    height: 20%;
                                                                    text-align: center;
                                                                    font-size: x-large;">
        <input type="password" name="pass" placeholder="pass" style=" width: 20%;
                                                                        height: 20%;
                                                                        text-align: center;
                                                                        font-size: x-large;">
        <input type="password" name="passRep" placeholder="pass repit" style=" width: 20%;
                                                                                height: 20%;
                                                                                text-align: center;
                                                                                font-size: x-large;">
        <button type="submit" name="submit" style=" font-size: x-large;">Sing Up</button>
        <!--                                                                                      -->
    </div>
</form>
<?php 
    include_once "footer.php";
?>