<div id="message_form">
    <div>
        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            echo 'Problem with displaying messages!';
        }
        ?>
    </div>
    <br>
    <button class="button" type="button" onclick="toggle();" >OK</button>
</div>



