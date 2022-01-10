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
			
			<?php
			if ($razina==1 || $razina==2){
				if (isset($_GET['Datum_posudbe'])) {
				
				
				$datum_posudbe	=	$_GET['Datum_posudbe'];
				$datum_vracanja	=	$_GET['Datum_vracanja'];
				$datum_ugovora	=	$_GET['Datum_ugovora'];
				
				
				// povezivanje
				$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
				mysqli_select_db($conn, $dbname);
				$sql="INSERT INTO Iznajmljivanje (Datum_ugovora,Datum_posudbe,Datum_vracanja) VALUES ('$datum_ugovora','$datum_posudbe','$datum_vracanja')";
				$result=mysqli_query($conn, $sql) or die("<h2>Pogreška kod iznajmljivanja automobila!</h2>".mysqli_error($conn));
					if ($result){
					echo "<h2>Uspješno ste iznajmili automobil!</h2><br>";
					
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