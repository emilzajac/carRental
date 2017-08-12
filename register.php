<?php
session_start();
include 'databaseConnection.php';
/* Registration process, inserts user info into the database */

$_SESSION['firstName'] = $_POST['firstName'];
$_SESSION['lastName'] = $_POST['lastName'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['dateOfBirth'] = $_POST['dateOfBirth'];
$_SESSION['gender'] = $_POST['gender'];
$_SESSION['location'] = $_POST['location'];

$dateOfBirth = $_SESSION['dateOfBirth'];
$gender = $_SESSION['gender'];
$location = $_SESSION['location'];

// Escape $_POST variables to protect against SQL injections
$first_name = $mysqliConnect->escape_string($_POST['firstName']);
$last_name = $mysqliConnect->escape_string($_POST['lastName']);
$email = $mysqliConnect->escape_string($_POST['email']);
$password = $mysqliConnect->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));

// Check if user with that email already exists
$result = $mysqliConnect->query("SELECT * FROM users WHERE email='$email'") or die($mysqliConnect->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    $_SESSION['error_email'] = "An account with this email already exists";
    if (isset($_POST['registerFromHomePage'])) {
        header("location: signInPage.php");
    }else{
        header("location: rentStep3.php");
    }
    exit();
}

else { // Email doesn't already exist in a database, proceed...
    $sql = "INSERT INTO users (first_name, last_name, email, date_of_birth, password, gender, location) "
        . "VALUES ('$first_name','$last_name','$email','$dateOfBirth','$password','$gender','$location')";
    // Add user to the database
    if ( !$mysqliConnect->query($sql) ) {
        echo "Registration falied";
    }else{
        $_SESSION['message'] = "You can now rent a car, go to Home page and make a reservation";
        header("location: success.php");
    }
}


