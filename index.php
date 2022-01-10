<?php
require("config.php");
include("html_head.php");
include("header.php");
include("menu.php");
?>
<?php
if (isset($_COOKIE['uname'])){
$prijavljen=true;
$razina=$_COOKIE['razina'];
}
else {
$prijavljen=false;
}
?>
<div id="content-container">
	<div id="content-container2">
		<div id="content-container3">
			<div id="content">
			<img src="4.jpg" alt="cars" style="width:550px; height:110px">
			<h1> DOBRODOŠLI... </h1>
			<p><b>Rent-a-car nudi vrhunsku i pouzdanu platformu za iznajmljivanje vozila.</b></p>
			<p>Naša vizija : Korisnik je najvažnija osoba u našem poslovanju. Korisnik nikad ne prekida naš rad – oni su svrha toga. Korisnik ne ovisi o nama – mi smo ovisni o njima.</p>
			<p><b>GARANTIRANO NAJBOLJE CIJENE ZA SVA VOZILA, 100% SIGURNA REZERVACIJA AUTOMOBILA, BRZO I JEDNOSTAVNO OTKAZIVANJE REZERVACIJE</b></p>
			<br><br><br><br><br><br>
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
				<?php 
                  if (!$prijavljen){
				?>
				<h2>PRIJAVA</h2>
				<div id="login">
	
					<form action="prijava.php" method="POST" id="login-form">
						<fieldset>
							<p>
								<label for="login-username">Kor.ime:</label>
								<input type="text" name="username" id="login-username" autofocus />
							</p>

							<p>
								<label for="login-password">Lozinka:</label>
								<input type="password"  name="password" id="login-password"  />
							</p>
								<input type="submit" class="button" value="PRIJAVA" />
							
							<p> <a href="registracija.html">Niste registrirani?</a> </p>
							
						</fieldset>
						<br/>
						<div class="information-box round">Unesite korisničko ime i lozinku u formu iznad.</div>
					</form>
				
				</div> <!-- end login -->
                <?php
				  }
                ?>				
			</div>
		</div>
	</div>
</div>

<?php
include("footer.php");
?>
