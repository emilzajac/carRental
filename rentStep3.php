<?php
    session_start();
    include 'databaseConnection.php';

//When we press button SELECT this procedure calculate the price of marked car
if ( isset( $_GET['car_id'] ) ) {
    $_SESSION['car_id'] = $_GET['car_id'];
    $query = "SELECT * FROM `cars` WHERE status='available' AND car_id='$_SESSION[car_id]'";
    $rowSelect = $mysqliConnect->query($query);
    $rowSelectProperty = $rowSelect->fetch_assoc();
    $carPrice = $rowSelectProperty['hire_cost'];
    $totalPrice = $_SESSION['numberOfRentalDays']  * $carPrice;
    $_SESSION['totalPrice'] = $totalPrice;
    include 'carsData.php';
}else{
    echo "car ID is not set";
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

    <title>Rent car</title>
</head>
<body>
<img id="myImageBackground" src="img/1198.jpg" alt="">
    <div id="wrapper">
        <?php
            include 'header.php';
        ?>
            <form action="rentStep2.php" id="selectionForm" method="post">
                <h2>Your selection:</h2>
                <section id="summary">
                    <div class="rentBox" id="rental">
                        <p>Rental</p> <br>
                        Date: <?php if (isset($_SESSION['startDate'])) {
                            echo $_SESSION['startDate'];
                        }?> <br>
                        Place: <?php if (isset($_SESSION['startPlace'])) {
                            echo $_SESSION['startPlace'];
                        }?>

                    </div>
                    <div class="rentBox" id="return">
                        <p>Return</p> <br>
                        Date: <?php if (isset($_SESSION['finishDate'])) {
                            echo $_SESSION['finishDate'];
                        }?> <br>
                        Place: <?php if (isset($_SESSION['finishPlace'])) {
                            echo $_SESSION['finishPlace'];
                        }?>
                    </div>
                    <div class="rentBox" id="days">
                        <p>Number of rental days</p> <br>
                        <b><?php echo $_SESSION['numberOfRentalDays']?> days</b> <br> <br>
                    </div>
                    <div class="rentBox" id="totalCosts">
                        <p>Price of booking</p> <br>
                        Total price: <br> <b><?php echo $_SESSION['totalPrice']?> PLN</b> <br>
                    </div>
                </section>
                <section id="selectionCarPlaceholder">
                    <div class="inline">
                        <label>Category</label>
                        <select class="filter" name="carCategory">
                            <option value="<?php if (isset($_SESSION['carCategory'])) {
                                echo $_SESSION['carCategory'];
                            }else{
                                echo '';
                            }?> " selected="selected"><?php if (isset($_SESSION['carCategory'])) {
                                    echo $_SESSION['carCategory'];
                                }else{
                                echo '-select-';
                                }?> </option>
                            <option value="MINI">MINI</option>
                            <option value="ECONOMY">ECONOMY</option>
                            <option value="FAMILY">FAMILY</option>
                            <option value="SUV">SUV</option>
                            <option value="LUXURY">LUXURY</option>
                            <option value="VAN">VAN</option>

                        </select>
                    </div>
                    <div class="inline">
                        <label>Number of doors</label>
                        <select class="filter" name="numberOfDoors">
                            <option value="<?php if (isset($_SESSION['numberOfDoors'])) {
                                echo $_SESSION['numberOfDoors'];
                            }else{
                                echo '';
                            }?> " selected="selected"><?php if (isset($_SESSION['numberOfDoors'])) {
                                    echo $_SESSION['numberOfDoors'];
                                }else{
                                    echo '-select-';
                                }?> </option>
                            <option value="3">3</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="inline">
                        <label>Fuel</label>
                        <select class="filter" name="fuel">
                            <option value="<?php if (isset($_SESSION['fuel'])) {
                                echo $_SESSION['fuel'];
                            }else{
                                echo '';
                            }?> " selected="selected"><?php if (isset($_SESSION['fuel'])) {
                                    echo $_SESSION['fuel'];
                                }else{
                                    echo '-select-';
                                }?> </option>
                            <option value="oil">oil</option>
                            <option value="petrol">petrol</option>
                        </select>
                    </div>
                    <div class="inline">
                        <label>Seats</label>
                        <select class="filter" name="seats">
                            <option value="<?php if (isset($_SESSION['seats'])) {
                                echo $_SESSION['seats'];
                            }else{
                                echo '';
                            }?> " selected="selected"><?php if (isset($_SESSION['seats'])) {
                                    echo $_SESSION['seats'];
                                }else{
                                    echo '-select-';
                                }?> </option>
                            <option value="2">2</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="inline">
                        <label>Gearbox</label>
                        <select class="filter" name="gearBox">
                            <option value="<?php if (isset($_SESSION['gearBox'])) {
                                echo $_SESSION['gearBox'];
                            }else{
                                echo '';
                            }?> " selected="selected"><?php if (isset($_SESSION['gearBox'])) {
                                    echo $_SESSION['gearBox'];
                                }else{
                                    echo '-select-';
                                }?> </option>
                            <option value="automat">automat</option>
                            <option value="manual">manual</option>
                        </select>
                    </div>
                </section>
                <div id="selectionCarPlaceholder">
                    <button class="button" type="submit" id="selectionCarButton">Search</button>
                </div>
            </form>
            <section class="carsSection">
                    <div class="gridCar">
                        <h1><?php echo $_SESSION['branch'] . " " . $_SESSION['name']; ?></h1>
                        <div class="carPicture">
                            <img src="cars/<?php echo $_SESSION['image']; ?>">
                        </div>
                        <div class="carInformation">
                            <span>category: <?php echo $_SESSION['carCategory']; ?></span> <br>
                            <span>number of seats: <?php echo $_SESSION['seats']; ?></span> <br>
                            <span>number of doors: <?php echo $_SESSION['numberOfDoors']; ?></span> <br>
                            <span>fuel: <?php echo $_SESSION['fuel']; ?></span> <br>
                            <span>gearbox: <?php echo $_SESSION['gearBox']; ?></span> <br>
                            <span>hire cost per day <?php echo $_SESSION['hireCost'] . " PLN"; ?></span>
                        </div>
                    </div>
                <form id="sentForm" class="gridCar" action="rentStep4.php" method="post">
                    <div>
                        <h3>Enter booking details and register</h3>
                        <div class="checkbox">
                            <input id="isRegistered" type="checkbox" name="checkBoxAreRegistered"> Are you registered?
                        </div>
                        <table>
                            <tr>
                                <td>First name:</td>
                                <td><input type="text" name="firstName" value="<?php
                                    if (isset($_SESSION['firstName'])) {
                                        echo $_SESSION['firstName'];
                                        unset($_SESSION['firstName']);
                                    }
                                    ?>" required></td>
                            </tr>
                            <tr>
                                <td>Last name:</td>
                                <td><input type="text" name="lastName" value="<?php
                                    if (isset($_SESSION['lastName'])) {
                                        echo $_SESSION['lastName'];
                                        unset($_SESSION['lastName']);
                                    }
                                    ?>" required></td>
                            </tr>
                            <tr>
                                <td>E-mail address:</td>
                                <td><input type="email" name="email" value="<?php
                                    if (isset($_SESSION['email'])) {
                                        echo $_SESSION['email'];
                                        unset($_SESSION['email']);
                                    }
                                    ?>" required></td>
                            </tr>
                            <?php
                            if (isset($_SESSION['error_email'])) {
                                echo '<tr> <th colspan="2" class = "error"> '. $_SESSION['error_email'] .' </th> </tr>';
                                unset($_SESSION['error_email']);
                            }
                            ?>
                            <tr id="password_label">
                                <td>Password:</td>
                                <td><input id="password_input" type="password" name="password"  required></td>
                            </tr>
                            <tr id="dateOfBirth_label">
                                <td>Date of birth:</td>
                                <td><input id="dateOfBirth_input" type="date" name="dateOfBirth" value="<?php
                                    if (isset($_SESSION['dateOfBirth'])) {
                                        echo $_SESSION['dateOfBirth'];
                                        unset($_SESSION['dateOfBirth']);
                                    }
                                    ?>" required ></td>
                            </tr>
                            <tr id="gender_select">
                                <td>Gender:</td>
                                <td>
                                    <select required id="gender_option" name="gender" >
                                        <option> Select Gender </option>
                                        <option> Male </option>
                                        <option> Female </option>
                                    </select>
                                </td>
                            </tr>
                            <tr id="location_label">
                                <td>Location:</td>
                                <td><input id="location_input" type="text" name="location" value="<?php
                                    if (isset($_SESSION['location'])) {
                                        echo $_SESSION['location'];
                                        unset($_SESSION['location']);
                                    }
                                    ?>" required></td>
                            </tr>
                        </table>
                        <button class="button" type="submit" name="rentCarButton">Make a booking</button>
                    </div>
                </form>
            </section>
        <footer> Copyright &copy; <?php echo date("Y")?> All Rights Reserved | Designed by Emil Zając.</footer>
    </div>
</body>
</html>