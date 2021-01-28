{extends file="main.tpl"}

{block name=top}
    <div id="he">
 <header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead">MAGAZYN</h1>
				<p class="tagline">APLIKACJA DO KOMUNIKACJI I ORGANIZACJI PRACY</p>
				<p><a href="{$conf->action_root}centrum" class="btn btn-default btn-lg" role="button">Lista</a> 
                                    {if count($conf->roles)>0}
                                    <a href="{$conf->action_root}logout" class="btn btn-action btn-lg" role="button">Wyloguj</a></p>
                                    {else}
                                    <a href="{$conf->action_root}loginShow" class="btn btn-action btn-lg" role="button">Zaloguj</a></p>
                                    {/if}
			</div>
		</div>
	</header>
    </div>
                        	
<div class="bottom-margin ">

</div>	
                <header id="header">
						
						<div class="content">
							<div class="inner">
								<h1>PEMAT</h1>
                                                               
							</div>
						</div>
						<nav>
							<ul>
								<li><a href="#intro">Pracownicy</a></li>
								<li><a href="#work">Towar</a></li>
								<li><a href="#about">Lista zadan</a></li>
								<li><a href="#contact">Contact</a></li>
							</ul>
						</nav>
					</header>
                 <div id="main">

						<!-- Intro -->
							<article id="intro">
								<h2 class="major">Pracownicy</h2>
                                                                <form class="pure-form pure-form-stacked" action="{$conf->action_url}centrum">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="nazwisko" name="sf_surname" value="{$searchForm->surname}" style="float: left;" />
                <button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
                                                                <div class="bottom-margin">
<a class="pure-button button-success" href="{$conf->action_root}personNew">+ Nowy Pracownik</a>
</div>	

<table id="tab_people" class="pure-table pure-table-bordered">
<thead>
	<tr>
                <td>Numer ID</td>
		<th>Imię</th>
		<th>Nazwisko</th>
		<th>Wiek</th>
                <th>Stanowisko</th>
		<th>Opcje</th>
	</tr>
</thead>
<tbody>
{foreach $pracownicy as $p}
{strip}
	<tr>
		<td>{$p["id_pracownika"]}</td>
                <td>{$p["name"]}</td>
		<td>{$p["surname"]}</td>
		<td>{$p["age"]}</td>
                <td>{$p["stanowisko"]}</td>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}personEdit/{$p['id_pracownika']}">Edytuj</a>
			&nbsp;
			<a class="button-small pure-button button-warning" href="{$conf->action_url}personDelete/{$p['id_pracownika']}">Usuń</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>
                                                        </article>

						<!-- Work -->
							<article id="work">
								<h2 class="major">Towar</h2>
                                                                <form class="pure-form pure-form-stacked" action="{$conf->action_url}centrum">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		
                <input type="text" placeholder="nazwa" name="sf_nazwa" value="{$searchForm->nazwa}"style="margin-bottom: 2em;"  />
                <button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
<div class="bottom-margin_1">
<a class="pure-button button-success" href="{$conf->action_root}personNewz">+ Nowy Towar</a>
</div>	

<table id="tab_people_1" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>Nazwa</th>
		<th>Ilosc</th>
		<th>Stan</th>
                <td>Zamówił sprzedawca o nr ID:</td>
		<th>Opcje</th>
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
			&nbsp;
			<a class="button-small pure-button button-warning" href="{$conf->action_url}personDeletez/{$p['id_towaru']}">Usuń</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>
                                                        </article>

						<!-- About -->
							<article id="about">
								<h2 class="major">Zadania dla pracowników</h2>
                                                                <form class="pure-form pure-form-stacked" action="{$conf->action_url}centrum">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="do wykonania" name="sf_do_wykonania" value="{$searchForm->do_wykonania}" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
                                                                <div class="bottom-margin_2">
<a class="pure-button button-success" href="{$conf->action_root}personNewss">+ Nowe zadania do wykonania</a>
</div>	

<table id="tab_people_2" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>Zadania do wykonania</th>
                <th>Pracownik</th>
		<th>Stanowisko</th>
		<th>Status</th>
		<th>Opcje</th>
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
                                                        </article>

                                                        <article id="contact">
                                                            <h2 class="major">Kontakt</h2>
						<div class="widget-body">
                                                    <a>Kamil</a><br><br/>
                                                        
							<a href="mailto:#">skrzypekpb@gmail.com</a><br><br/>

							<a href="https://github.com/KamilSkr/">https://github.com/KamilSkr/</a> <br/> <br/>

							<p>Aplikacja internetowa</p>
						</div>
                                                        </article>
                 </div>

{/block}

{block name=bottom}







{/block}
