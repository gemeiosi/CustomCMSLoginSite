<?php

$errorMessage="";
$success=false;
$username="";
$password="";

$Errors="";
$ErrorUsername="";
$ErrorPassword="";


if(isset($_POST['submit'])){

      include_once 'config.php';

      $username = $_POST['username'];
      $password = $_POST['password'];

      $ErrorUsername= checks("/^[a-zA-Z]*$/",$username,"Είσαγεται σωστό username");
      //$ErrorPassword= checks("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/",$password,"Είσαγεται σωστή μορφή password");

      //Check if empty inputs
      if(empty($username) || empty($password)){
            $errorMessage= "Παρακαλώ τα πεδία δεν μπορεί να είναι κενά!";
      }else{
                  if($ErrorUsername=="" && $ErrorPassword==""){
                  $sql = "SELECT * FROM users WHERE user_username='$username' OR user_email='$username'";
                  $result = mysqli_query($conn, $sql);
                  $resultCheck = mysqli_num_rows($result);
                  if($resultCheck < 1){
                        $errorMessage= "ΔΥΣΤΥΧΩΣ ,ΔΕΝ ΥΠΑΡΧΕΙ ΑΥΤΟ ΤΟ ΟΝΟΜΑ ΧΡΗΣΤΗ ,ΠΡΕΠΕΙ ΝΑ ΞΑΝΑΔΟΚΙΜΑΣΕΤΕ!";    
            }else{
                  if($row = mysqli_fetch_assoc($result)){
                        //De-Hash password
                        $hashPasswordCheck = password_verify($password,$row['user_password']);
                        if( $hashPasswordCheck == false){
                              $errorMessage= 'Το Password που πληκτρολογήσατε δεν είναι σωστό';
                        }else if($hashPasswordCheck == true){
                              //Log in
                              $_SESSION['u_id'] = $row['user_id'];
                              $_SESSION['u_fname'] = $row['user_fname'];
                              $_SESSION['u_lname'] = $row['user_lname'];
                              $_SESSION['u_email'] = $row['user_email'];
                              $_SESSION['u_username'] = $row['user_username'];
                              $errorMessage= 'ΣΥΓΧΑΡΗΤΗΡΙΑ ,ΣΥΝΔΕΘΗΚΑΤΕ ΕΠΙΤΥΧΩΣ!';
                              $success=true;
                        }
                  }
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