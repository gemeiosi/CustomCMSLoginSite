<?php
$errorMessage="";
$success=false;
$fname="";
$lname="";
$email="";
$username="";
$password="";

$Errors="";
$ErrorName="";
$ErrorLName="";
$ErrorEmail="";
$ErrorUsername="";
$ErrorPassword="";


if(isset($_POST['submit'])){

      include_once 'config.php';

      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];
      $username = $_POST['username'];
      $password = $_POST['password'];

      $ErrorName = checks("/^[a-zA-Zα-ωΑ-Ω ]*$/",$fname,"Είσαγεται σωστό όνομα");
      $ErrorLName = checks("/^[a-zA-Zα-ωΑ-Ω ]*$/",$lname,"Είσαγεται σωστό επώνυμο");
      $ErrorUsername= checks("/^[a-zA-Z]*$/",$username,"Είσαγεται σωστό username");
      $ErrorEmail= checks("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email,"Είσαγεται σωστό email");
      $ErrorPassword= checks("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/",$password,"Είσαγεται σωστό password");


    
      //Check for empty fields
      if(empty($fname) || empty($lname) || empty($email) || empty($username) || empty($password)){
            $errorMessage= "Παρακαλώ τα πεδία δεν μπορεί να είναι κενά!";            
      }else{            
            if($ErrorName=="" && $ErrorLName=="" && $ErrorUsername=="" && $ErrorEmail==""){
                  $sql = "SELECT * FROM users WHERE user_username='$username'";
                  $result = mysqli_query($conn, $sql);
                  $resultCheck = mysqli_num_rows($result);

                  if($resultCheck > 0){
                        $errorMessage= "ΔΥΣΤΥΧΩΣ ΤΟ ΟΝΟΜΑ ΧΡΗΣΤΗ ΕΙΝΑΙ ΔΕΣΜΕΥΜΕΝΟ!" ;                       
                        }else{
                        //Hash password
                        $password_hash = password_hash($password,PASSWORD_DEFAULT);
                        //Insert user into the database
                        $sql = $conn ->prepare("INSERT INTO users (user_fname,user_lname,user_email,user_username,user_password) VALUES (?,?,?,?,?)");
                        $sql->bind_param("sssss",$fname,$lname,$email,$username, $password_hash);
                        $sql->execute();
                        $errorMessage= 'ΣΥΓΧΑΡΗΤΗΡΙΑ ,ΓΡΑΦΤΗΚΑΤΕ ΕΠΙΤΥΧΩΣ!';
                        $success=true;
                        header("Refresh:5; url= login.php");
                  }
            }
      }
}


function checks($regExp,$val,$TextError){            
      if(!preg_match(  $regExp, $val)){
            return $TextError;
      }
  }
  
?>