<?php

$result = $mysqliConnect->query("SELECT * FROM hire WHERE client_id='$_SESSION[clientId]'");

if ( $result->num_rows == 0 ){ // Rent doesn't exist
    echo "No rent in database table!";
}
else { // Rent exists
    $hireData = $result->fetch_assoc();

    //Assigned variables to session from database
    $_SESSION['startPlace'] = $hireData['start_place'];
    $_SESSION['finishPlace'] = $hireData['finish_place'];
    $_SESSION['startDate'] = $hireData['start_date'];
    $_SESSION['finishDate'] = $hireData['finish_date'];
    $_SESSION['startTime'] = $hireData['start_time'];
    $_SESSION['finishTime'] = $hireData['finish_time'];
    $_SESSION['numberOfRentalDays'] = $hireData['number_of_rental_days'];
    $_SESSION['totalPrice'] = $hireData['total_price'];
    $_SESSION['car_id'] = $hireData['car_id'];
}

