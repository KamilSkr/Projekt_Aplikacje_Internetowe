{extends file="main.tpl"}

{block name=top}
 <header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead">MAGAZYN</h1>
				<p class="tagline">APLIKACJA DO KOMUNIKACJI I ORGANIZACJI PRACY</p>
				<p><a href="{$conf->action_root}employeeTowar" class="btn btn-default btn-lg" role="button">Lista</a> 
                                    {if count($conf->roles)>0}
                                    <a href="{$conf->action_root}logout" class="btn btn-action btn-lg" role="button">Wyloguj</a></p>
                                    {else}
                                    <a href="{$conf->action_root}loginShow" class="btn btn-action btn-lg" role="button">Zaloguj</a></p>
                                    {/if}
			</div>
		</div>
	</header>
                        	
<div class="bottom-margin ">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}employeeTowar">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
                <input type="text" placeholder="nazwa" name="sf_nazwa" value="{$searchForm->nazwa}"style="margin-left: 2em; float: left;"  />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>	

{/block}

{block name=bottom}



<div class="bottom-margin_1">
<a class="pure-button button-success" href="{$conf->action_root}personNewz">+ Nowy towar</a>
</div>	

<table id="tab_people_1" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>Nazwa</th>
		<th>Ilosc</th>
		<th>Stan</th>
		<th>Nr ID zamawiającego towar</th>                
                <td>Opcje</td>
	</tr>
</thead>
<tbody>
{foreach $towar as $p}
{strip}
	<tr>
		<td>{$p["nazwa"]}</td>
		<td>{$p["ilosc"]}</td>
                <td>{$p["stan"]}</td>
                <td>{$p["id_zamawiajacego"]}</td>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}personEditz/{$p['id_towaru']}">Edytuj</a>		
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
