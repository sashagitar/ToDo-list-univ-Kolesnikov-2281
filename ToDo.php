<?php
    include_once "head.php";
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
      <input type="text" name="task" id="task" placeholder="Нужно сделать.." class="">
      Дата выполнения
      <input type="date" name="date_finish" id="date_finish" class="">
      <button type="submit" name="submit" class="">Добавить</button>
    </form>
    <form action="includes/ToDo_del.inc.php" method="post">
        <?php
            include_once  'includes/ToDo.inc.php';
        ?>
    </form>
    
</div>
<?php
    include_once "footer.php"
?>