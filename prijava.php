<?php
include("html_head.php");
include("header.php");
include("menu.php");
require("config.php");

function CheckLogin($username,$password){
	global $dbhost, $dbuser , $dbpass, $dbname;
	// povezivanje
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
	mysqli_select_db($conn, $dbname);
	$db_selected = mysqli_select_db($conn, $dbname);
	if (!$db_selected) {
		die ('Ne mogu se spojiti na bazu: ' . mysqli_error($conn));
	}
	$sql="SELECT * FROM Korisnik where Username='$username' AND Lozinka='$password'";
	$result=mysqli_query($conn, $sql) or die("<br>".$sql."<br/><br/>".mysqli_error($conn));
	$num_rows=0;
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		//printf("uSERNAME: %s  lOZINKA: %s", $row["Username"], $row["Lozinka"]);
		$num_rows++;
	}
	mysqli_free_result($result);

	if ($num_rows >= 1) {
		return true;
	}
	else {
		return false;
	}

}
function ReturnUserData($username,$password){
	global $dbhost, $dbuser , $dbpass, $dbname;
					// povezivanje
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
	mysqli_select_db($conn, $dbname);
	$sql="SELECT Username, Razina FROM Korisnik where Username='$username' AND Lozinka='$password'";
	$result=mysqli_query($conn, $sql) or die("<br>".$sql."<br/><br/>".mysqli_error($conn));
	$rez=array();
	while($ispisrez = mysqli_fetch_array($result)){
	//print_r($ispisrez);
	$rez=$ispisrez;
	}
	return $rez;
	//print_r($ispisirez);

}

?>
<div id="content-container">
	<div id="content-container2">
		<div id="content-container3">
			<div id="content">
				<h2>
					Prijava...
				</h2>
				<p>
				
			<?php
				
			if (isset($_POST["username"])||isset($_POST["password"])){
				$username=$_POST["username"];
				$password=$_POST["password"];
				$postoji=CheckLogin($username,$password);
				
			if ($postoji){
				//echo "<b>USPJEŠNA PRIJAVA!</b><br>";
				echo "<div class=\"information-box round\">USPJEŠNA PRIJAVA!</div>";
				echo "<p><a href=\"index.php\">Kliknite ovdje za nastavak rada...</a></p>";
				$rez=array();
				$uname="";
				$razina=0;
				ReturnUserData($username,$password);
				$rez=ReturnUserData($username,$password);
				//print_r($rez); //ovo je samo za provjeru da vidite kao izgleda polje
				list($uname,$razina)=$rez;
						
				setcookie('uname', $uname, time()+1800,'/');
				setcookie('razina', $razina, time()+1800,'/');
				echo "Napomena: Postavljeni podaci o prijavi (postavljen cookie!) <br>";
				//print_r($_COOKIE); //ovo je samo za provjeru da vidite kao izgleda polje
				
				}
			else {
				echo "<div class=\"information-box round\">Ne postoji korisnik s navednim podacima!</div>";
				echo "<p><a href=\"login.php\">Kliknite ovdje za ponovnu prijavu...</a></p>";
				}
				
				}
			else {
				echo "<p><a href=\"login.php\">Kliknite ovdje za prijavu u aplikaciju...</a></p>";
				}
				
			?>
			
				
				</p>
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
			</div>
			<div id="aside">
				<h3>Rent-a-car</h3>
				
				<div>
				<p>NUDIMO VAM KRATKOROČAN ILI <br/> 
				   DUGOROČAN NAJAM OSOBNIH VOZILA<br/><br/>
                   
				   Prema željama, vozilo možemo dovesti<br/>
				   na dogovorenu lokaciju. Vozni park<br/>
				   obnavaljmo svake godine, tako da<br/>
				   posjedujemo najnovije modele. <br/>
                   Ujedno brinemo da je vozilo tehnički<br/>
				   ispravno sa visokim standardima udobnosti.</p>				
				</div>
			</div>
		</div>
	</div>

</div>

<?php
include("footer.php");
?>
