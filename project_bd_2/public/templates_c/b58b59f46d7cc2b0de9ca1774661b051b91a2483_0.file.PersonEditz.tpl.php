<?php
/* Smarty version 3.1.30, created on 2021-01-02 16:44:30
  from "D:\XAMPP\htdocs\php_09_bd\app\views\PersonEditz.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ff094ded83c79_12424343',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b58b59f46d7cc2b0de9ca1774661b051b91a2483' => 
    array (
      0 => 'D:\\XAMPP\\htdocs\\php_09_bd\\app\\views\\PersonEditz.tpl',
      1 => 1609601832,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_5ff094ded83c79_12424343 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2880486575ff094ded7fb26_65157714', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_2880486575ff094ded7fb26_65157714 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin_1">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personSavez" method="post" class="pure-form pure-form-aligned">
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
            <label for="club">Klub</label>
            <input id="club" type="text" placeholder="Klub" name="club" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->club;?>
">
        </div>
        <div class="pure-control-group">
            <label for="position">Pozycja</label>
            <input id="position" type="text" placeholder="Pozycja" name="position" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->position;?>
">
        </div>
        <div class="pure-control-group">
            <label for="date">Data</label>
            <input id="date" type="text" placeholder="Date" name="date" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->date;?>
">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personListz">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id_zawodnika" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
</form>	
</div>

<?php
}
}
/* {/block 'top'} */
}
