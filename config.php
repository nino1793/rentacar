<?php
//konfiguracija baze podataka
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'rent';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysqli_select_db($conn, $dbname);
mysqli_query($conn, "SET NAMES utf8");
mysqli_query($conn, "SET CHARACTER SET utf8");
mysqli_query($conn, "SET COLLATION_CONNECTION='utf8_unicode_ci'");

?>