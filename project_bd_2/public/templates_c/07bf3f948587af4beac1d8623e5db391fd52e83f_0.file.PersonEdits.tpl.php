<?php
/* Smarty version 3.1.30, created on 2021-01-02 16:45:36
  from "D:\XAMPP\htdocs\php_09_bd\app\views\PersonEdits.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ff0952051c826_08612843',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '07bf3f948587af4beac1d8623e5db391fd52e83f' => 
    array (
      0 => 'D:\\XAMPP\\htdocs\\php_09_bd\\app\\views\\PersonEdits.tpl',
      1 => 1609602266,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_5ff0952051c826_08612843 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18298811655ff0952051c021_38658150', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_18298811655ff0952051c021_38658150 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin_2">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personSaves" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Dane osoby</legend>
		<div class="pure-control-group">
            <label for="name">Imię</label>
            <input id="name" type="text" placeholder="Imię" name="name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->name;?>
">
        </div>
		<div class="pure-control-group">
            <label for="surname">Nazwisko</label>
            <input id="surname" type="text" placeholder="Nazwisko" name="surname" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->surname;?>
">
        </div>
        <div class="pure-control-group">
            <label for="age">Wiek</label>
            <input id="age" type="text" placeholder="Wiek" name="age" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->age;?>
">
        </div>
        <div class="pure-control-group">
            <label for="experience">Doswiadczenie</label>
            <input id="experience" type="text" placeholder="Doswiadczenie" name="experience" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->experience;?>
">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personList">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id_sedzia" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
</form>	
</div>

<?php
}
}
/* {/block 'top'} */
}
