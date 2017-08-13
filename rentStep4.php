<?php
session_start();
include 'databaseConnection.php';

// If the user is registered skip registration
if (!isset($_POST['checkBoxAreRegistered'])){
    include 'register.php';
    include 'addRent.php';
}else{
    $_SESSION['firstName'] = $_POST['firstName'];
    $_SESSION['lastName'] = $_POST['lastName'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
    include 'addRent.php';
    include 'login.php';
}



