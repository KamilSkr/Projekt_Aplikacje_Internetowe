{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin_1">
<form action="{$conf->action_root}personSavez" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Dane osoby</legend>
		<div class="pure-control-group">
            <label for="name">Imię</label>
            <input id="name" type="text" placeholder="Imię" name="name" value="{$form->name}">
        </div>
		<div class="pure-control-group">
            <label for="surname">Nazwisko</label>
            <input id="surname" type="text" placeholder="Nazwisko" name="surname" value="{$form->surname}">
        </div>
        <div class="pure-control-group">
            <label for="club">Klub</label>
            <input id="club" type="text" placeholder="Klub" name="club" value="{$form->club}">
        </div>
        <div class="pure-control-group">
            <label for="position">Pozycja</label>
            <input id="position" type="text" placeholder="Pozycja" name="position" value="{$form->position}">
        </div>
        <div class="pure-control-group">
            <label for="date">Data</label>
            <input id="date" type="text" placeholder="Date" name="date" value="{$form->date}">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}personListz">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id_zawodnika" value="{$form->id}">
</form>	
</div>

{/block}
