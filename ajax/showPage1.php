<?php
// Report all PHP errors (see changelog)
error_reporting(E_ALL);
    session_start();
    $_SESSION['editable'] = 1;
?>
<table class="listing">
  <tr>
    <td class="table_res">First Name</td>
    <td><?php echo $_SESSION['fname'];?></td>
  </tr>
  <tr>
    <td class="table_res">Last Name</td>
    <td><?php echo $_SESSION['lname'];?></td>
  </tr>
  <tr>
    <td class="table_res">E-Mail</td>
    <td><?php echo $_SESSION['email'];?></td>
  </tr>
</table>
<input type="button" onclick="LoadPage1();" value="Edit" />