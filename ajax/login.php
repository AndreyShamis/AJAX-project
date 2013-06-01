<?php
session_start();

    if($_GET['logout'] == "1"){
      session_unset();
    }
    else{



      $userName= $_POST["login_userName"];
      $userPass= $_POST["login_userPass"];
      if(empty($userName) || empty($userPass) )
      {
        $_SESSION['loginError'] = "Some data is empty";
        header('Location: index.php');
      }

      include_once "mysql_open_connection.php";

        require_once("functions.php");

        Login($userName,$userPass);




      include_once "mysql_close_connection.php";
    }

    header('Location: index.php');





?>