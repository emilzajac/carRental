<?php
session_start();
require 'databaseConnection.php';
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$email = $mysqliConnect->escape_string($_POST['email']);

$result = $mysqliConnect->query("SELECT * FROM users WHERE email='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    echo "User with that email doesn't exist!";
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {

        //Assigned variables to session from database
        $_SESSION['email'] = $user['email'];
        $_SESSION['firstName'] = $user['first_name'];
        $_SESSION['lastName'] = $user['last_name'];
        $_SESSION['clientId'] = $user['client_id'];

        $_SESSION['dateOfBirth'] = $user['date_of_birth'];
        $_SESSION['gender'] = $user['gender'];
        $_SESSION['location'] = $user['location'];

        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

        header("location: userProfile.php");
    }
    else {
       echo "You have entered wrong password, try again!";
    }
}
?>
