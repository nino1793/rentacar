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

function IspisIznajmljivanje(){
		global $dbhost, $dbuser, $dbpass,$dbname;
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
		mysqli_select_db($conn, $dbname);
		//echo "<h2>Pregled iznajmljivanja</h2>";
		$sql="SELECT i.*, k.* FROM Iznajmljivanje i, Korisnik k where i.idKorisnik=k.Korisnik ORDER BY 1";
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
				if (isset($_GET['azuriraj'])){
				$idIznajmljivanje	=	$_GET['idIznajmljivanje'];
				$datum_posudbe	=	$_GET['Datum_posudbe'];
				$idKorisnik	=	$_GET['idKorisnik'];
				
				// povezivanje
				$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
				mysqli_select_db($conn, $dbname);
				$sql="UPDATE Iznajmljivanje SET Datum_posudbe='$datum_posudbe', idKorisnik='$idKorisnik' WHERE idIznajmljivanje=$idIznajmljivanje";
				$result=mysqli_query($conn, $sql) or die("<h2>Pogreska kod pronalaska iznajmljivanja</h2>".mysqli_error($conn));
					if ($result){
					IspisIznajmljivanje();
					}
				}
				if (isset($_GET['id'])) {
				$idIznajmljivanje	=	$_GET['id'];
				
				// povezivanje
				$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
				mysqli_select_db($conn, $dbname);
				$sql="Select * from Iznajmljivanje i, Korisnik k where idIznajmljivanje=$idIznajmljivanje and i.idKorisnik=k.idKorisnik";
				$result=mysqli_query($conn, $sql) or die("<h2>Pogreska kod pronalaska iznajmljivanja</h2>".mysqli_error($conn));
				while($ispisrez = mysqli_fetch_array($result)){
					$trenutni_korisnik=$ispisrez['idKorisnik'];
					echo "<form action=\"iznajmljivanje_edit.php\" method=\"GET\">";
					echo "<span>idIznajmljivanje: <input type=\"text\" name=\"idIznajmljivanje\" value=\"".$ispisrez['idIznajmljivanje']."\" READONLY></span><br>";
					echo "<span>Datum_posudbe: <input type=\"text\" name=\"Datum_posudbe\" value=\"".$ispisrez['Datum_posudbe']."\"></span><br>";
					echo "<span>Korisnik: <select name=\"idKorisnik\"></span>";
					echo "<option value=\"".$ispisrez['idKorisnik']."\">".$ispisrez['Username']."</option>";
					$conn2 = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
								mysqli_select_db($conn2, $dbname);
								echo "<h2>Pregled iznajmljivanja</h2>";
								$sql2="SELECT * FROM Korisnik where idKorisnik <> '$trenutna_korisnik'";
								$result2=mysqli_query($conn2, $sql2);
								while($ispisrez2 = mysqli_fetch_array($result2)){
									echo "<option value=\"".$ispisrez2['idKorisnik']."\">".$ispisrez2['Username']."</option>";
								// zatvaranje while petlje
								}
					echo "</select><br><br></span><span><input type=\"submit\" name=\"azuriraj\" value=\"Ažuriraj iznajmljivanje\"></span>";
					echo "</form>";
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
				</p>
			</div>
		</div>
	</div>

</div>
<?php
include("footer.php");
?>
