<?php
// Report all PHP errors (see changelog)
error_reporting(E_ALL);
    session_start();

?>
<script>


$(document).ready(function(){
    ShowPage1();
});
$(function(){
    $("#tabs").tabs();
});

</script>

 <div id="tabs">
    <ul>
    <li><a href="#FirstTab" onclick="ShowPage1()">&nbsp;&nbsp;&nbsp; Section 1 &nbsp;&nbsp;&nbsp;</a></li>
    <li><a href="#SecondTab" onclick="ShowPage2()">&nbsp;&nbsp;&nbsp; Section 2 &nbsp;&nbsp;&nbsp;</a></li>
    </ul>
    <div id="FirstTab"></div>
    <div id="SecondTab"></div>
</div>
   <form id="section3" method="post">
      <input type="hidden" name="page" value="3" />
      <input type="button" value="Complete registration" onclick="SendForm3();" />
   </form>


