<?php $title = "Εισαγωγή Βιβλίου"; ?>
<?php
include_once("header.php");
include_once("includes/doinsertbooks.php");

if($success==false){
?>
     <section class="container">
            <div class="wrapper">
                  <h2>Προσθήκη Νέου Βιβλίου</h2>
                  <p><?php echo $errorMessage;?></p>
                  <form class="forms" name="myForm" action="insertbooks.php" method="POST" enctype="multipart/form-data">
                        <input type="text"  name="bookname" placeholder="Τιτλος Βιβλίου">
                        <p class="color" id="resultbookname"><?php echo $Errortitle;?></p>
                        <input type="text"  name="author" placeholder="Συγγραφέας">
                        <p class="color" id="resultauthor"><?php echo $Errorauthor;?></p>
                        <input type="text"  name="owner" placeholder="Κάτοχος">
                        <p class="color" id="resultowner"><?php echo $Errorowner;?></p>
                        <input type="text"  name="content" placeholder="Περιεχόμενο">
                        <p class="color" id="resultcontent"><?php echo $Errorcontent;?></p>
                        <input type="file" name="image">
                        <p class="color" id="resultimage"></p>
                        <button type="submit" name="submit">Προσθήκη</button>
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