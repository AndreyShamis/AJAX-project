<?php
// Report all PHP errors (see changelog)
error_reporting(E_ALL);
    session_start();

?>
<table class="listing">
  <tr>
    <td class="table_res">Birth day</td>
    <td><?php echo $_SESSION['bdate'];?></td>
  </tr>
  <?php if(!empty($_SESSION['address'])) { ?>
  <tr>
    <td class="table_res">Address</td>
    <td><?php echo $_SESSION['address'];?></td>
  </tr>
  <?php } ?>
  <?php if(!empty($_SESSION['country'])) { ?>
  <tr>
    <td class="table_res">Country</td>
    <td><?php echo $_SESSION['country'];?></td>
  </tr>
  <?php } ?>
  <?php if(!empty($_SESSION['city'])) { ?>
  <tr>
    <td class="table_res">City</td>
    <td><?php echo $_SESSION['city'];?></td>
  </tr>
  <?php } ?>
  <?php if(!empty($_SESSION['zipcode'])) { ?>
  <tr>
    <td class="table_res">Zip code</td>
    <td><?php echo $_SESSION['zipcode'];?></td>
  </tr>
  <?php } ?>
  <tr>
    <td class="table_res">Phone number</td>
    <td><?php echo $_SESSION['phoneNumber'];?></td>
  </tr>
</table>
<input type="button" onclick="LoadPage2();" value="Edit" />