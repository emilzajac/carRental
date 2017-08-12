<?php
session_start();
include 'databaseConnection.php';

$_SESSION['firstName'] = $_POST['firstName'];
$_SESSION['lastName'] = $_POST['lastName'];
$_SESSION['email'] = $_POST['email'];

$_SESSION['password'] = $_POST['password'];
$_SESSION['dateOfBirth'] = $_POST['dateOfBirth'];
$_SESSION['gender'] = $_POST['gender'];
$_SESSION['location'] = $_POST['location'];

// If the user is registered skip registration
if (!isset($_POST['checkBoxAreRegistered'])){
    include 'register.php';
    include 'addRent.php';
}else{
    include 'addRent.php';
    include 'login.php';
}



