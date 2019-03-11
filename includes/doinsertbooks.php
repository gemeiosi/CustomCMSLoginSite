<?php
$errorMessage="";
$success=false;
$btitle="";
$author="";
$owner="";
$content="";
$image="";
$last_id="";
$ext="";

$Errors="";
$Errortitle="";
$Errorauthor="";
$Errorowner="";
$Errorcontent="";

if(isset($_POST['submit'])){

      include_once 'config.php';

      $btitle = $_POST['bookname'];
      $author = $_POST['author'];
      $owner = $_POST['owner'];
      $content = $_POST['content'];
      $image = $_FILES['image'];
      $target_dir = "images/";
      $ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
      $dbDir = "images/".basename($_FILES["image"]["name"]);

      $Errortitle = checks("/^[α-ωΑ-Ω\W]*$/",$title,"Είσαγεται σωστό Τίτλο");
      $Errorauthor = checks("/^[a-zA-Zα-ωΑ-Ω\W]*$/",$author,"Είσαγεται σωστό Συγγραφέα");
      $Errorowner= checks("/^[a-zA-Zα-ωΑ-Ω\W]*$/",$owner,"Είσαγεται σωστό Ιδιοκτήτη");
      $Errorcontent= checks("/^[a-zA-Zα-ωΑ-Ω\W]*$/",$content,"Είσαγεται σωστό περιεχόμενο");

      //Check for empty fields
      if(empty($title) || empty($author) || empty($owner) || empty($content) || empty($image)){
            $errorMessage= "Παρακαλώ τα πεδία δεν μπορεί να είναι κενά!";            
      }else{            
            if($Errortitle=="" && $Errorauthor=="" && $Errorowner=="" && $Errorcontent==""){
                  $sql = "SELECT * FROM kids_book WHERE book_Name='$btitle'";
                  $result = mysqli_query($conn, $sql);
                  $resultCheck = mysqli_num_rows($result);

                  if($resultCheck > 0){
                        $errorMessage= "ΔΥΣΤΥΧΩΣ ΤΟ ΒΙΒΛΙΟ ΕΙΝΑΙ ΗΔΗ ΚΑΤΑΧΩΡΗΜΕΝΟ!" ;                       
                        }else{
                              //Insert book into the database
                        $sql = $conn ->prepare("INSERT INTO kids_book (book_Name,book_Content,book_Author,book_Owner,book_image) VALUES (?,?,?,?,?)");
                        $sql->bind_param("sssss",$btitle,$content,$author,$owner,$dbDir);
                        $sql->execute();
                        $last_id = $conn->insert_id;
                        $sql = $conn ->query("UPDATE kids_book SET book_image='images/image$last_id.$ext' WHERE books_id=$last_id");
                        $target_file = $target_dir.basename("image$last_id.$ext");
                        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);                       
                        $errorMessage= 'ΣΥΓΧΑΡΗΤΗΡΙΑ ,ΤΟ ΒΙΒΛΙΟ ΚΑΤΑXΩΡΗΘΗΚΕ ΕΠΙΤΥΧΩΣ!';
                        $success=true;
                        header("Refresh:3; url= index.php");
            
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