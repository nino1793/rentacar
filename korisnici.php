<html>

<head><title>RENT</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'rent';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysqli_select_db($conn, $dbname);
mysqli_query($conn, "SET NAMES utf8");
mysqli_query($conn, "SET CHARACTER SET utf8");
mysqli_query($conn, "SET COLLATION_CONNECTION='utf8_unicode_ci'");


 $Ime=$_POST['Ime'];
 $Prezime=$_POST['Prezime'];
 $Email=$_POST['Email'];
 $Username=$_POST['Username'];
 $Lozinka=md5($_POST['Lozinka']);
 
 
 $sql="INSERT INTO Korisnik (idKorisnik, Ime, Prezime, Email, Username, Lozinka ) VALUES(NULL, '$Ime', '$Prezime', '$Email', '$Username', '$Lozinka')";
 if(!mysqli_query($conn, $sql,$conn)){
	 die('Greška: '.mysqli_error($conn));
 }
 echo "Dodavanje novog korisnika je uspješno izvršeno!";
 mysqli_close($conn)
?>
</body>
</html>