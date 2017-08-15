<?php 
/* Page with form login */
session_start();
require 'databaseConnection.php';
?>
<!DOCTYPE html>
<html lang="EN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">

  <title>Login Form</title>

</head>
<body>
<img id="myImageBackground" src="img/1198.jpg" alt="">
    <div id="wrapper">
        <?php
        include 'header.php';
        ?>
        <div class="form" id="login_page_form">
            <div id="login">
                <h1>Welcome Back!</h1>
                <form action="login.php" method="post">
                <table>
                    <tr>
                        <td>E-mail address:</td>
                        <td><input type="email" name="email" value="<?php
                            if (isset($_SESSION['email'])) {
                                echo $_SESSION['email'];
                                unset($_SESSION['email']);
                            }
                            ?>" required></td>
                        <?php
                        if (isset($_SESSION['error_email'])) {
                            echo '<tr> <th colspan="2" class = "error"> ' . $_SESSION['error_email'] . ' </th> </tr>';
                            unset($_SESSION['error_email']);
                        }
                        ?>
                    </tr>
                    <tr id="password_label">
                        <td>Password:</td>
                        <td><input id="password_input" type="password" name="password"  required></td>
                        <?php
                        if (isset($_SESSION['error_password'])) {
                            echo '<tr> <th colspan="2" class = "error"> ' . $_SESSION['error_password'] . ' </th> </tr>';
                            unset($_SESSION['error_password']);
                        }
                        ?>
                    </tr>
                </table>
                    <button class="button" type="submit" name="login" >Log In</button>
                </form>
            </div>
        </div>
        <footer> Copyright &copy; <?php echo date("Y")?> All Rights Reserved | Designed by Emil Zając.</footer>
    </div>
</body>
</html>
