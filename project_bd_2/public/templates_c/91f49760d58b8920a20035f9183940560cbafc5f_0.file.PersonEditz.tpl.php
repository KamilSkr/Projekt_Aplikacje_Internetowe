<?php
/* Smarty version 3.1.30, created on 2021-01-11 18:49:33
  from "D:\XAMPP\htdocs\project_bd\app\views\PersonEditz.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ffc8fad3b9ec8_02052055',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91f49760d58b8920a20035f9183940560cbafc5f' => 
    array (
      0 => 'D:\\XAMPP\\htdocs\\project_bd\\app\\views\\PersonEditz.tpl',
      1 => 1610387370,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_5ffc8fad3b9ec8_02052055 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16051979435ffc8fad3b9236_58771718', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_16051979435ffc8fad3b9236_58771718 extends Smarty_Internal_Block
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
            <input id="stan" type="text" placeholder="stan" name="stan" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->stan;?>
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
            <input id="stan" type="text" placeholder="stan" name="stan" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->stan;?>
" readonly>
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
            <input id="stan" type="text" placeholder="stan" name="stan" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->stan;?>
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
