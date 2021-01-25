{extends file="main.tpl"}

{block name=top}
 <header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead">MAGAZYN</h1>
				<p class="tagline">APLIKACJA DO KOMUNIKACJI I ORGANIZACJI PRACY</p>
                                {if \core\RoleUtils::inRole('admin')}
				<p><a href="{$conf->action_root}loginShow" class="btn btn-default btn-lg" role="button">Lista</a> 
                                    {else if \core\RoleUtils::inRole('user')}
                                        <p><a href="{$conf->action_root}loginShow" class="btn btn-default btn-lg" role="button">Lista</a>
                                         {else if \core\RoleUtils::inRole('employee')}  
                                             <p><a href="{$conf->action_root}loginShow" class="btn btn-default btn-lg" role="button">Lista</a>
                                             {else}
                                                 {/if}
                                    {if count($conf->roles)>0}
                                    <a href="{$conf->action_root}logout" class="btn btn-action btn-lg" role="button">Wyloguj</a></p>
                                    {else}
                                    <a href="{$conf->action_root}loginShow" class="btn btn-action btn-lg" role="button">Zaloguj</a></p>
                                    {/if}
			</div>
		</div>
	</header>


{/block}
