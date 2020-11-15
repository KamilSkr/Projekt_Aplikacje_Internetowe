<!DOCTYPE HTML>
<!--
	Helios by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Helios by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
                <link rel="stylesheet" href="http://localhost:80/project/app/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="app/assets/css/noscript.css" /></noscript>
	</head>
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header">

					<!-- Inner -->
						<div class="inner">
							
							<footer>
                                                                <body>
                                                                    <head>
                                                                        <meta charset="utf-8" />
                                                                        <title>Logowanie</title>
                                                                        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
                                                                                                                                    </head>
                                                                    <div class="login">

                                                                                <form action="<?php print(_APP_ROOT); ?>/app/security/login.php" method="post" class="pure-form pure-form-stacked">
                                                                                    <legend style="color: white; text-align: center;">Logowanie</legend>
                                                                                        <fieldset>
                                                                                            <label for="id_login" style="color: white;">login: </label>
                                                                                                <input id="id_login" type="text" name="login" value="<?php out($form['login']); ?>" />
                                                                                                <label for="id_pass" style="color: white;">pass: </label>
                                                                                                <input id="id_pass" type="password" name="pass" />
                                                                                        </fieldset>
                                                                                        <input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>
                                                                                </form>	

                                                                                <?php
                                                                                //wy�wieltenie listy b��d�w, je�li istniej�
                                                                                if (isset($messages)) {
                                                                                        if (count ( $messages ) > 0) {
                                                                                                echo '<ol style="padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
                                                                                                foreach ( $messages as $key => $msg ) {
                                                                                                        echo '<li>'.$msg.'</li>';
                                                                                                }
                                                                                                echo '</ol>';
                                                                                        }
                                                                                }
                                                                                ?>

                                                                                </div>
							</footer>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="http://localhost:80/project/index.php">Home</a></li>
								<li><a href="http://localhost:80/project/app/calc.php">Kalkulator Kredytowy</a></li>
								<li><a href="https://github.com/KamilSkr/Projekt_Aplikacje_Internetowe.git">Github</a></li>
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
											<li><a href="https://github.com/KamilSkr/Projekt_Aplikacje_Internetowe.git" class="icon brands fa-github"><span class="label">Github</span></a></li>
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