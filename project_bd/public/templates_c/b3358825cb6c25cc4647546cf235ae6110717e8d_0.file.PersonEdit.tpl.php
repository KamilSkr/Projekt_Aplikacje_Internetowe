<?php
/* Smarty version 3.1.30, created on 2021-01-10 21:50:41
  from "D:\XAMPP\htdocs\project_bd\app\views\PersonEdit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ffb68a196af00_09188466',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b3358825cb6c25cc4647546cf235ae6110717e8d' => 
    array (
      0 => 'D:\\XAMPP\\htdocs\\project_bd\\app\\views\\PersonEdit.tpl',
      1 => 1610310169,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_5ffb68a196af00_09188466 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10096814805ffb68a196a007_56395733', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_10096814805ffb68a196a007_56395733 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personSave" method="post" class="pure-form pure-form-aligned">
	<?php if (\core\RoleUtils::inRole('admin')) {?>
            <fieldset>
<legend>Dane osoby</legend>
 
                <div class="pure-control-group">
            <label for="name">imie</label>
            <input id="name" type="text" placeholder="imie" name="name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->name;?>
">
        </div>
		<div class="pure-control-group">
            <label for="surname">nazwisko</label>
            <input id="surname" type="text" placeholder="nazwisko" name="surname" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->surname;?>
">
        </div>
        <div class="pure-control-group">
            <label for="age">wiek</label>
            <input id="age" type="text" placeholder="wiek" name="age" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->age;?>
">
        </div>
        <div class="pure-control-group">
            <label for="stanowisko">stanowisko</label>
            <input id="stanowisko" type="text" placeholder="stanowisko" name="stanowisko" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->stanowisko;?>
">
        </div>        
        <div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
centrum">Powrót</a>
		</div>
	</fieldset>
                <?php } else { ?>
                    <fieldset>
<legend>Dane osoby</legend>
 
                <div class="pure-control-group">
            <label for="name">imie</label>
            <input id="name" type="text" placeholder="imie" name="name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->name;?>
" readonly>
        </div>
		<div class="pure-control-group">
            <label for="surname">nazwisko</label>
            <input id="surname" type="text" placeholder="nazwisko" name="surname" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->surname;?>
" readonly>
        </div>
        <div class="pure-control-group">
            <label for="age">wiek</label>
            <input id="age" type="text" placeholder="wiek" name="age" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->age;?>
">
        </div>
        <div class="pure-control-group">
            <label for="stanowisko">stanowisko</label>
            <input id="stanowisko" type="text" placeholder="stanowisko" name="stanowisko" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->stanowisko;?>
">
        </div>        
        <div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
centrum">Powrót</a>
		</div>
	</fieldset>
                    <?php }?>
    <input type="hidden" name="id_pracownika" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
</form>	
</div>

<?php
}
}
/* {/block 'top'} */
}
