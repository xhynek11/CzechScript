<?php
require "header.php";
require_once 'includes/dbh_inc.php';
require_once "includes/functions_inc.php";

$_SESSION['vkey'] = $_GET['vkey'];
$_SESSION['id'] = $_GET['id'];

vkeyIdDatabase($conn, $_SESSION['vkey'], $_SESSION['id']);

?>
<main>
    <div class="container">
        <div class="formBx">
            <form action="includes/changePassword_inc.php" method="post">
                <h2>Change password</h2>
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "nomatch") {
                        echo '<p class="signuperror">Your password do not match!</p>';
                    }
                    if ($_GET['error'] == "emptyfield") {
                        echo '<p class="signuperror">Please fill both field\'s!</p>';
                    }
                } else {
                    echo "<p class='forgetten'>Enter your new save password!</p>";
                }
                ?>
                <input type="password" name="password1" placeholder="Password...">
                <input type="password" name="password2" placeholder="Again Password...">
                <input type="submit" name="change_button" value="Change">
                <p class="signup">New to CzechScript? <a href="register.php">Create an Account.</a></p>
                <p class="signup">Already have an account ? <a href="login.php">Sign In.</a></p>
            </form>
        </div>
    </div>
</main>
<?php
require "footer.php";
?>