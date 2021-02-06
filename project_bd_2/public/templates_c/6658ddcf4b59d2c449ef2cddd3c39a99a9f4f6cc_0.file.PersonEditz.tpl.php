<?php
/* Smarty version 3.1.30, created on 2021-02-06 16:27:27
  from "D:\XAMPP\htdocs\project_bd_2\app\views\PersonEditz.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_601eb55f100161_36784396',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6658ddcf4b59d2c449ef2cddd3c39a99a9f4f6cc' => 
    array (
      0 => 'D:\\XAMPP\\htdocs\\project_bd_2\\app\\views\\PersonEditz.tpl',
      1 => 1612625242,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_601eb55f100161_36784396 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1975083542601eb55f0ff5f3_40091917', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_1975083542601eb55f0ff5f3_40091917 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin_1">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personSavez" method="post" class="pure-form pure-form-aligned">
<?php if (\core\RoleUtils::inRole('admin')) {?>	
    <fieldset>
		<legend>Dane osoby</legend>
				<div class="pure-control-group">
            <label for="nazwa">Nazwa</label>
            <input id="nazwa" type="text" placeholder="Nazwa" name="nazwa" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->nazwa;?>
">
        </div>
		<div class="pure-control-group">
            <label for="ilosc">ilosc</label>
            <input id="ilosc" type="text" placeholder="ilosc" name="ilosc" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->ilosc;?>
">
        </div>
        
        <div class="pure-control-group">
            <label for="stan">stan</label>
            <select name="stan" id="stan" style="background-color: black; height: 2.85em;">
                <option value="" > Wybierz stan... </option>

                <option <?php if ($_smarty_tpl->tpl_vars['form']->value->stan == 'Dostępny') {?> selected<?php }?>>Dostępny</option>
                
                <option <?php if ($_smarty_tpl->tpl_vars['form']->value->stan == 'Nie Dostępny') {?> selected<?php }?>>Nie Dostępny</option>
                
                <option <?php if ($_smarty_tpl->tpl_vars['form']->value->stan == 'Zamówiony') {?> selected<?php }?>>Zamówiony</option>
            </select>
                    </div>
        
        <div class="pure-control-group">
            <label for="id_zamawiajacego">Nr ID</label>
            <input id="id_zamawiajacego" type="text" placeholder="Zamawiajacy towar" name="id_zamawiajacego" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id_z;?>
">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
centrum">Powrót</a>
		</div>
	</fieldset>
                <?php } elseif (\core\RoleUtils::inRole('employee')) {?>
                        <fieldset>
		<legend>Dane osoby</legend>
				<div class="pure-control-group">
            <label for="nazwa">Nazwa</label>
            <input id="nazwa" type="text" placeholder="Nazwa" name="nazwa" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->nazwa;?>
">
        </div>
		<div class="pure-control-group">
            <label for="ilosc">ilosc</label>
            <input id="ilosc" type="text" placeholder="ilosc" name="ilosc" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->ilosc;?>
">
        </div>
        <div class="pure-control-group">
            <label for="stan">stan</label>
            <select name="stan" id="stan" style="background-color: black; height: 2.85em;">
                <option value="" > Wybierz stan... </option>

                <option <?php if ($_smarty_tpl->tpl_vars['form']->value->stan == 'Dostępny') {?> selected<?php }?>>Dostępny</option>
                
                <option <?php if ($_smarty_tpl->tpl_vars['form']->value->stan == 'Nie Dostępny') {?> selected<?php }?>>Nie Dostępny</option>
                
                <option <?php if ($_smarty_tpl->tpl_vars['form']->value->stan == 'Zamówiony') {?> selected<?php }?>>Zamówiony</option>
            </select>
                    </div>
        <div class="pure-control-group">
            <label for="id_zamawiajacego">Nr ID</label>
            <input id="id_zamawiajacego" type="text" placeholder="Zamawiajacy Towar" name="id_zamawiajacego" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id_z;?>
">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
employee">Powrót</a>
		</div>
	</fieldset>
                    <?php } elseif (\core\RoleUtils::inRole('user')) {?>
                            <fieldset>
		<legend>Dane osoby</legend>
				<div class="pure-control-group">
            <label for="nazwa">Nazwa</label>
            <input id="nazwa" type="text" placeholder="Nazwa" name="nazwa" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->nazwa;?>
" readonly>
        </div>
		<div class="pure-control-group">
            <label for="ilosc">ilosc</label>
            <input id="ilosc" type="text" placeholder="ilosc" name="ilosc" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->ilosc;?>
">
        </div>
                <div class="pure-control-group">
            <label for="stan">stan</label>
            <select name="stan" id="stan" style="background-color: black; height: 2.85em;">
                <option value="" > Wybierz stan... </option>

                <option <?php if ($_smarty_tpl->tpl_vars['form']->value->stan == 'Dostępny') {?> selected<?php }?>>Dostępny</option>
                
                <option <?php if ($_smarty_tpl->tpl_vars['form']->value->stan == 'Nie Dostępny') {?> selected<?php }?>>Nie Dostępny</option>
                
                <option <?php if ($_smarty_tpl->tpl_vars['form']->value->stan == 'Zamówiony') {?> selected<?php }?>>Zamówiony</option>
            </select>
                    </div>
        <div class="pure-control-group">
            <label for="id_zamawiajacego">Nr ID</label>
            <input id="id_zamawiajacego" type="text" placeholder="Zamawiajacy towar" name="id_zamawiajacego" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id_z;?>
">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
User">Powrót</a>
		</div>
	</fieldset>
                    <?php }?>
    <input type="hidden" name="id_towaru" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
</form>	
</div>

<?php
}
}
/* {/block 'top'} */
}
