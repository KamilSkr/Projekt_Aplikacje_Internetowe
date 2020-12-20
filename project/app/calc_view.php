
<!DOCTYPE HTML>
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
                                    <!-- Nav -->
						<nav id="nav">
							<ul>
									<li><a href="http://localhost:80/project/index.php">Home</a></li>
                                                                        <li><a href="http://localhost:80/project/app/calc.php">Kalkulator Kredytowy</a></li>
                                                                        <li><a href="https://github.com/KamilSkr/Projekt_Aplikacje_Internetowe.git">Github</a></li>
                                                                        <li><a href="http://localhost:80/project/index_1.php">Kalkulator</a></li>
							
							</ul>
						</nav>

					<!-- Inner -->
						<div class="inner">
                                                    
							
							<footer>
                                                                <div style="width:90%; margin: 2em auto;">
                                                                    <a href="<?php print(_APP_ROOT); ?>/index_1.php" class="pure-button" style=" position: relative; right:  100px;">Zwykły Kalkulator</a>
                                                                    <a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active" style=" position: relative; left: 50px;">Wyloguj</a>
                                                                </div>

							</footer>
                                                    <div style="width:90%; margin: 2em auto;">

                                            <form action="<?php print(_APP_ROOT); ?>/app/calc.php" method="post" class="pure-form pure-form-stacked">
                                                <legend class="title_menu">Oblicz miesieczna rate kredytu</legend>
                                                    <fieldset>
                                                        <label for="id_x" style="color: white;">Kwota pozyczki : </label>
                                                            <input id="id_x" type="text" name="x" value="<?php out($x) ?>" />
                                                            <label for="id_z" style="color: white;">Na ile lat? : </label>
                                                            <input id="id_z" type="text" name="z" value="<?php out($z) ?>" />
                                                            <label for="id_y" style="color: white;">Na jaki procent? : </label>
                                                            <input id="id_y" type="text" name="y" value="<?php out($y) ?>" />
                                                    </fieldset>	
                                                    <div href="#one"><input type="submit" value="Oblicz" class="pure-button pure-button-primary" /></div>
                                            </form>	



                                            </div>
                                                                                            </div>

                                                                                   
					

				</div>

                        
                        <div  id="one" class="messages">

                            <?php

                            //wyświeltenie listy błędów, jeśli istnieją
                            if (isset($messages)) {
                                    if (count ( $messages ) > 0) {
                                    echo '<h4>Wystąpiły błędy: </h4>';
                                    echo '<ol class="err">';
                                            foreach ( $messages as $key => $msg ) {
                                                    echo '<li>'.$msg.'</li>';
                                            }
                                            echo '</ol>';
                                    }
                            }
                            ?>

                            <?php
                            //wyświeltenie listy informacji, jeśli istnieją
                            if (isset($infos)) {
                                    if (count ( $infos ) > 0) {
                                    echo '<h4>Informacje: </h4>';
                                    echo '<ol class="inf">';
                                            foreach ( $infos as $key => $msg ) {
                                                    echo '<li>'.$msg.'</li>';
                                            }
                                            echo '</ol>';
                                    }
                            }
                            ?>
                             <div class="wynik">
                            <?php if (isset($result)){ ?>
                             <h4 id="one">Rata miesieczna wynosi (zł): </h4>
                                    <p class="res">
                            <?php print($result); ?>
                                    </p>
                            <?php } ?>
                                    
                         </div>

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

		

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="ssets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>