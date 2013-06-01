<?php
    session_start();


  function CreatePassword(){

      $newPassword = "";
      $len = rand(6,12);

        for($i=0;$i<$len;$i++)
        {
            $numOrlet = rand(1,30);
            if($numOrlet < 10){
                $newPassword .= rand(10,99);
            }
            else if($numOrlet < 20){
                $newPassword .= chr(rand(66,90));
            }
            else{
                $newPassword .= chr(rand(98,121));
            }
        }

      return ($newPassword);
  }

    if($_POST["page"] == 1){
        $_SESSION["fname"] = htmlentities($_POST["fname"]);
        $_SESSION["lname"] = htmlentities($_POST["lname"]);
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["cemail"] = $_POST["cemail"];

    }
    else if($_POST["page"] == 2){
        $_SESSION["bdate"] = htmlentities($_POST["bdate"]);
        $_SESSION["address"] = htmlentities($_POST["address"]);
        $_SESSION["country"] = htmlentities($_POST["countryList"]);
        $_SESSION["zipcode"] = htmlentities($_POST["zipcode"]);
        $_SESSION["city"] = htmlentities($_POST["city"]);
        $_SESSION["phoneNumber"] = htmlentities($_POST["phoneNumber"]);
        

    }
    else if($_POST["page"] == 3 &&  !empty($_SESSION['fname']) && !empty($_SESSION['lname']) ){

        include_once "mysql_open_connection.php";   
        $new_password = CreatePassword();
        $confirm_code = md5($_SESSION["email"] . time() . rand(10,99999)+ rand(10,99999999));
		$sql= "INSERT INTO tbl_users 
		(id_first_name,
		id_last_name,
		id_email,
		id_address,
		id_country,
		id_city,
		id_phone,
		id_zip,
        id_birth_date,
		id_confirm_code,
        id_password)
		VALUES(
		'" . mysql_real_escape_string($_SESSION["fname"]) . "',
		'" . mysql_real_escape_string($_SESSION["lname"]) . "',
		'" . mysql_real_escape_string( $_SESSION["email"]) . "',
		'" . mysql_real_escape_string($_SESSION["address"]) . "',
		'" . mysql_real_escape_string($_SESSION["country"]) . "',
		'" . mysql_real_escape_string($_SESSION["city"]) . "',
		'" . mysql_real_escape_string($_SESSION["phoneNumber"]) . "',
		'" . (int)$_SESSION["zipcode"] . "',
        '" . mysql_real_escape_string($_SESSION["bdate"]) . "',
		'" . $confirm_code . "',
        '" . md5($new_password) . "'
			)";


		mysql_query($sql);
		if(mysql_errno() == 0){

			echo "The user " .  $_SESSION["fname"]  . " was successfuly added.<br />";
            echo "<strong>Please check your email for confirmation mail.</strong>";



            require("mail/class.phpmailer.php");
            if(!class_exists('SMTP')){
               include("mail/class.smtp.php");

           }
            require("conf/site.conf.php");
            require("conf/mail.conf.php");

            $mail = new PHPMailer();
            $mail->SMTPKeepAlive = true;
            $mail->Mailer = "smtp";
            $mail->IsSMTP();                                      // set mailer to use SMTP
            $mail->SMTPSecure = "ssl";
            $mail->Port = 465;
            $mail->SMTPDebug = 0;
            $mail->Host = $mail_host;           // specify main and backup server
            $mail->SMTPAuth = true;             // turn on SMTP authentication
            $mail->Username = $mail_userName;   // SMTP username
            $mail->Password = $mail_password;   // SMTP password
            $mail->From = $mail_from;
            $mail->FromName =$mail_fromName;
            $mail->AddAddress($_SESSION["email"], $_SESSION["fname"] . " " .$_SESSION["lname"]);
            $mail->AddReplyTo($mail_from, $mail_fromName);

            $mail->WordWrap = 50;                                 // set word wrap to 50 characters
            $mail->IsHTML(true);                                  // set email format to HTML
            $mail->Subject = 'Please confirm this Email';
            $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically

            $message = file_get_contents('templates/MAIL_confirm.html');
            $message = str_replace("[#siteMailURL]",$siteMailURL,   $message);
            $message = str_replace("[#confirmCode]",$confirm_code,  $message);
            $message = str_replace("[#userLogin]",$_SESSION["email"],  $message);
            $message = str_replace("[#userPass]",$new_password,  $message);

            $mail->Body    = $message;

            if(!$mail->Send())
            {
               echo "Message could not be sent. <p>";
               echo "Mailer Error: " . $mail->ErrorInfo;

            }
            session_unset();


		}
        else if(mysql_errno() == 1062){
            echo "User with this EMAIL alredy exist.<br />";
            echo "<a onclick='LoadPage1();' href='#'>Change</a>";
        }
		else{
			echo "Error:[".mysql_errno()."]\n" . mysql_error() . "<br /> " . $sql;
		}

		include_once "mysql_close_connection.php";
    }
    else{
        echo "Please try again.";
    }



?>
