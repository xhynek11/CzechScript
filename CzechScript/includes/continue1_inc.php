<?php
session_start();
if (isset($_POST['continue_button'])) {
    require_once 'dbh_inc.php';
    require_once 'functions_inc.php';
    $proghtml =  $_SESSION['proghtml'] + 1;
    lessDatabaseUpdate($conn, $proghtml, $_SESSION['userId']);
    header("Location: ../course_html.php");
} else {
    header("Location: ../course_html.php");
    exit();
}
