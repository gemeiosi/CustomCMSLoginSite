<?php
include_once("includes/config.php");
include_once("header.php");
$id = $_GET['book'];

$sql = "SELECT * FROM `kids_book` WHERE `books_id`='$id'";

            $result = mysqli_query($conn,$sql);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<br/>". "<br/>"."<img id='img' src='{$row['book_image']}' alt='image'/>".
                    "<p class='books'>ΤΙΤΛΟΣ ΒΙΒΛΙΟΥ : {$row['book_Name']}</p>".
                    "<p class='books'>ΠΕΡΙΕΧΟΜΕΝΑ : {$row['book_Content']}</p>".
                    "<p class='books'>ΣΥΓΓΡΑΦΕΑΣ : {$row['book_Author']}</p>".
                    "<p class='books'>ΚΑΤΟΧΟΣ : {$row['book_Owner']}</p>";
                }
            }else{
                echo "<p>ΔΕΝ ΒΡΕΘΗΚΕ ΚΑΠΟΙΟ ΒΙΒΛΙΟ</p>";
        }
include_once ("footer.php");
?>