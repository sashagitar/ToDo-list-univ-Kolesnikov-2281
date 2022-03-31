<?php
    include_once "head.php";
    require_once 'includes/bdpdoconnection.inc.php';
    require_once 'includes/function.inc.php';
?>
<div>
    <div class="navigation">
        <nav> <!-- здесь что-то будет типо меню -->
            <ul class="navigationUl">
                <li><a class="navigationText" href = "index.php"> HOME </a></li>
                <li><a class="navigationText" href="ToDo.php"> task </a></li>
            </ul>
        </nav>
    </div>
    <form action="includes/ToDo.inc.php" method="post">
        <div class="tasks">
            <div name="error" id="error">
                <?php
                    if (isset($_GET['error'])){
                        switch ($_GET['error']) 
                        {
                            case 'emptyfield':{
                                echo '<span style="color: red">Заполните все поля!!!</span>';
                                break;
                            }
                            case 'uncorrecruser':{
                                echo '<span style="color: red">Вы не зарегестрированный пользователь!!!</span>';
                                break;
                            }
                            
                        }
                    }
                ?>
            </div>
            <input type="text" name="task" id="task" placeholder="Нужно сделать.." class="">
            Дата выполнения
            <input type="date" name="date_finish" id="date_finish" class="">
            <button type="submit" name="submit" class="">Добавить</button>
            <?php
                readTasks($pdo);  
            ?>
        </div>
    </form>
</div>
<?php 
    include_once "footer.php";
?>