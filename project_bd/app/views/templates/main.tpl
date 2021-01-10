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
	<link rel="stylesheet" href="{$conf->action_root}/css/bootstrap.min.css">
	<link rel="stylesheet" href="{$conf->action_root}/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="{$conf->action_root}/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="{$conf->action_root}/css/main.css">
</head>
        

<body style="margin: 20px;">

                <div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				{if \core\RoleUtils::inRole('admin')}
                                <a class="navbar-brand" href="{$conf->action_root}centrum">Magazyn</a>
                                {else if \core\RoleUtils::inRole('user')}
                                    <a class="navbar-brand" href="{$conf->action_root}User">Magazyn</a>
                                {else if \core\RoleUtils::inRole('employee')}  
                                    <a class="navbar-brand" href="{$conf->action_root}employee">Magazyn</a>
                                    {else}
                                        <a class="navbar-brand" href="{$conf->action_root}loginShow">Magazyn</a>
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
                                        <li class="active"><a href="{$conf->action_root}User">Home</a></li>
                                        <li><a class="btn" href="{$conf->action_root}logout">Wyloguj</a></li>
                                        {else if \core\RoleUtils::inRole('employee')}
                                        <li class="active"><a href="{$conf->action_root}employee">Home</a></li>
					<li><a class="btn" href="{$conf->action_root}logout">Wyloguj</a></li>
                                        {else}
                                        <li class="active"><a href="{$conf->action_root}loginShow">Home</a></li>
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

</body>

</html>