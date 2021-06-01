<?php
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "courses";

$conn_html = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn_html) {
    die("Connection failed: " . mysqli_connect_error());
}
