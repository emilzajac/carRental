<?php
session_start();
include 'databaseConnection.php';
print_r($_POST);

if (!empty($_POST['firstNameChange']) || !empty($_POST['lastNameChange']) || !empty($_POST['emailChange']) 
        || !empty($_POST['passwordChange']) || !empty($_POST['dateOfBirthChange']) || !empty($_POST['genderChange']) 
        || !empty($_POST['locationChange'])) {

    if (!empty($_POST['firstNameChange'])) {
    $sql = "UPDATE users SET first_name = '$_POST[firstNameChange]' WHERE client_id = '$_SESSION[clientId]'";
    if (!$mysqliConnect->query($sql)) {
        echo "Problem with updating ";
    }
        $_SESSION['firstName'] = $_POST['firstNameChange'];
        
    }
    if (!empty($_POST['lastNameChange'])) {
        $sql = "UPDATE users SET last_name = '$_POST[lastNameChange]' WHERE client_id = '$_SESSION[clientId]'";
        if (!$mysqliConnect->query($sql)) {
            echo "Problem with updating ";
        }
        $_SESSION['lastName'] = $_POST['lastNameChange'];
        
    }
    if (!empty($_POST['emailChange'])) {
        
        // Check if user with that email already exists
        $result = $mysqliConnect->query("SELECT * FROM users WHERE NOT client_id='$_SESSION[clientId]' AND email='$_POST[emailChange]'") 
                or die($mysqliConnect->error());

        // We know user email exists if the rows returned are more than 0
        if ($result->num_rows > 0) {
            $_SESSION['error_email'] = "An account with this email already exists";
            if (isset($_POST['changePersonalDataButton'])) {
                header("location: userProfile.php");
            }
            exit();
        } else { // Email doesn't already exist in a database, proceed...
            $sql = "UPDATE users SET email = '$_POST[emailChange]' WHERE client_id = '$_SESSION[clientId]'";
            if (!$mysqliConnect->query($sql)) {
                echo "Problem with updating ";
            }
        }
        $_SESSION['email'] = $_POST['emailChange'];
        
    }
    if (!empty($_POST['passwordChange'])) {
        $password = $mysqliConnect->escape_string(password_hash($_POST['passwordChange'], PASSWORD_BCRYPT));
        $sql = "UPDATE users SET password = '$password' WHERE client_id = '$_SESSION[clientId]'";
        if (!$mysqliConnect->query($sql)) {
            echo "Problem with updating ";
        }
    }
    if (!empty($_POST['dateOfBirthChange'])) {
        $sql = "UPDATE users SET date_of_birth = '$_POST[dateOfBirthChange]' WHERE client_id = '$_SESSION[clientId]'";
        if (!$mysqliConnect->query($sql)) {
            echo "Problem with updating ";
        }
        $_SESSION['dateOfBirth'] = $_POST['dateOfBirthChange'];
        
    }
    if (!empty($_POST['genderChange']) and $_POST['genderChange'] != "Select Gender") {
        $sql = "UPDATE users SET gender = '$_POST[genderChange]' WHERE client_id = '$_SESSION[clientId]'";
        if (!$mysqliConnect->query($sql)) {
            echo "Problem with updating ";
        }
        $_SESSION['gender'] = $_POST['genderChange'];
        
    }
    if (!empty($_POST['locationChange'])) {
        $sql = "UPDATE users SET location = '$_POST[locationChange]' WHERE client_id = '$_SESSION[clientId]'";
        if (!$mysqliConnect->query($sql)) {
            echo "Problem with updating ";
        }
        $_SESSION['location'] = $_POST['locationChange'];
    }
    $_SESSION['message'] = "Personal data was changed";
    header("location: userProfile.php");
} else {
    $_SESSION['message'] = "Nothing was changed";
}





