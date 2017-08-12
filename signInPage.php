<?php
/* Page with form signin */
session_start();
require 'databaseConnection.php';
//print_r($_SESSION);
////session_unset();
////session_destroy();
?>
<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&amp;subset=latin-ext" rel="stylesheet">
        <link rel="stylesheet" href="style/style.css">

        <title>Signin Form</title>

    </head>
    <body>
        <img id="myImageBackground" src="img/1198.jpg" alt="">
        <div id="wrapper">
            <?php
            include 'header.php';
            ?>
            <div class="form" id="signin_page_form">
                <div>
                    <h1>Sign In!</h1>
                    <form action="register.php" method="post">
                        <table>
                            <tr>
                                <td>First name:</td>
                                <td><input type="text" name="firstName" value="<?php
                                    if (isset($_SESSION['firstName'])) {
                                        echo $_SESSION['firstName'];
                                        unset($_SESSION['firstName']);
                                    }
                                    ?>" required></td>
                            </tr>
                            <tr>
                                <td>Last name:</td>
                                <td><input type="text" name="lastName" value="<?php
                                    if (isset($_SESSION['lastName'])) {
                                        echo $_SESSION['lastName'];
                                        unset($_SESSION['lastName']);
                                    }
                                    ?>" required></td>
                            </tr>
                            <tr>
                                <td>E-mail address:</td>
                                <td><input type="email" name="email" value="<?php
                                    if (isset($_SESSION['email'])) {
                                        echo $_SESSION['email'];
                                        unset($_SESSION['email']);
                                    }
                                    ?>" required></td>
                            </tr>
                            <?php
                            if (isset($_SESSION['error_email'])) {
                                echo '<tr> <th colspan="2" class = "error"> ' . $_SESSION['error_email'] . ' </th> </tr>';
                                unset($_SESSION['error_email']);
                            }
                            ?>
                            <tr id="password_label">
                                <td>Password:</td>
                                <td><input id="password_input" type="password" name="password"  required></td>
                            </tr>
                            <tr id="dateOfBirth_label">
                                <td>Date of birth:</td>
                                <td><input id="dateOfBirth_input" type="date" name="dateOfBirth" value="<?php
                                    if (isset($_SESSION['dateOfBirth'])) {
                                        echo $_SESSION['dateOfBirth'];
                                        unset($_SESSION['dateOfBirth']);
                                    }
                                    ?>" required ></td>
                            </tr>
                            <tr id="gender_select">
                                <td>Gender:</td>
                                <td>
                                    <select required id="gender_option" name="gender" >
                                        <option> Select Gender </option>
                                        <option> Male </option>
                                        <option> Female </option>
                                    </select>
                                </td>
                            </tr>
                            <tr id="location_label">
                                <td>Location:</td>
                                <td><input id="location_input" type="text" name="location" value="<?php
                                    if (isset($_SESSION['location'])) {
                                        echo $_SESSION['location'];
                                        unset($_SESSION['location']);
                                    }
                                    ?>" required></td>
                            </tr>
                        </table>
                        <?php  ?>
                        <button class="button" type="submit" name="registerFromHomePage" >Sign In</button>
                    </form>
                </div>
            </div>
            <footer> Copyright &copy; <?php echo date("Y") ?> All Rights Reserved | Designed by Emil Zając.</footer>
        </div>
    </body>
</html>





