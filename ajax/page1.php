<?php
// Report all PHP errors (see changelog)
error_reporting(E_ALL);
    session_start();

?>
<h2>First section</h2>
<form name="section1" id="section1" >
<script>
$.validator.addMethod("nameValidate",
    function(number, element){
      var alphaExp = /^[a-zA-Z]+$/;
      if(!number.trim().match(alphaExp))
        return false;
      return true;
},"You mast enter only english leters! " );

$.validator.addMethod("emailValidate",
    function(email, element){
      var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
      if(!email.trim().match(emailExp))
        return false;
      return true;
},"wrong email address - email format is: a@b.cd");

$("#btnNext").click(function(){
    if($("#section1").valid()) {
       $.post("new_user_reciver.php" , $("#section1").serializeArray() ,function(data) {
            LoadPage2();   
    });}
  });

$("#btnOk").click(function(){
    if($("#section1").valid()) {
       $.post("new_user_reciver.php" , $("#section1").serializeArray() ,function(data) {
            LoadPage3();
    });}
  });

$.validator.addMethod("equalToIgnoreCase", function () {
        return ($("#cemail").val().toLowerCase() == $("#email").val().toLowerCase());
},"Mail confirmation didn`t mutch the original mail.");

$("#section1").validate({
  errorClass: "invalid",
  rules: {
    fname:{
        required: true,
        minlength: 2 ,
        maxlength: 50,
        nameValidate: true
    },
    lname:{
        required: true,
        minlength: 2 ,
        maxlength: 50,
        nameValidate: true
    },
	email: {
		required: true,
        minlength: 3 ,
        maxlength: 150,
        emailValidate: true
	},
	cemail: {
		required: true,
		equalToIgnoreCase: true
	},
  }
  ,
    messages:{
      fname:{
        required : "Please enter your First Name",
        minlength:"You mast enter at least two leter!",
      },
      lname:{
        required : "Please enter your Last Name",
        minlength:"You mast enter at least two leter!",
      },
    }
});

</script>

<?php
  $fname    = isset($_SESSION["fname"])? $_SESSION["fname"] : "" ;
  $lname    = isset($_SESSION["lname"])? $_SESSION["lname"] : "";
  $email    = isset($_SESSION["email"])? $_SESSION["email"] : "";


?>
<input type="hidden" name="page" value="1" />
<table>
  <tr>
    <td class="table_res"><label for="fname">  First Name </label> </td>
    <td><input type="text" id="fname" name="fname" value="<?php echo $fname;?>" placeholder="&nbsp;&nbsp;&nbsp;&nbsp; Enter only english characters" /></td>
    <td></td>
  </tr>
  <tr>
    <td class="table_res"><label for="lname"> Last Name </label> </td>
    <td><input type="text" id="lname" name="lname" value="<?php echo $lname;?>"  placeholder="&nbsp;&nbsp;&nbsp;&nbsp; Enter only english characters" /></td>
    <td></td>
  </tr>
  <tr>
    <td class="table_res"><label for="email"> E-mail Address </label> </td>
    <td><input type="email" id="email" name="email" value="<?php echo $email;?>"  /> </td>
    <td></td>
  </tr>
  <tr>
    <td class="table_res"><label for="cemail"> Repeat email </label></td>
    <td><input type="email" id="cemail" name="cemail"  value="<?php echo $email;?>" /></td>
    <td></td>
  </tr>
</table>
<?php
    if(isset($_SESSION['editable']) && $_SESSION['editable'] == 1){
?>
    <input type="button" id="btnOk"  value="Ok" />
<?php
    }
    else
    {
?>
    <input type="button" id="btnNext"  value="Next" />
<?php
    }
?>

</form>