<?php
include("html_head.php");
include("header.php");
include("menu.php");
?>
<div id="content-container">
	<div id="content-container2">
		<div id="content-container3">
			<div id="content">
				<h2>
					Odjava...
				</h2>
				
				<p>
				<?php
					if (isset($_COOKIE['uname'])){
					setcookie('uname', "", time()-36000,'/');
					echo "<div class=\"information-box round\">Odjavili ste se iz aplikacije!</div>";
					echo "<p><a href=\"login.php\">Kliknite ovdje za ponovnu prijavu...</a></p>";
					}
				
				?>

				</p>
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
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include("footer.php");
?>
