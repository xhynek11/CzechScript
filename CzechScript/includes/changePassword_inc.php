<?php
session_start();
if (isset($_POST['change_button'])) {

    require_once 'dbh_inc.php';
    require_once 'functions_inc.php';

    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if ($password1 != $password2) {
        header("Location: ../changePassword.php?vkey=" . $_SESSION['vkey'] . "&id=" . $_SESSION['id'] . "&error=nomatch");
        exit();
    }
    if (empty($password1) && empty($password2)) {
        header("Location: ../changePassword.php?vkey=" . $_SESSION['vkey'] . "&id=" . $_SESSION['id'] . "&error=emptyfield");
        exit();
    }

    changePassword($conn, $password1, $_SESSION['id']);
} else {
    header("Location: ../forgotten.php?");
    exit();
}
