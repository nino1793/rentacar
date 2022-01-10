<html>

<?php
include("html_head.php");
include("header.php");
include("menu.php");
require("config.php");
?>
<body>
<div id="content-container">
	<div id="content-container2">
		<div id="content-container3">
			<div id="content">
				<h2>REGISTRACIJA</h2>
				<div id="login">
				
					<?php 
					
					
					  $Ime=$_POST['Ime'];
                      $Prezime=$_POST['Prezime'];
                      $Email=$_POST['Email'];
                      $Username=$_POST['Username'];
                      $Lozinka=$_POST['Lozinka'];
					  $razina=1;
 
 
                      $sql="INSERT INTO Korisnik (idKorisnik, Ime, Prezime, Email, Username, Lozinka, Razina) VALUES(NULL, '$Ime', '$Prezime', '$Email', '$Username', '$Lozinka', '$razina')";
                      if(!mysqli_query($conn, $sql)){
	                    die('Greška: '.mysqli_error($conn));
                      }
                      mysqli_close($conn)
					
					
					
					?>
				<div class="information-box round">Uspješno ste se registrirali.</div>
				
				</div> <!-- end login -->
			</div>
			<div id="aside">
				<h3>OPCIONALNI IZBORNIK </h3>
				<p>Ovdje možete staviti opcionalni izbornik ili dodatne napomene ili dodatni ispis ili informacije koje smatrate potrebnima... </p>
			</div>
		</div>
	</div>
</div>

<?php
include("footer.php");
?>
</body>
</html>