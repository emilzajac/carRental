<?php
    session_start();
    include 'databaseConnection.php';

if (isset($_POST['startPlace']) && isset($_POST['finishPlace']) && isset($_POST['startDate']) &&
    isset($_POST['finishDate']) && isset($_POST['startTime']) && isset($_POST['finishTime'])) {

    //Remember entered data
    $_SESSION['startPlace'] = $_POST['startPlace'];
    $_SESSION['finishPlace'] = $_POST['finishPlace'];
    $_SESSION['startDate'] = $_POST['startDate'];
    $_SESSION['finishDate'] = $_POST['finishDate'];
    $_SESSION['startTime'] = $_POST['startTime'];
    $_SESSION['finishTime'] = $_POST['finishTime'];
}
if (isset($_POST['carCategory'])){
    $_SESSION['carCategory'] = $_POST['carCategory'];
    $carCategory = $_SESSION['carCategory'];

    $_SESSION['numberOfDoors'] = $_POST['numberOfDoors'];
    $numberOfDoors = $_SESSION['numberOfDoors'];

    $_SESSION['fuel'] = $_POST['fuel'];
    $fuel = $_SESSION['fuel'];

    $_SESSION['seats'] = $_POST['seats'];
    $seats = $_SESSION['seats'];

    $_SESSION['gearBox'] = $_POST['gearBox'];
    $gearBox = $_SESSION['gearBox'];

    $query = "SELECT * FROM `cars` WHERE status='available' AND category='$carCategory' AND number_of_doors='$numberOfDoors' 
              AND fuel='$fuel' AND seats='$seats' AND gearbox='$gearBox'";
    $rowSelect = $mysqliConnect->query($query);
    $rowSelectProperty = $rowSelect->fetch_assoc();
    $_SESSION['image'] = $rowSelectProperty['image'];
}   else{
echo "car category and other properties are not set";
}

    //Assignment of stored data to variable
    $startPlace = $_SESSION['startPlace'];
    $finishPlace = $_SESSION['finishPlace'];
    $startDate = $_SESSION['startDate'];
    $finishDate = $_SESSION['finishDate'];
    $startTime = $_SESSION['startTime'];
    $finishTime = $_SESSION['finishTime'];

    $numberOfRentalDays = (strtotime($finishDate) - strtotime($startDate)) / (60 * 60 * 24);
    $timeDifference = (strtotime($finishTime) - strtotime($startTime)) / (60 *60);

    //if the time of return the car is exceeded, rental days is increases to +1
    if ($timeDifference > 0) {
        $numberOfRentalDays++;
    }
$_SESSION['numberOfRentalDays'] = $numberOfRentalDays;
?>

<!DOCTYPE html>
<html lang="EN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">

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
                        <b><?php echo $numberOfRentalDays?> days</b> <br> <br>
                    </div>
                    <div class="rentBox" id="totalCosts">
                        <p>Price of booking</p> <br>
                        Total price: <br> <b> select a car to calculate</b> <br>
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
                <?php
                if (isset($_POST['carCategory'])) {
                    do {
                        if ($rowSelect->num_rows == 0) {
                            echo "<h3>This car does not exist in database</h3>";
                            ?>
                        <?php } else if ($rowSelectProperty['car_id'] != 0) { ?>
                            <div class="gridCar">
                                <h1><?php echo $rowSelectProperty['branch'] . " " . $rowSelectProperty['name']; ?></h1>
                                <div class="carPicture">
                                    <img src="cars/<?php echo $rowSelectProperty['image']; ?>">
                                </div>
                                <div class="carInformation">
                                    <span>category: <?php echo $rowSelectProperty['category']; ?></span> <br>
                                    <span>number of seats: <?php echo $rowSelectProperty['seats']; ?></span> <br>
                                    <span>number of doors: <?php echo $rowSelectProperty['number_of_doors']; ?></span>
                                    <br>
                                    <span>fuel: <?php echo $rowSelectProperty['fuel']; ?></span> <br>
                                    <span>gearbox: <?php echo $rowSelectProperty['gearbox']; ?></span> <br>
                                    <span>hire cost per day <?php echo $rowSelectProperty['hire_cost'] . " PLN"; ?></span>
                                </div>
                                <a id="carSelectButton"
                                   href="rentStep3.php?car_id=<?php echo $rowSelectProperty['car_id']; ?>">
                                    <button class="button" type="submit">Select</button>
                                </a>
                            </div>
                        <?php }
                    } while ($rowSelectProperty = $rowSelect->fetch_assoc());
                }?>
            </section>
        <footer> Copyright &copy; <?php echo date("Y")?> All Rights Reserved | Designed by Emil Zając.</footer>
    </div>
</body>
</html>
