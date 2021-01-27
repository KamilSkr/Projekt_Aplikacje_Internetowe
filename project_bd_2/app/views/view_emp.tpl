{extends file="main.tpl"}

{block name=top}
 <header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead">MAGAZYN</h1>
				<p class="tagline">APLIKACJA DO KOMUNIKACJI I ORGANIZACJI PRACY</p>
				<p><a href="{$conf->action_root}employee" class="btn btn-default btn-lg" role="button">Lista</a> 
                                    {if count($conf->roles)>0}
                                    <a href="{$conf->action_root}logout" class="btn btn-action btn-lg" role="button">Wyloguj</a></p>
                                    {else}
                                    <a href="{$conf->action_root}loginShow" class="btn btn-action btn-lg" role="button">Zaloguj</a></p>
                                    {/if}
			</div>
		</div>
	</header>
                        	
<div class="bottom-margin ">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}employee">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="nazwisko" name="sf_surname" value="{$searchForm->surname}" style="float: left;" />
                <input type="text" placeholder="nazwa" name="sf_nazwa" value="{$searchForm->nazwa}"style="margin-left: 2em; float: left;"  />
                <input type="text" placeholder="do wykonania" name="sf_do_wykonania" value="{$searchForm->do_wykonania}" style="margin-left: 32em;" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>	

{/block}

{block name=bottom}


    <table id="tab_people" class="pure-table pure-table-bordered" style="margin-top: 2em;">
<thead>
	<tr>
                <th>Numer ID</th>
		<th>Imię</th>
		<th>Nazwisko</th>
		<th>Wiek</th>
                <th>Stanowisko</th>
		
	</tr>
</thead>
<tbody>
{foreach $pracownicy as $p}
{strip}
	<tr>
                <th>{$p["id_pracownika"]}</th>
                <td>{$p["name"]}</td>
		<td>{$p["surname"]}</td>
		<td>{$p["age"]}</td>
                <td>{$p["stanowisko"]}</td>
		
	</tr>
{/strip}
{/foreach}
</tbody>
</table>


{*------------- zawodnik ---------------*}

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
                <td>{$p["id_pracownika"]}</td>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}personEditz/{$p['id_towaru']}">Edytuj</a>		
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

<div class="bottom-margin_2">
<a class="pure-button button-success" href="{$conf->action_root}personNewss">+ Nowe zadanie</a>
</div>	

<table id="tab_people_2" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>Zadania do wykonania</th>
                <td>Pracownik</td>
		<th>Stanowisko</th>
		<th>Status</th>
                <td>Opcje</td>
	</tr>
</thead>
<tbody>
{foreach $zadania as $p}
{strip}
	<tr>
		<td>{$p["do_wykonania"]}</td>
                <td>{$p["id_pracownika"]}</td>
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
