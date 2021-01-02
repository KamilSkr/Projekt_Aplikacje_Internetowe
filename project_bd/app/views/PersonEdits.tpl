{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin_2">
<form action="{$conf->action_root}personSaves" method="post" class="pure-form pure-form-aligned">
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
            <label for="age">Wiek</label>
            <input id="age" type="text" placeholder="Wiek" name="age" value="{$form->age}">
        </div>
        <div class="pure-control-group">
            <label for="experience">Doswiadczenie</label>
            <input id="experience" type="text" placeholder="Doswiadczenie" name="experience" value="{$form->experience}">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}personList">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id_sedzia" value="{$form->id}">
</form>	
</div>

{/block}
