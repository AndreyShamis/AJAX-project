<?php

    if(empty($_SESSION['id_email'])){
?>
    &nbsp;&nbsp;&nbsp;<a href="#" onclick="Registration();">Registration</a>

   &nbsp;&nbsp;&nbsp;Login
    <form action="login.php" method="post">
    <?php

        if(isset($_SESSION['loginError']))
        {
          echo $_SESSION['loginError'];
          $_SESSION['loginError']= "";
        }


    ?>
         <input type="text" name="login_userName" id="login_userName" placeholder="E-Mail" />
         <input type="password" name="login_userPass" id="login_userPass"  placeholder="Password" />
         <input type="submit" value="Login" />
         <div>Default user password is "password"</div>

    </form>
<?php
    }
    else{

        echo "&nbsp;&nbsp;&nbsp;<a href='login.php?logout=1'>Log out</a>";



    ?>
    <h2>Hello <?php echo $_SESSION['id_first_name']?>.</h2>
    <?php
          if($_SESSION["id_admin"]==1){
          ?>
          <a href="#" onclick="ShowUserList();">All Users</a>
          <?php
        }
    }


?>