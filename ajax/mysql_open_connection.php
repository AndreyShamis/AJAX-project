<?php


    include_once "conf/mysql.conf.php";
    $link = mysql_connect($db_host, $db_user, $db_pass);

    if (!$link) {
        die('Could not connect: ' . mysql_error() . "<br />" . mysql_errno() ."<br /><br />");
    }

    mysql_select_db($db_db);
    if(mysql_errno())
        echo "Error:" . mysql_error();

?>