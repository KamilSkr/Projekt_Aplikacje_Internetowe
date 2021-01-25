{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin_1">
<form action="{$conf->action_root}personSavez" method="post" class="pure-form pure-form-aligned">
{if \core\RoleUtils::inRole('admin')}	
    <fieldset>
		<legend>Dane osoby</legend>
				<div class="pure-control-group">
            <label for="nazwa">Nazwa</label>
            <input id="nazwa" type="text" placeholder="Nazwa" name="nazwa" value="{$form->nazwa}">
        </div>
		<div class="pure-control-group">
            <label for="ilosc">ilosc</label>
            <input id="ilosc" type="text" placeholder="ilosc" name="ilosc" value="{$form->ilosc}">
        </div>
        <div class="pure-control-group">
            <label for="stan">stan</label>
            <input id="stan" type="text" placeholder="stan" name="stan" value="{$form->stan}">
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
            <label for="nazwa">Nazwa</label>
            <input id="nazwa" type="text" placeholder="Nazwa" name="nazwa" value="{$form->nazwa}">
        </div>
		<div class="pure-control-group">
            <label for="ilosc">ilosc</label>
            <input id="ilosc" type="text" placeholder="ilosc" name="ilosc" value="{$form->ilosc}">
        </div>
        <div class="pure-control-group">
            <label for="stan">stan</label>
            <input id="stan" type="text" placeholder="stan" name="stan" value="{$form->stan}" readonly>
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
            <label for="nazwa">Nazwa</label>
            <input id="nazwa" type="text" placeholder="Nazwa" name="nazwa" value="{$form->nazwa}" readonly>
        </div>
		<div class="pure-control-group">
            <label for="ilosc">ilosc</label>
            <input id="ilosc" type="text" placeholder="ilosc" name="ilosc" value="{$form->ilosc}">
        </div>
        <div class="pure-control-group">
            <label for="stan">stan</label>
            <input id="stan" type="text" placeholder="stan" name="stan" value="{$form->stan}">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}User">Powrót</a>
		</div>
	</fieldset>
                    {/if}
    <input type="hidden" name="id_towaru" value="{$form->id}">
</form>	
</div>

{/block}
