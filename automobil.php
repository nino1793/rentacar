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
			<h1> AUTOMOBILI</h1>
			<p>Administracija matičnih podataka o automobilima ...</p>

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
			$sql="SELECT m.*, a.* FROM Model m, Automobil a where m.idAutomobil=a.idAutomobil ORDER BY 1";
			$result=mysqli_query($conn, $sql);
			?>
			
			<table class="sample">
				<tr class="tbl_naslov">
				<th>ŠIFRA</th>
				<th>NAZIV</th>
				<th>BOJA</th>
				<th>BROJ SJEDALA</th>
				<th>DODATNA OPREMA</th>
				</tr>
			
			<?php
				
			  while($ispisrez = (mysqli_fetch_array($result))){
				 echo "<tr>"; 
				 echo "<td>".$ispisrez['idModel']."</td>";
				 echo "<td>".$ispisrez['Naziv']."</td>";
				 echo "<td>".$ispisrez['Boja']."</td>";
				 echo "<td>".$ispisrez['Broj_sjedala']."</td>";
				 echo "<td>".$ispisrez['Dodatna_oprema']."</td>";
				 if($razina==2){
				 echo "<td><a href=\"auto_edit.php?id=".$ispisrez['idModel']."\">Ažuriraj automobil</a></td>";
				 echo "<td><a href=\"auto_delete.php?id=".$ispisrez['idModel']."\">Briši automobil</a></td>";
				 }
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
			<br><br><br><br><br><br><br><br><br><br>
			<hr>
			
			</div>
			<div id="aside">
			<?php
			if ($razina==2){
			?>
			
				<h3>
					DODAVANJE NOVOG AUTOMOBILA 
				</h3>
				<h2></h2>
			<form action="auto_add.php" method="GET">
			
					<br><br>
					<input type="submit" name="posalji" value="Dodaj automobil"><br>
					</form>
					<?php
			}
			else{
				    ?>
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
				   <?php
			}
					?>
				</p>
			</div>
		</div>
	</div>
</div>

<?php
include("footer.php");
?>
