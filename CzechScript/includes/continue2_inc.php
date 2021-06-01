<?php
session_start();
if (isset($_POST['continue_button'])) {
    require_once 'dbh_html_inc.php';
    require_once 'dbh_inc.php';
    require_once 'functions_inc.php';
    $proghtml =  $_SESSION['proghtml'] + 1;
    $htmlDatabase = htmlDatabase($conn_html,  $_SESSION['proghtml']);
    $aRadio = $_POST['radio'];

    if ($aRadio[0] == 'radio_one') {
        if ($htmlDatabase['important'] == 1) {
            lessDatabaseUpdate($conn, $proghtml, $_SESSION['userId']);
            header("Location: ../course_html.php");
        } else {
            header("Location: ../course_html.php?error=wrongfirst");
        }
    } else if ($aRadio[0] == 'radio_two') {
        if ($htmlDatabase['important'] == 2) {
            lessDatabaseUpdate($conn, $proghtml, $_SESSION['userId']);
            header("Location: ../course_html.php");
        } else {
            header("Location: ../course_html.php?error=wrongsecond");
        }
    } else if ($aRadio[0] == 'radio_three') {
        if ($htmlDatabase['important'] == 3) {
            lessDatabaseUpdate($conn, $proghtml, $_SESSION['userId']);
            header("Location: ../course_html.php");
        } else {
            header("Location: ../course_html.php?error=wrongthird");
        }
    } else if ($aRadio[0] == 'radio_for') {
        if ($htmlDatabase['important'] == 4) {
            lessDatabaseUpdate($conn, $proghtml, $_SESSION['userId']);
            header("Location: ../course_html.php");
        } else {
            header("Location: ../course_html.php?error=wrongfourth");
        }
    } else if ($aRadio[0] == 'radio_five') {
        if ($htmlDatabase['important'] == 5) {
            lessDatabaseUpdate($conn, $proghtml, $_SESSION['userId']);
            header("Location: ../course_html.php");
        } else {
            header("Location: ../course_html.php?error=wrongfifth");
        }
    }
} else {
    header("Location: ../course_html.php");
    exit();
}
