<?php
// Attempt server connection.
include_once("config.php");

session_start();

if(isset($_SESSION['u_id'])){
    if(isset($_REQUEST['term'])){
        // Set parameters
            $param_term ='%'. $_REQUEST['term'] . '%';
        // Prepare a select statement
        $sql = "SELECT * FROM kids_book WHERE book_Name LIKE '$param_term'";
        
    
                $result = mysqli_query($conn,$sql);
                
                // Check number of rows in the result set
                if(mysqli_num_rows($result) > 0){
                    // Fetch result rows as an associative array
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        echo "<p><a href='diglibrary.php?book={$row["books_id"]}'>" . $row["book_Name"] . "</a></p>";
                    }
                }else{
                    echo "<p>ΔΕΝ ΒΡΕΘΗΚΕ ΚΑΠΟΙΟ ΒΙΒΛΙΟ</p>";
            }
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }
}else{
    echo '<div class=wrapper id="mustlogin">';
    echo '<p>ΠΡΕΠΕΙ ΝΑ ΣΥΝΔΕΘΕΙΤΕ ΓΙΑ ΝΑ ΔΕΙΤΕ ΤΟ ΠΕΡΙΕΧΟΜΕΝΟ</p>';
    echo '<a href="login.php">Login</a>';
    echo '<p>ΑΝ ΔΕΝ ΕΙΣΤΕ ΜΕΛΟΣ ΠΑΡΑΚΑΛΩ ΕΓΓΡΑΦΕΙΤΕ</p>';
    echo '<a href="signup.php">Sing Up</a>';
    echo '</div>';
}

?>