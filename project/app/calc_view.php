<?php
//Tu ju� nie �adujemy konfiguracji - sam widok nie b�dzie ju� punktem wej�cia do aplikacji.
//Wszystkie ��dania id� do kontrolera, a kontroler wywo�uje skrypt widoku.
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Helios by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
                <link rel="stylesheet" href="app/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header">

					<!-- Inner -->
						<div class="inner">
							
							<footer>
                                                                <div style="width:90%; margin: 2em auto;">
	<a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php" class="pure-button">Zwykły Kalkulator</a>
	<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>

<div style="width:90%; margin: 2em auto;">

<form action="<?php print(_APP_ROOT); ?>/app/calc.php" method="post" class="pure-form pure-form-stacked">
	<legend>Oblicz miesieczna rate kredytu</legend>
	<fieldset>
            <label for="id_x" style="color: white;">Kwota pozyczki : </label>
		<input id="id_x" type="text" name="x" value="<?php out($x) ?>" />
                <label for="id_z" style="color: white;">Na ile lat? : </label>
		<input id="id_z" type="text" name="z" value="<?php out($z) ?>" />
                <label for="id_y" style="color: white;">Na jaki procent? : </label>
		<input id="id_y" type="text" name="y" value="<?php out($y) ?>" />
	</fieldset>	
	<input type="submit" value="Oblicz" class="pure-button pure-button-primary" />
</form>	

<?php
//wy�wieltenie listy b��d�w, je�li istniej�
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin-top: 1em; padding: 1em 1em 1em 2em; border-radius: 0.5em; background-color: #f88; width:25em;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin-top: 1em; padding: 1em; border-radius: 0.5em; background-color: #ff0; width:25em;">
<?php echo 'Wynik: '.$result; ?>
</div>
<?php } ?>

</div>
							</footer>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="left-sidebar.html">Kalkulator Kredytowy</a></li>
								<li><a href="right-sidebar.html">Github</a></li>
								<li><a href="no-sidebar.html">Kalkulator</a></li>
							</ul>
						</nav>

				</div>

			<!-- Footer -->
				<div id="footer">
					<div class="container">
							<div class="col-12">

								<!-- Contact -->
									<section class="contact">
										<ul class="icons">
											<li><a href="#" class="icon brands fa-github"><span class="label">Github</span></a></li>
											<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
											<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
										</ul>
									</section>

								<!-- Copyright -->
									<div class="copyright">
										<ul class="menu">
											<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
										</ul>
									</div>

							</div>

						</div>
					</div>
				</div>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>