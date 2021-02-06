<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta charset="utf-8"/>
	<title>Aplikacja bazodanowa</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css"
		integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
	<link rel="stylesheet" href="{$conf->app_url}/css/style.css">
            
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="{$conf->app_root}/css/bootstrap.min.css">
	<link rel="stylesheet" href="{$conf->app_root}/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="{$conf->app_root}/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="{$conf->app_root}/css/main.css">
</head>
        

<body style="margin: 20px;">

                <div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				{if \core\RoleUtils::inRole('admin')}
                                <a class="navbar-brand" href="{$conf->action_root}centrum">PEMAT</a>
                                {else if \core\RoleUtils::inRole('user')}
                                    <a class="navbar-brand" href="{$conf->action_root}User">PEMAT</a>
                                {else if \core\RoleUtils::inRole('employee')}  
                                    <a class="navbar-brand" href="{$conf->action_root}employee">PEMAT</a>
                                    {else}
                                        <a class="navbar-brand" href="{$conf->action_root}loginShow">PEMAT</a>
                                {/if}
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
                                    
                                        {if \core\RoleUtils::inRole('admin')}
                                            <li><a>Zalogowany jako Administrator</a></li>
                                            {else if \core\RoleUtils::inRole('employee')}
                                            <li><a>Zalogowany jako Kierownik</a></li>
                                            {else if \core\RoleUtils::inRole('user')}
                                            <li><a>Zalogowany jako Pracownik</a></li>
                                                 {else}
                                                 <li><a> </a></li>
                                            {/if}
                                    
                                        {if \core\RoleUtils::inRole('admin')}
                                        <li class="active"><a href="{$conf->action_root}centrum">Home</a></li>
					<li><a class="btn" href="{$conf->action_root}logout">Wyloguj</a></li>
                                        {else if \core\RoleUtils::inRole('user')}
                                        <li class="active"><a href="{$conf->action_root}UserTowar">Towar</a></li>
                                        <li class="active"><a href="{$conf->action_root}UserZadania">Zadania</a></li>
                                        <li class="active"><a href="{$conf->action_root}User">Home</a></li>
                                        <li><a class="btn" href="{$conf->action_root}logout">Wyloguj</a></li>
                                        {else if \core\RoleUtils::inRole('employee')}
                                        <li class="active"><a href="{$conf->action_root}employeePracownik">Pracownicy</a></li>
                                        <li class="active"><a href="{$conf->action_root}employeeTowar">Towar</a></li>
                                        <li class="active"><a href="{$conf->action_root}employeeZadania">Zadania</a></li>                                        
                                        <li class="active"><a href="{$conf->action_root}employee">Home</a></li>
                                        
					<li><a class="btn" href="{$conf->action_root}logout">Wyloguj</a></li>
                                        {else}
                                        <li class="active"><a href="{$conf->action_root}personList">Home</a></li>
                                        <li><a class="btn" href="{$conf->action_root}loginShow">Zaloguj</a></li>
                                        {/if}
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

                

{block name=top} {/block}

{block name=messages}

{if $msgs->isMessage()}
<div class="messages bottom-margin">
	<ul>
	{foreach $msgs->getMessages() as $msg}
	{strip}
		<li class="msg {if $msg->isError()}error{/if} {if $msg->isWarning()}warning{/if} {if $msg->isInfo()}info{/if}">{$msg->text}</li>
	{/strip}
	{/foreach}
	</ul>
</div>
{/if}

{/block}

{block name=bottom} {/block}


	<footer id="footer" class="top-space always-bottom">
		<div class="footer1">
			<div class="container">
				<div class="row">

					<div class="col-md-3 widget">
						<h3 class="widget-title">Kontakt</h3>
						<div class="widget-body">
							<a href="mailto:#">skrzypekpb@gmail.com</a><br><br/>

							<a href="https://github.com/KamilSkr/">https://github.com/KamilSkr/</a> <br/> <br/>

							<p>Aplikacje sieciowe</p>
						</div>
					</div>

					<div class="col-md-3 widget">

					</div>

					<div class="col-md-6 widget">
						<h3 class="widget-title">O Projekcie</h3>
						<div class="widget-body">
							<p>Wykorzystane zasoby: <br/>Framework PHP Amelia - http://amelia-framework.kudlacik.eu/, <br/>Smarty - https://www.smarty.net/, <br/>Medoo - https://medoo.in/, <br/>Szablon HTML - https://www.gettemplate.com/</p>
						</div>
					</div>

			
                                </div> 
                            
			</div>
		</div>

		<div class="footer2">
			<div class="container">
				<div class="row">

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
								<a href="{$conf->action_root}main">Home</a> |
								{if !core\RoleUtils::inRole("logged")}
									<a href="{$conf->action_root}login">Zaloguj</a> 
									
								{/if}
								{if core\RoleUtils::inRole("logged")}
									<a href="{$conf->action_root}logout">Wyloguj</a>
								{/if}
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; 2021, Kamil Skrzypiński. Designed by <a href="http://gettemplate.com/" rel="designer">gettemplate</a>
							</p>
						</div>
					</div>

				</div> 
			</div>
		</div>

	</footer>
                                                        
                        <script src="{$conf->app_url}/js/jquery.min.js"></script>
			<script src="{$conf->app_url}/js/browser.min.js"></script>
			<script src="{$conf->app_url}/js/breakpoints.min.js"></script>
			<script src="{$conf->app_url}/js/util.js"></script>
			<script src="{$conf->app_url}/js/main.js"></script>
</body>

</html>