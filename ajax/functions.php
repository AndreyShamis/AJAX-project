<?php


      function Login($userName,$userPass){

        $userPass = md5($userPass);

        $sql = "SELECT * FROM tbl_users WHERE
                    LOWER(id_email)    = '".mysql_real_escape_string(strtolower($userName))."'
                AND
                    id_password ='".mysql_real_escape_string($userPass)."'
                LIMIT 1";

        $q      = mysql_query($sql);
        $_SESSION['loginError'] .= mysql_error();
        $count  = mysql_num_rows($q);
        if($count == 1){

        $arr = mysql_fetch_array($q);
          if($arr['id_confirm_status'] == 1){
            foreach($arr as $key=>$val){
                $_SESSION[$key] = $val;
            }
          }else{
            $_SESSION['loginError'] = "You must confirm email." ;
          }
        }else{
          $_SESSION['loginError'] = "Some of parameters incorret." ;

        }
      }

?>