<?php
//konfiguracija baze podataka
$dbhost = 'localhost';
$dbuser = 'rwa192022';
$dbpass = 'csdigital2022';
$dbname = 'rent';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysqli_select_db($conn, $dbname);
mysqli_query($conn, "SET NAMES utf8");
mysqli_query($conn, "SET CHARACTER SET utf8");
mysqli_query($conn, "SET COLLATION_CONNECTION='utf8_unicode_ci'");

?>