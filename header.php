<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title><?php echo $title;?></title>      
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
      <header>
            <nav>
                  <div class="wrapper">
                        <ul>
                              <li><a href="index.php"><h2>Digital Library</h2></a></li>
                        </ul>
                        <div class="search-box">
                              <input  type="text" size="30" placeholder="Ποιό βιβλίο Ψάχνεις?">
                              <div class="result"></div>
                        </div>
                        <div class="login">
                              <?php
                                    if(isset($_SESSION['u_id'])){
                                          echo        '<a id="insertBook" href="insertbooks.php">Προσθήκη</a>';
                                          echo        '<form action="includes/logout.inc.php" method="POST">
                                                       <button type="submit" name="submit">Logout</button>
                                                      </form>';
                                    }else{
                                         echo   '
                                                      <a href="login.php">Login</a>
                                                      <a href="signup.php">Sing Up</a>';
                                    }
                              ?>
                              
                        </div>
                  </div>
            </nav>
      </header>

      