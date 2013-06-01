<?php
// Report all PHP errors (see changelog)
error_reporting(E_ALL);
session_start();
?>
<script>
function LoadCountry(){
   $.ajax({
    url: "country_list.php",
      cache:false,
      success: function(html){
          $("#countryList").html(html);
      } });
}
function LoadPage1(){
   $.ajax({
    url: "page1.php",
      cache:false,
      success: function(html){
          $("#pages").html(html);
      }});
}
function LoadPage2(){
   $.ajax({
    url: "page2.php",
      cache:false,
      success: function(html){
          $("#pages").html(html);
      }});
}
function ShowPage1(){
   $.ajax({
    url: "showPage1.php",
      cache:false,
      success: function(html){
          $("#FirstTab").html(html);
      }});
}
function ShowPage2(){
   $.ajax({
    url: "showPage2.php",
      cache:false,
      success: function(html){
          $("#SecondTab").html(html);
      }});
}

function LoadPage3(){
   $.ajax({
    url: "page3.php",
      cache:false,
      success: function(html){
          $("#pages").html(html);
      }});
}
$(document).ready(function(){
          LoadPage1();
      });

function SendForm3(){
 $.post("new_user_reciver.php" , $("#section3").serializeArray() ,function(data) {
       $("#pages").html(data);
    });
}

</script>
<div id="pages"></div>
