<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="EN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">

  <title>Logout</title>

</head>
<body>
<img id="myImageBackground" src="img/1198.jpg" alt="">
    <div id="wrapper">
        <div class="form" id="log_out_form">
              <h1>Thank you for choosing car from us</h1>

              <p>You have been logged out!</p>

              <a href="Index.php"><button class="button">Home</button></a>

        </div>
    </div>
</body>
</html>
