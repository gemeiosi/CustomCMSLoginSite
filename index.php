<?php $title = "Digital Library"; ?>
<?php
include_once("header.php");
include_once("includes/functions.php");
?>

      
      <section class="container">
      
             <?php getBooks(); ?>
          
      </section>

<!-- Modal -->
<div class="modal" id="myModal" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
                    <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">ΠΡΕΠΕΙ ΝΑ ΣΥΝΔΕΘΕΙΤΕ ΓΙΑ ΝΑ ΔΕΙΤΕ ΤΟ ΠΕΡΙΕΧΟΜΕΝΟ</h4>
                            </div>
                            <div class="modal-body">
                              <a href="login.php">Login</a>
                            </div>
                            <div class="modal-header">
                              <h4 class="modal-title">ΑΝ ΔΕΝ ΕΙΣΤΕ ΜΕΛΟΣ ΠΑΡΑΚΑΛΩ ΕΓΓΡΑΦΕΙΤΕ</h4>
                            </div>
                            <div class="modal-header">
                            <a href="signup.php">Sing Up</a>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                    </div>
                    
              </div>
</div>

<?php

include_once("footer.php");

?>