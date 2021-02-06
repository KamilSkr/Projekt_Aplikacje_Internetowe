{extends file="main.tpl"}

{block name=top}
 <header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead">MAGAZYN</h1>
				<p class="tagline">APLIKACJA DO KOMUNIKACJI I ORGANIZACJI PRACY</p>
				<p><a href="{$conf->action_root}employeePracownik" class="btn btn-default btn-lg" role="button">Lista</a> 
                                    {if count($conf->roles)>0}
                                    <a href="{$conf->action_root}logout" class="btn btn-action btn-lg" role="button">Wyloguj</a></p>
                                    {else}
                                    <a href="{$conf->action_root}loginShow" class="btn btn-action btn-lg" role="button">Zaloguj</a></p>
                                    {/if}
			</div>
		</div>
	</header>
                        	
<div class="bottom-margin ">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}employeePracownik">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="nazwisko" name="sf_surname" value="{$searchForm->surname}" style="float: left;" />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>	

{/block}

{block name=bottom}


    <table id="tab_people" class="pure-table pure-table-bordered" style="margin-top: 2em">
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
		<td>{$p["data_urodzenia"]}</td>
                <td>{$p["stanowisko"]}</td>
		
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
