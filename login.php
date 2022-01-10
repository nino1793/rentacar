<?php
include("html_head.php");
include("header.php");
include("menu.php");
?>
<div id="content-container">
	<div id="content-container2">
		<div id="content-container3">
			<div id="content">
				<h2>PRIJAVA</h2>
				<div id="login">
					<?php 
					if (!isset($_COOKIE['uname'])){
					?>
					<form action="prijava.php" method="POST" id="login-form">
					
						<fieldset>

							<p>
								<label for="login-username">Kor.ime:</label>
								<input type="text" name="username" id="login-username" autofocus />
							</p>

							<p>
								<label for="login-password">Lozinka:</label>
								<input type="password" name="password" id="login-password"  />
							</p>
								<input type="submit" class="button" value="PRIJAVA" />
							
							<p> <a href="#">Zaboravio sam lozinku...</a></p>
							
						</fieldset>
						<br/>
						<div class="information-box round">Unesite korisničko ime i lozinku u formu iznad.</div>

					</form>
					<?php
					}
					else {
					echo "Već ste prijavljeni, nama potrebe za prijavom, nastavite s radom...";
					}
					?>
				
				</div> <!-- end login -->
				<br/><br/><br/><br/><br/><br/><br/><br/><br/>
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
