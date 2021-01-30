{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form action="{$conf->action_root}personSave" method="post" class="pure-form pure-form-aligned">
	{if \core\RoleUtils::inRole('admin')}
            <fieldset>
                <legend style="color: black;">Dane osoby</legend>
 
                <div class="pure-control-group">
            <label for="name">imie</label>
            <input id="name" type="text" placeholder="imie" name="name" value="{$form->name}">
        </div>
		<div class="pure-control-group">
            <label for="surname">nazwisko</label>
            <input id="surname" type="text" placeholder="nazwisko" name="surname" value="{$form->surname}">
        </div>
        <div class="pure-control-group">
            <label for="data_urodzenia">wiek</label>
            <input id="data_urodzenia" type="text" placeholder="data urodzenia" name="age" value="{$form->age}">
        </div>
        <div class="pure-control-group">
            <label for="stanowisko">stanowisko</label>
            <input id="stanowisko" type="text" placeholder="stanowisko" name="stanowisko" value="{$form->stanowisko}">
        </div>        
        <div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}centrum">Powrót</a>
		</div>
	</fieldset>
                {else \core\RoleUtils::inRole('employee')}
                    <fieldset>
<legend>Dane osoby</legend>
 
                <div class="pure-control-group">
            <label for="name">imie</label>
            <input id="name" type="text" placeholder="imie" name="name" value="{$form->name}" readonly>
        </div>
		<div class="pure-control-group">
            <label for="surname">nazwisko</label>
            <input id="surname" type="text" placeholder="nazwisko" name="surname" value="{$form->surname}" readonly>
        </div>
        <div class="pure-control-group">
            <label for="data_urodzenia">wiek</label>
            <input id="data_urodzenia" type="text" placeholder="data urodzenia" name="data_urodzenia" value="{$form->age}" readonly>
        </div>
        <div class="pure-control-group">
            <label for="stanowisko">stanowisko</label>
            <input id="stanowisko" type="text" placeholder="stanowisko" name="stanowisko" value="{$form->stanowisko}" readonly>
        </div>        
        <div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}employee">Powrót</a>
		</div>
	</fieldset>
                    {/if}
    <input type="hidden" name="id_pracownika" value="{$form->id}">
</form>	
</div>

{/block}
