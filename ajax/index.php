<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <link type="text/css" href="css/css.css" rel="stylesheet" />
    <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.21.custom.css" rel="stylesheet" />
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"> </script>
    <script type="text/javascript" src="js/jquery-ui-1.8.21.custom.min.js"> </script>
    <script type="text/javascript" src="js/jquery.ui.datepicker-he.js"> </script>
    <script type="text/javascript" src="js/jquery.validate.min.js"> </script>
    <script type="text/javascript" src="js/js.js"> </script>
    <title>EX 1</title>
</head>
<body>
<script>

function ShowUserList(){
   $.ajax({
    url: "users.php",
      cache:false,
      success: function(html){
          $("#data").html(html);
      }

  });
}

function ShowAbout(){
   $.ajax({
    url: "about.php",
      cache:false,
      success: function(html){
          $("#data").html(html);
      }

  });
}
function ChangeProperties(){
 $.post("users.php" , $("#UserControll").serializeArray() ,function(data) {
       $("#data").html(data);
    });
 }
 function Registration(){
   $.ajax({
    url: "registration.php",
      cache:false,
      success: function(html){
          $("#data").html(html);
      }

  });
 }
function PrepareToChangeUserDetails(id, act){
    document.getElementById('userID').value = id;
    document.getElementById('act').value = act;
    ChangeProperties();
}
</script>
<table style="width: 100%;">
  <tr>
    <td colspan="3" style="background-color: #4169E1">
        <br /><br /><br /><br /><br /><h1 class="logo"><a href="index.php"> WEB AJAX Technology</a></h1>   </td>
  </tr>
  <tr>
  <td class="leftColumn"></td>
    <td>
    <a href="#" onclick="ShowAbout();">About</a> 
    <?php
        include "userLoginControll.php";
    ?>

    </td>
    <td class="leftColumn"></td>
  </tr>
  <tr>
    <td colspan="3" style="background-color: #87CEEB"><br /><br /><br /></td>
  </tr>
  <tr>
    <td class="leftColumn"></td>
    <td>
        <div id="data">
        <?php
          $page = isset($_GET["p"])?$_GET["p"] : "";
          if($page == "confirm"){
            include "confirm.php";

          }

        ?>
        </div>
    </td>
    <td></td>
  </tr>
  <tr><td class="leftColumn"></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td colspan="3" style="background-color: #87CEEB"><br /><br /><br /></td>
  </tr>
</table>
</body>
</html>