<?php 
    include_once "head.php";
?>
<div class="vertDiv" style="align-items: center;
                            margin: 3%;">
            <div name="error" id="error"></div>
            <input type="text" name="user_name" placeholder="User name" style=" width: 20%;
                                                                        height: 20%;
                                                                        text-align: center;
                                                                        font-size: x-large;">
            <input type="password" name="pass" placeholder="Pass" style=" width: 20%;
                                                                          height: 20%;
                                                                          text-align: center;
                                                                          font-size: x-large;">
            <input type="button" name="login" value="Login" style=" font-size: x-large;">
</div>
<?php 
    include_once "footer.php";    
?>