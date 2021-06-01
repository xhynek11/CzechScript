<?php
require "header.php";
?>
<main>
    <div class="container">
        <div class="formBx">
            <form action="includes/forgotten_inc.php" method="post">
                <h2>Password Recovery</h2>
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "wrongmail") {
                        echo '<p class="signuperror">You entered wrong email!</p>';
                    }
                } else if (isset($_GET['succes'])) {
                    if ($_GET['succes'] == "emailsend") {
                        echo '<p class="signupsucces">We send you password recovery email!</p>';
                    }
                } else {
                    echo "<p class='forgetten'>Enter your account's email address to recover your password.</p>";
                }
                ?>
                <input type="text" name="email" placeholder="Email...">
                <input type="submit" name="recover_button" value="Recover">
                <p class="signup">New to CzechScript? <a href="register.php">Create an Account.</a></p>
                <p class="signup">Already have an account ? <a href="login.php">Sign In.</a></p>
            </form>
        </div>
    </div>
</main>
<?php
require "footer.php";
?>