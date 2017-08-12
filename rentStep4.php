<?php
session_start();
include 'databaseConnection.php';

// If the user is registered skip registration
if (!isset($_POST['checkBoxAreRegistered'])){
    include 'register.php';
    include 'addRent.php';
}else{
    include 'addRent.php';
    include 'login.php';
}



