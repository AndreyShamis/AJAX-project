<?php
// Report all PHP errors (see changelog)

session_start();
    if($_SESSION['id_admin'] != 1){
        //header('Location: index.php');
        exit();
    }

	include_once "mysql_open_connection.php";




    // Confirm section
    $action     = isset($_POST['act'])?$_POST['act'] : "";
    $act_id     = isset($_POST['id'])?(int)$_POST['id'] : 0;

    if($act_id > 0){
        if($action == "confirm" ){
            $sql = "UPDATE tbl_users SET id_confirm_status='1' ,id_confirm_code='' WHERE id='".$act_id."' LIMIT 1";
        }
        else if($action == "delete"){
            $sql = "DELETE FROM tbl_users WHERE id='".$act_id."' LIMIT 1";
        }
        else if($action == "disable"){
            $sql = "UPDATE tbl_users SET id_confirm_status='2' ,id_confirm_code='' WHERE id='".$act_id."' LIMIT 1";
        }
        else if($action == "enable"){
            $sql = "UPDATE tbl_users SET id_confirm_status='1' ,id_confirm_code='' WHERE id='".$act_id."' LIMIT 1";
        }
        else if($action == "adminon"){
            $sql = "UPDATE tbl_users SET id_admin='1' WHERE id='".$act_id."' LIMIT 1";
        }
        else if($action == "adminoff"){
            $sql = "UPDATE tbl_users SET id_admin='0' WHERE id='".$act_id."' LIMIT 1";
        }
        if(isset($sql)){
          mysql_query($sql);
        }
    }

    $sql = "SELECT * FROM tbl_users";

    $q= mysql_query($sql);
    $count = mysql_num_rows($q);

    ?>

<link type="text/css" href="css/css.css" rel="stylesheet" />
<form id="UserControll">
<input type="hidden" id="userID" name="id" />
<input type="hidden" id="act"  name="act" />

</form>
<table border="1" class="listing">
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>E-Mail</th>
    <th>Address</th>
    <th>Country</th>
    <th>City</th>
    <th>Phone</th>
    <th>Confirm Status</th>
    <th>Options</th>
  </tr>


    <?php
    for($i=0;$i<$count;$i++){

        $f = mysql_fetch_array($q);
        ?>
  <tr>
    <td><?php echo $f['id_first_name'];?></td>
    <td><?php echo $f['id_last_name'];?></td>
    <td><?php echo $f['id_email'];?></td>
    <td><?php echo $f['id_address'];?></td>
    <td><?php echo $f['id_country'];?></td>
    <td><?php echo $f['id_city'];?></td>
    <td><?php echo $f['id_phone'];?></td>
    <td><?php
        if ($f['id_confirm_status']==1)
            echo "Confirmed";
        elseif ($f['id_confirm_status']==0)
            echo "Waiting..(" . substr($f['id_confirm_code'],0,6) . "..)";
        elseif ($f['id_confirm_status']==2)
            echo "Disabled";
    ?></td>
	<td class="btnPanel">
    <?php if ($f['id_confirm_status']==1) { ?>
    <img onclick="PrepareToChangeUserDetails('<?php echo $f['id'];?>','disable');" src="images/disable.gif" alt="Disable this user" title="Disable this user" />
    <?php } ?>
    <?php if ($f['id_confirm_status']==2)    {?>
    <img  onclick="PrepareToChangeUserDetails('<?php echo $f['id'];?>','enable');"  src="images/enable.gif" alt="Enable this user" title="Enable this user"  />
    <?php }  ?>
	<input class="btn_admin" onclick="PrepareToChangeUserDetails('<?php echo $f['id'];?>','confirm')" type="button" value="Confirm" <?php if ($f['id_confirm_status']!=0) echo " disabled='disabled'"?> />
    <?php if ($f['id_admin']==0) { ?>
    <input class="btn_admin" onclick="PrepareToChangeUserDetails('<?php echo $f['id'];?>','adminon')" type="button" value="Admin On"  />
     <?php }else{ ?>
     <input class="btn_admin" onclick="PrepareToChangeUserDetails('<?php echo $f['id'];?>','adminoff')" type="button" value="Admin Off"  />
    <?php }  ?>
	<img  class="btn_admin" alt="Delete" src="images/hr.gif" onclick="if (confirm('Are you sure to remove this user?')) PrepareToChangeUserDetails('<?php echo $f['id'];?>','delete');" />
	</td>
  </tr>
    <?php }  ?>
</table>
<?php
    include_once "mysql_close_connection.php";


?>