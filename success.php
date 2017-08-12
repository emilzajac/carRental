<?php
/* Displays all successful messages */
session_start();
?>
<!DOCTYPE html>
<html lang="EN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
  <title>Success</title>
</head>
<body>
<img id="myImageBackground" src="img/1198.jpg" alt="">
    <div id="wrapper">
        <div class="form" id="success_form">
            <h1>Success</h1>
            <p>
            <?php
            if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
                echo $_SESSION['message'];
                session_unset();
                session_destroy();
            else:
                header( "location: Index.php" );
            endif;
            ?>
            </p>
            <a href="Index.php"><button class="button">Home</button></a>
        </div>
    </div>
</body>
</html>
