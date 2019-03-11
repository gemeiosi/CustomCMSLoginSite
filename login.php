<?php $title = "Login"; ?>
<?php
include_once("header.php");
include_once("includes/login.inc.php");

if($success==false){
?>

      <section class="container">
            <div class="wrapper">
                  <h2>Login</h2>
                  <p><?php echo $errorMessage;?></p>
                  <form class="forms" name="myForm" action="login.php" method="POST">
                        <input type="text" onkeyup="usernameValidation()" name="username" placeholder="Username/E-mail" value="<?php echo $username;?>" autofocus>
                        <p class="color" id="resultusername"><?php echo $ErrorUsername;?></p>
                        <input type="password"  onkeyup="passwordValidation()"  name="password" placeholder="Password">
                        <p class="color" id="resultpassword"><?php echo $ErrorPassword;?></p>
                        <button type="submit" name="submit">Login</button>
                        <a href="forgotpassword.php">Forgot Password</a>
                  </form>
            </div>
      </section>

<div class="space">
</div>
<?php
}else{
      echo $errorMessage;
}

include_once("footer.php");

?>