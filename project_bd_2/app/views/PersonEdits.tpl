{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin_2">
<form action="{$conf->action_root}personSaves" method="post" class="pure-form pure-form-aligned">
{if \core\RoleUtils::inRole('admin')}	
    <fieldset>
		<legend>Dane osoby</legend>
                <div class="pure-control-group">
            <label for="do_wykonania">zadanie do wykonania</label>
            <input id="do_wykonania" type="text" placeholder="zadanie do wykonania" name="do_wykonania" value="{$form->do_wykonania}">
        </div>
        <div class="pure-control-group">
            <label for="id_pracownika">Pracownik</label>
            <input id="id_pracownika" type="text" placeholder="ID Pracownika" name="id_pracownika" value="{$form->id_p}">
        </div>
		<div class="pure-control-group">
            <label for="stanowisko">stanowisko</label>
            <input id="stanowisko" type="text" placeholder="stanowisko" name="stanowisko" value="{$form->stanowisko}">
        </div>
        <div class="pure-control-group">
            <label for="status">status</label>
            <input id="status" type="text" placeholder="status" name="status" value="{$form->status}">
        </div>
        		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}centrum">Powrót</a>
		</div>
	</fieldset>
                 {else if \core\RoleUtils::inRole('employee')}
                         <fieldset>
		<legend>Dane osoby</legend>
                <div class="pure-control-group">
            <label for="do_wykonania">zadanie do wykonania</label>
            <input id="do_wykonania" type="text" placeholder="zadanie do wykonania" name="do_wykonania" value="{$form->do_wykonania}">
        </div>
        <div class="pure-control-group">
            <label for="id_pracownika">Pracownik</label>
            <input id="id_pracownika" type="text" placeholder="ID Pracownika" name="id_pracownika" value="{$form->id_p}">
        </div>
		<div class="pure-control-group">
            <label for="stanowisko">stanowisko</label>
            <input id="stanowisko" type="text" placeholder="stanowisko" name="stanowisko" value="{$form->stanowisko}">
        </div>
        <div class="pure-control-group">
            <label for="status">status</label>
            <input id="status" type="text" placeholder="status" name="status" value="{$form->status}" readonly>
        </div>
        		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}employee">Powrót</a>
		</div>
	</fieldset>
                {else if \core\RoleUtils::inRole('user')}
                    <fieldset>
		<legend>Dane osoby</legend>
                <div class="pure-control-group">
            <label for="do_wykonania">zadanie do wykonania</label>
            <input id="do_wykonania" type="text" placeholder="zadanie do wykonania" name="do_wykonania" value="{$form->do_wykonania}" >
        </div>
        <div class="pure-control-group">
            <label for="id_pracownika">Pracownik</label>
            <input id="id_pracownika" type="text" placeholder="ID Pracownika" name="id_pracownika" value="{$form->id_p}" readonly>
        </div>
		<div class="pure-control-group">
            <label for="stanowisko">stanowisko</label>
            <input id="stanowisko" type="text" placeholder="stanowisko" name="stanowisko" value="{$form->stanowisko}" >
        </div>
        <div class="pure-control-group">
            <label for="status">status</label>
            <input id="status" type="text" placeholder="status" name="status" value="{$form->status}">
        </div>
        		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}User">Powrót</a>
		</div>
	</fieldset>
                     {/if}
    <input type="hidden" name="id_zadania" value="{$form->id}">
</form>	
</div>

{/block}
