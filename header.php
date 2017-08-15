<header>
    <img src="img/streetcars.jpg" alt="cars picture">
    <h1 class="logo">Welcome in rent car system <br> Car for any pocket</h1>
    <div id="logIndiv">

        <?php 
        if (empty($_SESSION['logged_in'])) {
            echo '<a id="logIn" href="loginPage.php">Log In</a>';
            echo '<a id="signIn" href="signInPage.php">Sign In</a>';
        } else {
            echo '<a id="signIn" href="userProfile.php">Profile</a>';
            echo '<a id="signIn" href="logout.php">Log out</a>';
        }
        ?>
        
    </div>
    <nav id="topnav">
        <ul class="menu">
            <li><a href="Index.php">Search car</a></li>
            <li><a href="cars.php">Cars</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
</header>
