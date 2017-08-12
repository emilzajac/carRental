<?php
session_start();
include 'databaseConnection.php';
$query = "SELECT * FROM cars";
$rowSelect = $mysqliConnect->query($query);
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
            <h2> Below are our cars</h2>
            <div class="carsSection">
                <?php
                while($rowSelectProperty = $rowSelect->fetch_assoc()){
                    ?>
                <div class="gridCar">
                    <h1><?php echo $rowSelectProperty['branch'] . " " .$rowSelectProperty['name'];?></h1>
                    <div class="carPicture">
                        <img  src="cars/<?php echo $rowSelectProperty['image'];?>">
                    </div>
                    <div class="carInformation">
                        <span>category: <?php echo $rowSelectProperty['category'];?></span> <br>
                        <span>number of seats: <?php echo $rowSelectProperty['seats'];?></span> <br>
                        <span>number of doors: <?php echo $rowSelectProperty['number_of_doors'];?></span> <br>
                        <span>fuel: <?php echo $rowSelectProperty['fuel'];?></span> <br>
                        <span>gearbox: <?php echo $rowSelectProperty['gearbox'];?></span> <br>
                        <span>hire cost per day: <?php echo $rowSelectProperty['hire_cost'] . " PLN";?></span> <br>
                        <span>category: <b><?php echo $rowSelectProperty['status'];?></b></span> <br>
                    </div>
                </div>
                <?php } ?>
            </div>
        <footer> Copyright &copy; <?php echo date("Y")?> All Rights Reserved | Designed by Emil Zając.</footer>
    </div>
</body>
</html>