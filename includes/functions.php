<?php
include_once("config.php");


function getBooks(){
      global $conn;
      $sql = "SELECT * FROM `kids_book` WHERE feature=1" ;
      $count=0;
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){      
                  if($count==0){
                        echo ' <div class="row">';
                  }
                        echo ' <div class="col-md-6">';      
                        echo '<img class="preimg" alt="image" src="'.$row["book_image"].'"/>';
                        echo '<br/>';
                        if(isset($_SESSION['u_id']) && !empty($_SESSION['u_id'])){
                              echo ' <a class="content" href="diglibrary.php?book='.$row["books_id"].'">Περιεχόμενο</a>';
                        }else{
                              echo '<button type="button" class="readmore" data-toggle="modal" data-target="#myModal">Περισσότερα</button>';                            
                         }
                              echo '</div>';
                              $count++;

                              if($count==2){
                                    echo '</div>';
                                    $count=0;
                              }
                       
            
            }
      }
}





?>