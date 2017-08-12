<?php
session_start();
//Assignment of stored data to variable
$startPlace = $_SESSION['startPlace'];
$finishPlace = $_SESSION['finishPlace'];
$startDate = $_SESSION['startDate'];
$finishDate = $_SESSION['finishDate'];
$startTime = $_SESSION['startTime'];
$finishTime = $_SESSION['finishTime'];
$totalPrice = $_SESSION['totalPrice'];
$numberOfRentalDays = $_SESSION['numberOfRentalDays'];

$first_name = $_SESSION['firstName'];
$last_name = $_SESSION['lastName'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];

//Add rent data
$result = $mysqliConnect->query("SELECT * FROM users WHERE email='$email' AND first_name='$first_name' AND last_name='$last_name'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    echo "User doesn't exist!";
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_SESSION['password'], $user['password']) ) {

        $clientId = $user['client_id'];
        $_SESSION['clientId'] = $clientId;
        $car_id = $_SESSION['car_id'];

        //Update car status
        $sql = "UPDATE cars SET status = 'Inaccessible' WHERE car_id = '$car_id'";
        if (!$mysqliConnect->query($sql)) {
            echo "Problem with updating status step4";
        }

        // add information about hire car
        $sql = "INSERT INTO hire (client_id, car_id, start_place, finish_place, start_date, start_time, finish_date, finish_time,number_of_rental_days, total_price) "
            . "VALUES ('$clientId','$car_id','$startPlace','$finishPlace','$startDate','$startTime','$finishDate','$finishTime','$numberOfRentalDays','$totalPrice')";
        if (!$mysqliConnect->query($sql)){
            echo "Registration failed line 72 rent step4";
        }else{
            $_SESSION['message'] = "Go to homepage and login";
            header("location: success.php");
        }
    }
    else {
        echo "You have entered wrong password, try again!";
    }
}

?>