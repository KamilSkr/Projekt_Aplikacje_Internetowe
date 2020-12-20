<?php
require_once dirname(__FILE__).'/../config_1.php';
//ochrona widoku
include $conf->root_path.'/app/security/check.php';
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Helios by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
                <link rel="stylesheet" href="http://localhost:80/project/app/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="{$conf->app_url}/app/calc_1.php" /></noscript>
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
                                                    <form class="pure-form pure-form-stacked" action="{$conf->app_url}/app/calc_1.php" method="post">
	<fieldset>
		<label for="x">Pierwsza liczba</label>
		<input id="x" type="text" placeholder="wartość x" name="x" value="{$form->x}">
		<label for="op">Operacja</label>
		<select id="op" name="op">

{if isset($res->op_name)}
<option value="{$form->op}">ponownie: {$res->op_name}</option>
<option value="" disabled="true">---</option>
{/if}
			<option value="plus">(+) dodaj</option>
			<option value="minus">(-) odejmij </option>
			<option value="times">(*) pomnóż</option>
			<option value="div">(/) podziel</option>
		</select>
					
		<label for="y">Druga liczba</label>
		<input id="y" type="text" placeholder="wartość y" name="y" value="{$form->y}">
	</fieldset>
	<button type="submit" class="pure-button pure-button-primary">Oblicz</button>
</form>

<div class="messages">

{* wyświeltenie listy błędów, jeśli istnieją *}
{if $msgs->isError()}
	<h4>Wystąpiły błędy: </h4>
	<ol class="err">
	{foreach $msgs->getErrors() as $err}
	{strip}
		<li>{$err}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}

{* wyświeltenie listy informacji, jeśli istnieją *}
{if $msgs->isInfo()}
	<h4>Informacje: </h4>
	<ol class="inf">
	{foreach $msgs->getInfos() as $inf}
	{strip}
		<li>{$inf}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}

{if isset($res->result)}
	<h4>Wynik</h4>
	<p class="res">
	{$res->result}
	</p>
{/if}

</div>
						</nav>

					<!-- Inner -->
						
                        
                        
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
			<script src="ssets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>