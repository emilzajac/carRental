<?php

$result = $mysqliConnect->query("SELECT * FROM cars WHERE car_id='$_SESSION[car_id]'");

if ( $result->num_rows == 0 ){ // Car doesn't exist
    echo "No car in database table!";
}
else { // Car exists
    $carData = $result->fetch_assoc();

        //Assigned variables to session from database
        $_SESSION['branch'] = $carData['branch'];
        $_SESSION['name'] = $carData['name'];
        $_SESSION['carCategory'] = $carData['category'];
        $_SESSION['numberOfDoors'] = $carData['number_of_doors'];
        $_SESSION['fuel'] = $carData['fuel'];
        $_SESSION['seats'] = $carData['seats'];
        $_SESSION['gearBox'] = $carData['gearbox'];
        $_SESSION['image'] = $carData['image'];
        $_SESSION['hireCost'] = $carData['hire_cost'];
}

