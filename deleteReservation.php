<?php
session_start();
include 'databaseConnection.php';

if (!empty($_GET['car_id'])) {
    //Deleting reservation in database
    $sql = "DELETE FROM `hire` WHERE car_id = '$_GET[car_id]' AND client_id='$_SESSION[clientId]'";
    if (!$mysqliConnect->query($sql)) {
        echo "Problem with deleting reservation";
    }
    //Update car status
    $sql = "UPDATE cars SET status = 'avaiable' WHERE car_id = '$_GET[car_id]'";
    if (!$mysqliConnect->query($sql)) {
        echo "Problem with updating status in deleting reservation";
    }
    $_SESSION['message'] = "Car was deleted from reservation";
    header("location: userProfile.php");
}else{
    echo 'error with deleting reservation';
}