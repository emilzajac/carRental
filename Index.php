<?php
session_start();
?>
<!DOCTYPE html>
<html lang="EN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">

    <title>Rent cars</title>

</head>
<body>
    <img id="myImageBackground" src="img/1198.jpg" alt="">
    <div id="wrapper">
        <?php
            include 'header.php';
        ?>
            <h2>Make a Reservation. Find a rent car:</h2>
            <form id="search" action="rentStep2.php" method="post">
                <div class="label_input">
                    <label for="startPlace">Choose City to rent:</label>
                    <input type="text" id="startPlace" name="startPlace" value="<?php
                    if (isset($_SESSION['startPlace'])) {
                        echo $_SESSION['startPlace'];
                    }
                    ?>" required>
                </div>

                <div class="label_input">
                    <label for="finishPlace">Choose City to return:</label>
                    <input type="text" id="finishPlace" name="finishPlace" value="<?php
                    if (isset($_SESSION['finishPlace'])) {
                        echo $_SESSION['finishPlace'];
                    }
                    ?>" required>
                </div>
                <div id="track_start">
                    <div class="inline" id="track_start_date">
                        <label for="startDate">Start Date:</label>
                        <input type="date" id="startDate" name="startDate" value="<?php
                        if (isset($_SESSION['startDate'])) {
                            echo $_SESSION['startDate'];
                        }
                        ?>" required>
                    </div>
                    <div class="inline" id="track_start_time">
                        <label for="startTime">Start Time:</label>
                        <input type="time" id="startTime" name="startTime" value="<?php
                        if (isset($_SESSION['startTime'])) {
                            echo $_SESSION['startTime'];
                        }
                        ?>" required>
                    </div>
                </div>
                <br>
                <div id="track_finish">
                    <div class="inline" id="track_finish_date">
                        <label for="finishDate">Finish Date:</label>
                        <input type="date" id="finishDate" name="finishDate" value="<?php
                        if (isset($_SESSION['finishDate'])) {
                            echo $_SESSION['finishDate'];
                        }
                        ?>" required>
                    </div>
                    <div class="inline" id="track_finish_time">
                        <label for="finishTime">Finish Time:</label>
                        <input type="time" id="finishTime" name="finishTime" value="<?php
                        if (isset($_SESSION['finishTime'])) {
                            echo $_SESSION['finishTime'];
                        }
                        ?>" required>
                    </div>
                </div>
                <button class="button" type="submit" id="button_send">Next Step</button>
            </form>
        <footer> Copyright &copy; <?php echo date("Y")?> All Rights Reserved | Designed by Emil Zając.</footer>
    </div>
</body>
</html>