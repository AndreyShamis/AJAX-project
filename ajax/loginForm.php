<?php
	include_once "mysql_open_connection.php";
?>
<form method="post" id="loginForm" >
<input type="text" id="login" name="login" />
<input type="password" id="password" name="pass" />
</form> 

<?php
    include_once "mysql_close_connection.php";
?>