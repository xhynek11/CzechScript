<?php
session_start();
if (isset($_POST['recover_button'])) {

    require_once 'dbh_inc.php';
    require_once 'functions_inc.php';

    $email = $_POST['email'];

    if (empty($email)) {
        header("Location: ../forgotten.php?error=emptyfield");
        exit();
    }
    if (emailExists($conn, $email) == false) {
        header("Location: ../forgotten.php?error=wrongmail");
        exit();
    }

    sendForgotenMail($conn, $email);
} else {
    header("Location: ../forgotten.php");
    exit();
}
