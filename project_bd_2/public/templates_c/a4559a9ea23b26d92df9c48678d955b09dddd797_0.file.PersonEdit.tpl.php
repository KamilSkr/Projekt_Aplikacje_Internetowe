<?php
/* Smarty version 3.1.30, created on 2021-01-24 21:17:58
  from "D:\XAMPP\htdocs\project_bd_2\app\views\PersonEdit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_600dd5f6e81a96_86890906',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a4559a9ea23b26d92df9c48678d955b09dddd797' => 
    array (
      0 => 'D:\\XAMPP\\htdocs\\project_bd_2\\app\\views\\PersonEdit.tpl',
      1 => 1611518793,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_600dd5f6e81a96_86890906 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_529769500600dd5f6e810a8_71993158', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_529769500600dd5f6e810a8_71993158 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personSave" method="post" class="pure-form pure-form-aligned">
	<?php if (\core\RoleUtils::inRole('admin')) {?>
            <fieldset>
                <legend style="color: black;">Dane osoby</legend>
 
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
" readonly>
        </div>
        <div class="pure-control-group">
            <label for="stanowisko">stanowisko</label>
            <input id="stanowisko" type="text" placeholder="stanowisko" name="stanowisko" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->stanowisko;?>
" readonly>
        </div>        
        <div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
employee">Powrót</a>
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
