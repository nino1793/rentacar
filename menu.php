<?php
if (isset($_COOKIE['uname'])){
$prijavljen=true;
$razina=$_COOKIE['razina'];
}
else {
$prijavljen=false;
}
?>
<div id="navigation-container">
	<div id="navigation">
		<ul>

			<li><a href="index.php">POČETNA</a></li>
			
			<?php			
			if ($prijavljen){
			?>
			<li><a href="automobil.php">AUTOMOBILI</a></li>
			<li><a href="novo_iznajmljivanje.php">IZNAJMI</a></li>
			
			<?php if ($razina==2){
			?>
			<li><a href="iznajmljivanje.php">IZNAJMLJIVANJE</a></li>
			
			<?php
			}
			?>
			<li><a href="logout.php">ODJAVA</a></li>
			<?php
			}
			else {
			?>
			<li><a href="prijava.php">PRIJAVA</a></li>
			<?php
			}
			?>
			<li><a href="slike.php">SLIKE</a></li>
			<li><a href="kontakt.php">KONTAKT</a></li>
			
		</ul>
		
	</div>

</div>