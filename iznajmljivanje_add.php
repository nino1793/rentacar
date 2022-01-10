<?php
require("config.php");
include("html_head.php");
include("header.php");
include("menu.php");

if (isset($_COOKIE['uname'])){
$prijavljen=true;
$razina=$_COOKIE['razina'];
}
else {
$prijavljen=false;
$razina=0;
}

function IspisIznajmljivanja(){
		global $dbhost, $dbuser, $dbpass,$dbname;
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
		mysqli_select_db($conn, $dbname);
		//echo "<h2>Pregled opcina</h2>";
		$sql="SELECT k.*, i.* FROM Korisnik k, Iznajmljivanje i where i.idKorisnik=k.idKorisnik ORDER BY 1";
		$result=mysqli_query($conn, $sql);
		echo "<table class=\"sample\"><tr class=\"tbl_naslov\"><th>idIznajmljivanje</th><th>Datum_posudbe</th><th>Username</th><th></th><th></th></tr>";
		 while($ispisrez = mysqli_fetch_array($result)){

			echo "<tr>"; 
			echo "<td>".$ispisrez['idIznajmljivanje']."</td>";
			echo "<td>".$ispisrez['Datum_posudbe']."</td>";
			echo "<td>".$ispisrez['Username']."</td>";
			echo "<td><a href=\"iznajmljivanje_edit.php?id=".$ispisrez['idIznajmljivanje']."\">Ažuriraj iznajmljivanje</a></td>";
			echo "<td><a href=\"iznajmljivanje_delete.php?id=".$ispisrez['idIznajmljivanje']."\">Briši iznajmljivanje</a></td>";
			echo "</tr>"; 

			// zatvaranje while petlje
			  }
			//zatvaranje
			mysqli_close($conn);
			echo "</table>";
}

?>
<div id="content-container">
	<div id="content-container2">
		<div id="content-container3">
			<div id="content">
			<h1> UPRAVLJANJE IZNAJMLJIVANJIMA</h1>
			<p>Administracija matičnih podataka o iznajmljivanjima ...</p>
			<?php
			if ($razina==2){
				if (isset($_GET['Datum_posudbe'])) {
				$idIznajmljivanje	=	$_GET['idIznajmljivanje'];
				$datum_posudbe	=	$_GET['Datum_posudbe'];
				$idKorisnik	=	$_GET['idKorisnik'];
				
				// povezivanje
				$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
				mysqli_select_db($dbname);
				$sql="INSERT INTO Iznajmljivanje(idIznajmljivanje,Datum_posudbe,idKorisnik) VALUES ('$idIznajmljivanje','$datum_posudbe','$idKorisnik')";
				$result=mysqli_query($conn, $sql) or die("<h2>Pogreška kod dodavanja iznajmljivanja!</h2>".mysqli_error($conn));
					if ($result){
					echo "<h2>Uspješno je dodano novo Iznajmljivanje!</h2><br><br>";
					IspisIznajmljivanja();
					echo "<br><br><br><br><br><br>";
					}	
				}
			}
			else {
			echo "<h3>Nemate razinu za pregledavanje ovih podataka</h3><br>";
			}
			?>

			<hr>

			</div>
			<div id="aside">
				<h3>
					DODAVANJE NOVE POSUDBE
				</h3>
				<h2></h2>
			<form action="iznajmljivanje_add.php" method="GET">
				<span>ŠIFRA IZNAJMLJIVANJA: <input type="text" name="idIznajmljivanje"><span><br>
				<span>DATUM POSUDBE: <input type="text" name="Datum_posudbe"><span><br><br>
				<span>
					KORISNIK:
					<select name="idKorisnik">
						<option value="odabir">Odaberite korisnika ...</option>
						<?php
							// povezivanje
							$conn2 = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
							mysqli_select_db($conn2, $dbname);
							
							mysqli_query($conn2, "SET NAMES utf8");
							mysqli_query($conn2, "SET CHARACTER SET utf8");
							mysqli_query($conn2, "SET COLLATION_CONNECTION='utf8_unicode_ci'");

							$sql2="SELECT * FROM Korisnik ORDER BY 1";
							$result2=mysqli_query($conn2, $sql2);
							while($ispisrez2 = mysqli_fetch_array($result2)){
								echo "<option value=\"".$ispisrez2['idKorisnik']."\">".$ispisrez2['Username']."</option>";
								// zatvaranje while petlje
							}
						?>
					</select>
					<span>
					<br><br>
					<input type="submit" name="posalji" value="Dodaj iznajmljivanje"><br>
			</form>
				
			</div>
		</div>
	</div>

</div>
<?php
include("footer.php");
?>
