<?php
if (isset($_SESSION['userId'])) {
    require_once 'dbh_html_inc.php';
    require_once 'dbh_inc.php';
    require_once 'functions_inc.php';

    $lessDatabase = lessDatabase($conn, $_SESSION['userId']);
    $_SESSION['proghtml'] = $lessDatabase['proghtml'];
    $htmlDatabase = htmlDatabase($conn_html,  $_SESSION['proghtml']);
} else {
    setcookie('redirect', 'course_html.php', time() + (3600));
    header("Location: ../CzechScript/login.php?redirect=course_html.php");
    exit();
}
