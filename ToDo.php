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
        <?php 
            echo $_GET['user'];
        ?>
    </div>
    <?php
        
    ?>
</div>
<?php
    include_once "footer.php"
?>