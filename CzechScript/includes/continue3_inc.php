<?php
session_start();
if (isset($_POST['continue_button'])) {
    require_once 'dbh_html_inc.php';
    require_once 'dbh_inc.php';
    require_once 'functions_inc.php';
    $proghtml =  $_SESSION['proghtml'] + 1;
    $htmlDatabase = htmlDatabase($conn_html,  $_SESSION['proghtml']);
    $aAnsw = $_POST['answ'];

    if ($aAnsw[0] == $htmlDatabase['first_code'] && $aAnsw[1] == $htmlDatabase['second_code']) {
        lessDatabaseUpdate($conn, $proghtml, $_SESSION['userId']);
        header("Location: ../course_html.php");
    } else {
        header("Location: ../course_html.php?error=wrongboth");
    }
} else {
    header("Location: ../course_html.php");
    exit();
}


