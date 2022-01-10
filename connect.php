<html>
<head><title>RENT</title></head>
<body>
<?php
 $conn = mysql_connect ("localhost", "root", "12345678");
 if (!$conn) {
 echo "Spajanje na bazu nije uspjelo: " . mysql_error(); exit;
 }
 if (!mysql_select_db ("rent")) {
 echo "Odabir baze nije uspio: " . mysql_error(); exit;
 }

?>
</body>
</html>