<?php

    //session_start();
    include_once "mysql_open_connection.php";

    $cCode = mysql_real_escape_string($_GET['confirmCode']);

    $sql = "SELECT * FROM tbl_users WHERE id_confirm_status='0' AND id_confirm_code='".$cCode."' LIMIT 1";
    $q      = mysql_query($sql);
    $count  = mysql_num_rows($q);
    if($count == 1){
        $arr = mysql_fetch_array($q);
        $user_id = $arr['id'];
        $userName =  $arr['id_email'];
        $userPass =  $arr['id_password'];
        $sql = "UPDATE tbl_users SET id_confirm_status='1' , id_confirm_code='' WHERE id='".$user_id."' LIMIT 1";
        $q      = mysql_query($sql);
        ?>
          <h2>The registration was complited.</h2>
          <strong>  <a href="index.php">Go to main page</a> </strong>
        <?php
    }
    else{
      echo "Please try again.<br />";
    }
    include_once "mysql_close_connection.php";
?>