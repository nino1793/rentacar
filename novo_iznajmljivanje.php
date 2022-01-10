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
			<h1> IZNAJMI AUTOMOBIL</h1>
			<p>Ispunite formu ispod ...</p>

			<?php
			if (!$prijavljen){
			echo "<h2>Niste prijavljeni i nemate pravo pregleda!</h2><br></div></div></div>";
			include ("footer.php");
			die();
			}
			else {
			//continue with script execution
			}

			if ($razina==1 || $razina==2){
			// povezivanje
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
			mysqli_select_db($conn, $dbname);
			$sql="SELECT m.*, a.*, i.* FROM Model m, Automobil a, Iznajmljivanje i where m.Automobil_idAutomobil=a.idAutomobil and i.idAutomobil=a.idAutomobil ORDER BY 1";
			$result=mysqli_query($conn, $sql);
			?>
			
			
				
			<form action="add_novo.php" method="GET">
				<span>
					AUTOMOBIL:
					<select name="idModel">
						<option value="odabir">Odaberite automobil ...</option>
						<?php
							// povezivanje
							$conn2 = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
							mysqli_select_db($conn2, $dbname);
							
							mysqli_query($conn2, "SET NAMES utf8");
							mysqli_query($conn2, "SET CHARACTER SET utf8");
							mysqli_query($conn2, "SET COLLATION_CONNECTION='utf8_unicode_ci'");

							$sql2="SELECT * FROM Model ORDER BY 1";
							$result2=mysqli_query($conn2, $sql2);
							while($ispisrez2 = mysqli_fetch_array($result2)){
								echo "<option value=\"".$ispisrez2['idModel']."\">".$ispisrez2['Naziv']."</option>";
								// zatvaranje while petlje
							}
						?>
					</select>
					<span>
					
				    <span>DATUM POSUDBE: <input type="text" name="Datum_posudbe"><span><br>
					<span>DATUM VRAĆANJA: <input type="text" name="Datum_vracanja"><span><br>
					<span>DATUM UGOVORA: <input type="text" name="Datum_ugovora"><span><br>
					<br><br>
					<input type="submit" name="posalji" value="Iznajmi automobil"><br>
					</form>
					<?php
			
			}
			?>
			
			
			
			
			<br><br><br><br><br><br><br><br><br><br>
			<hr>
			
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
				
				</p>
			</div>
		</div>
	</div>
</div>

<?php
include("footer.php");
?>