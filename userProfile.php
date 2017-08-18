<?php
/* Displays user information and some useful messages */
session_start();
include 'databaseConnection.php';

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  echo "You must log in before viewing your profile page!";
}
?>
<!DOCTYPE html>
<html lang="EN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <script src="javaScript/jquery.js"></script>
    <script src="javaScript/jsScript.js"></script>
    
  <title>Profile</title>
  
</head>
<body>
<img id="myImageBackground" src="img/1198.jpg" alt="">
    <div id="wrapper">
        <div class="form" id="user_profile_form">
          <div id="top_information">
              <h1>Welcome</h1>
              <h2><?php echo $_SESSION['firstName'].' '.$_SESSION['lastName']; ?></h2>
              <p id="display_email"><?php echo $_SESSION['email'] ?></p>
              <h3>Below are your current rent car details and reservation</h3>
          </div>
            <a id="logOutdiv" href="logout.php"><button class="button" name="logout">LOG OUT</button></a>
            <div id="personalDataChangeDiv">
                Personal settings: <button id="personalSettingsButton" class="button">CHANGE</button>
                <div id="goToHomePageDiv">
                    Go to home page: 
                    <a  href="Index.php">
                        <button id="goToHomePageButton" class="button">HOME</button>
                    </a>
                </div>
            </div>
            <div class="carsSection">
              <?php
              $query_hire = "SELECT * FROM hire WHERE client_id='$_SESSION[clientId]'";
              $result_hire = $mysqliConnect->query($query_hire);
              $hireData = $result_hire->fetch_assoc();
              if (!empty($hireData)) {
                do{
                    $query_car = "SELECT * FROM cars WHERE car_id='$hireData[car_id]'";
                    $result_car = $mysqliConnect->query($query_car);
                    $carData = $result_car->fetch_assoc();
                    do{
                    ?>
                    <div class="gridCar">
                        <h1><?php echo $carData['branch'] . " " .$carData['name'];?></h1>
                        <div class="carPicture">
                            <img  src="cars/<?php echo $carData['image'];?>">
                        </div>
                        <div class="carInformation">
                            <h3>Car details:</h3>
                            <span>category: <?php echo $carData['category'];?></span> <br>
                            <span>number of seats: <?php echo $carData['seats'];?></span> <br>
                            <span>number of doors: <?php echo $carData['number_of_doors'];?></span> <br>
                            <span>fuel: <?php echo $carData['fuel'];?></span> <br>
                            <span>gearbox: <?php echo $carData['gearbox'];?></span> <br>
                            <span>hire cost per day: <?php echo $carData['hire_cost'] . " PLN";?></span>

                            <h3>Reservation details:</h3>
                            <h4>Rental:</h4>
                            <span>place: <?php echo $hireData['start_place'];?></span> <br>
                            <span>date: <?php echo $hireData['start_date'];?></span> <br>
                            <span>time: <?php echo $hireData['start_time'];?></span> <br>
                            <h4>Return:</h4>
                            <span>place: <?php echo $hireData['finish_place'];?></span> <br>
                            <span>date: <?php echo $hireData['finish_date'];?></span> <br>
                            <span>time: <?php echo $hireData['finish_time'];?></span> <br>
                            <br>
                            <h4>Summary:</h4>
                            <span>Number of rental days: <?php echo $hireData['number_of_rental_days'];?></span> <br>
                            <span>Total price: <?php echo $hireData['total_price']." PLN";?></span> <br>
                        </div>
                        <a id="carSelectButton"
                           href="deleteReservation.php?car_id=<?php echo $carData['car_id']; ?>">
                            <button class="button" type="submit" name="deleteCarButton" >DELETE RESERVATION</button>
                        </a>
                    </div>
                  <?php }while($carData = $result_car->fetch_assoc());
                  }while($hireData = $result_hire->fetch_assoc()); 
              }else{
                  echo"<h1>There is no hire cars in your account jet</h1>";
              }
              ?>
            </div>
           
            <?php
//            Display messages
              if (!empty($_SESSION['message'])){
                  include 'messages.php';
            }
            ?>
            
            <div id="personal_data">
                <div>
                    <h3>Your personal data</h3>
                    <form action="changePersonalData.php" method="post">
                        <table>
                            <tr>
                                <td>First name:</td>
                                <td><?php echo $_SESSION['firstName'] ?></td>
                                <td><input type="text" name="firstNameChange" value="" ></td>
                            </tr>
                            <tr>
                                <td>Last name:</td>
                                <td><?php echo $_SESSION['lastName'] ?></td>
                                <td><input type="text" name="lastNameChange" value="" ></td>
                            </tr>
                            <tr>
                                <td>E-mail address:</td>
                                <td><?php echo $_SESSION['email'] ?></td>
                                <td><input type="text" name="emailChange" value="" ></td>
                            </tr>
                            <?php
                            if (isset($_SESSION['error_email'])) {
                                echo '<tr> <th colspan="2" class = "error"> ' . $_SESSION['error_email'] . ' </th> </tr>';
                                unset($_SESSION['error_email']);
                            }
                            ?>
                            <tr id="password_label">
                                <td>Password:</td>
                                <td>********</td>
                                <td><input type="password" name="passwordChange" value="" ></td>
                            </tr>
                            <tr id="dateOfBirth_label">
                                <td>Date of birth:</td>
                                <td><?php echo $_SESSION['dateOfBirth'] ?></td>
                                <td><input type="date" name="dateOfBirthChange" value="" ></td>
                            </tr>
                            <tr id="gender_select">
                                <td>Gender:</td>
                                <td><?php echo $_SESSION['gender'] ?></td>
                                <td><select required id="gender_option" name="genderChange" >
                                        <option> Select Gender </option>
                                        <option> Male </option>
                                        <option> Female </option>
                                    </select>
                                </td>
                            </tr>
                            <tr id="location_label">
                                <td>Location:</td>
                                <td><?php echo $_SESSION['location'] ?></td>
                                <td><input type="text" name="locationChange" value="" ></td>
                            </tr>
                        </table>
                        <button class="button" type="submit" name="changePersonalDataButton" >CONFIRM</button>
                        <button class="button" id="personalSettingsCancelButton" type="button">CANCEL</button>
                    </form>
                    <br>
                </div>
            </div>
    </div>
        <footer> Copyright &copy; <?php echo date("Y")?> All Rights Reserved | Designed by Emil Zając.</footer>
</div>
</body>
</html> 
