{extends file="main.tpl"}

{block name=top}
 <header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead">MAGAZYN</h1>
				<p class="tagline">APLIKACJA DO KOMUNIKACJI I ORGANIZACJI PRACY</p>
				<p><a href="{$conf->action_root}User" class="btn btn-default btn-lg" role="button">Lista</a> 
                                    {if count($conf->roles)>0}
                                    <a href="{$conf->action_root}logout" class="btn btn-action btn-lg" role="button">Wyloguj</a></p>
                                    {else}
                                    <a href="{$conf->action_root}loginShow" class="btn btn-action btn-lg" role="button">Zaloguj</a></p>
                                    {/if}
			</div>
		</div>
	</header>
                        	
<div class="bottom-margin ">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}User">
    <legend style="color: black;">Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="nazwa" name="sf_nazwa" value="{$searchForm->nazwa}"style="float: left;"  />
                <input type="text" placeholder="do wykonania" name="sf_do_wykonania" value="{$searchForm->do_wykonania}" style="margin-left: 15em;" /><br />              
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
               
</form>
</div>	

{/block}

{block name=bottom}
{* -----------------------------------------*}


<table id="tab_people_1" class="pure-table pure-table-bordered" style="margin-top: 2em;" >
<thead>
	<tr>
		<th>nazwa</th>
		<th>ilosc</th>
		<th>stan</th>
		<th>opcje</th>
	</tr>
</thead>
<tbody>
{foreach $towar as $p}
{strip}
	<tr>
		<td>{$p["nazwa"]}</td>
		<td>{$p["ilosc"]}</td>
		<td>{$p["stan"]}</td>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}personEditz/{$p['id_towaru']}">Edytuj</a>
			&nbsp;
			<a class="button-small pure-button button-warning" href="{$conf->action_url}personDeletez/{$p['id_towaru']}">Usuń</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>



<div class="bottom-margin_2">
    <a class="pure-button button-success" href="{$conf->action_root}personNewss" style="margin-top: 2em;">Nowe zadania do wykonania</a>
</div>	

<table id="tab_people_2" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>Zadania do wykonania</th>
		<th>stanowisko</th>
		<th>status</th>
		<th>opcje</th>
	</tr>
</thead>
<tbody>
{foreach $zadania as $p}
{strip}
	<tr>
		<td>{$p["do_wykonania"]}</td>
		<td>{$p["stanowisko"]}</td>
		<td>{$p["status"]}</td>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}personEdits/{$p['id_zadania']}">Edytuj</a>
			&nbsp;
			<a class="button-small pure-button button-warning" href="{$conf->action_url}personDeletes/{$p['id_zadania']}">Usuń</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
