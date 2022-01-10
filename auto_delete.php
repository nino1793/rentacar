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

function IspisAuto(){
		global $dbhost, $dbuser, $dbpass,$dbname;
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
		mysqli_select_db($conn, $dbname);
		//echo "<h2>Pregled opcina</h2>";
		$sql="SELECT m.*, a.* FROM Model m, Automobil a where m.idAutomobil=a.idAutomobil ORDER BY 1";
		$result=mysqli_query($conn, $sql);
		echo "<table class=\"sample\"><tr class=\"tbl_naslov\"><th>ŠIFRA</th><th>AUTOMOBIL</th><th>MODEL</th><th></th><th></th></tr>";
		 while($ispisrez = mysqli_fetch_array($result)){

			echo "<tr>"; 
			echo "<td>".$ispisrez['idModel']."</td>";
			echo "<td>".$ispisrez['Naziv']."</td>";
			echo "<td><a href=\"auto_edit.php?id=".$ispisrez['idModel']."\">Ažuriraj automobil</a></td>";
			echo "<td><a href=\"auto_delete.php?id=".$ispisrez['idModel']."\">Briši automobil</a></td>";
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
			<h1> AUTOMOBILI</h1>
			<p>Administracija matičnih podataka o automobilima ...</p>
			<?php
			if ($razina==2){
				if (isset($_GET['id'])) {
				$idModel	=	$_GET['id'];
				
				// povezivanje
				$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
				mysqli_select_db($conn, $dbname);

				$sql="DELETE FROM Model WHERE idModel=$idModel";
				$result=mysqli_query($conn, $sql) or die("<h2>Pogreska kod dodavanja automobila</h2>".mysqli_error($conn));
					if ($result){
					echo "<h2>Uspješno je izbrisan automobil sa šifrom: <b>$idModel</b> !</h2><br>";
					IspisAuto();
					}	
				}
			}
			else {
			echo "<h3>Nemate razinu za pregledavanje ovih podataka</h3><br>";
			}
			?>
            <br><br><br><br><br><br><br>
			<hr>

			</div>
			<div id="aside">
				<h3>
					DODAVANJE NOVOG AUTOMOBILA
				</h3>
				<h2></h2>
			<form action="auto_add.php" method="GET">
				<span>ŠIFRA: <input type="text" name="idModel"><span><br>
				<span>MODEL: <input type="text" name="Naziv"><span><br>
				<span>
					AUTOMOBIL:
					<select name="idAutomobil">
						<option value="odabir">Odaberite marku ...</option>
						<?php
							// povezivanje
							$conn2 = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
							mysqli_select_db($conn2, $dbname);
							
							mysqli_query($conn2, "SET NAMES utf8");
							mysqli_query($conn2, "SET CHARACTER SET utf8");
							mysqli_query($conn2, "SET COLLATION_CONNECTION='utf8_unicode_ci'");

							$sql2="SELECT * FROM Automobil ORDER BY 1";
							$result2=mysqli_query($conn2, $sql2);
							while($ispisrez2 = mysqli_fetch_array($result2)){
								echo "<option value=\"".$ispisrez2['idAutomobil']."\">".$ispisrez2['Naziv']."</option>";
								// zatvaranje while petlje
							}
						?>
					</select>
					<span>
					<br><br>
					<input type="submit" name="posalji" value="Dodaj automobil"><br>
					</form>
				</p>
			</div>
		</div>
	</div>

</div>
<?php
include("footer.php");
?>
