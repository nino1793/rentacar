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

function IspisOpcina(){
		global $dbhost, $dbuser, $dbpass,$dbname;
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
		mysqli_select_db($conn, $dbname);
		//echo "<h2>Pregled opcina</h2>";
		$sql="SELECT * FROM OPCINA";
		$result=mysqli_query($conn, $sql);
		echo "<table class=\"sample\"><tr class=\"tbl_naslov\"><th>ŠIFRA</th><th>NAZIV OPĆINE</th><th></th><th></th></tr>";
		 while($ispisrez = mysqli_fetch_array($result)){

			echo "<tr>"; 
			echo "<td>".$ispisrez['idOpcina']."</td>";
			echo "<td>".$ispisrez['Naziv']."</td>";
			echo "<td><a href=\"opcina_edit.php?id=".$ispisrez['idOpcina']."\">Ažuriraj općinu</a></td>";
			echo "<td><a href=\"opcina_delete.php?id=".$ispisrez['idOpcina']."\">Briši općinu</a></td>";
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
			<h1> UPRAVLJANJE OPĆINAMA</h1>
			<p>Administracija matičnih podataka o općinama ...</p>
			<?php
			if ($razina==2){
				if (isset($_GET['Naziv'])) {
				$sifra_opcine	=	$_GET['idOpcina'];
				$naziv_opcine	=	$_GET['Naziv'];
				
				
				// povezivanje
				$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
				mysqli_select_db($conn, $dbname);
				$sql="INSERT INTO OPCINA(idOpcina,Naziv) VALUES ('$sifra_opcine','$naziv_opcine')";
				$result=mysqli_query($conn, $sql) or die("<h2>Pogreška kod dodavanja općina!</h2>".mysqli_error($conn));
					if ($result){
					echo "<h2>Uspješno je dodana nova općina!</h2><br>";
					IspisOpcina();
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
					DODAVANJE NOVE OPĆINE 
				</h3>
				<h2></h2>
			<form action="opcina_add.php" method="GET">
				<span>ŠIFRA OPĆINE: <input type="text" name="idOpcina"><span><br>
				<span>NAZIV OPĆINE: <input type="text" name="Naziv"><span><br>
				
						
					<br><br>
				<input type="submit" name="posalji" value="Dodaj općinu"><br>
			</form>
				</p>
			</div>
		</div>
	</div>

</div>
<?php
include("footer.php");
?>
