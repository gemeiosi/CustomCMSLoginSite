<?php $title = "Sign Up"; ?>
<?php
include_once("header.php");
include_once("includes/signup.inc.php");

if($success==false){
?>
      <section class="container">
            <div class="wrapper">
                  <h2>Sign Up</h2>
                  <p><?php echo $errorMessage;?></p>
                  <form class="forms" name="myForm" action="signup.php" method="POST">
                        <input type="text" onkeyup="usernameValidation()" name="username" placeholder="Username" value="<?php echo $username;?>">
                        <p class="color" id="resultusername"><?php echo $ErrorUsername;?></p>
                        <input type="password" onkeyup="passwordValidation()" name="password" placeholder="Password">
                        <p class="color" id="resultpassword"><?php echo $ErrorPassword;?></p>
                        <input type="text" onkeyup="fnameValidation()" name="fname" placeholder="Firstname" value="<?php echo $fname;?>">
                        <p class="color" id="resultname"><?php echo $ErrorName;?></p>
                        <input type="text" onkeyup="snmValidation()" name="lname" placeholder="Lastname" value="<?php echo $lname;?>">
                        <p class="color" id="resultsname"><?php echo $ErrorLName;?></p>
                        <input type="text" onkeyup="emailValidation()" name="email" placeholder="E-mail" value="<?php echo $email;?>">
                        <p class="color" id="resultemail"><?php echo $ErrorEmail;?></p>
                        <button type="submit" name="submit">Sign Up</button>
                  </form>
            </div>
      </section>
      <div class="space">
      </div
<?php
}else{
      echo $errorMessage;
}

include_once("footer.php");

?>