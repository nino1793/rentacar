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
?>

<div id="content-container">
	<div id="content-container2">
		<div id="content-container3">
			<div id="content">
			<h1> DOSADAŠNJA IZNAJMLJIVANJA</h1>
			<p>Administracija podataka o iznajmljivanjima ...</p>

			<?php
			if (!$prijavljen){
			echo "<h2>Niste prijavljeni i nemate pravo pregleda!</h2><br></div></div></div>";
			include ("footer.php");
			die();
			}
			else {
			//continue with script execution
			}

			if ($razina==2){
			// povezivanje
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
			mysqli_select_db($conn, $dbname);
			$sql="SELECT k.*, i.* FROM Korisnik k, Iznajmljivanje i where i.idKorisnik=k.idKorisnik ORDER BY 1";
			$result=mysqli_query($conn, $sql);
			?>
			
			<table class="sample">
				<tr class="tbl_naslov">
				<th>ŠIFRA</th>
				<th>DATUM POSUDBE</th>
				<th>NAZIV KORISNIKA</th>
				<th></th>
				<th></th>
				</tr>
			
			<?php
				
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
			}
			else {
			echo "<h3>Nemate razinu za pregledavanje ovih podataka</h3><br>";
			}
			?>
			
			</table>
			<hr>
			<br><br><br><br><br><br><br><br><br><br><br><br><br>
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
