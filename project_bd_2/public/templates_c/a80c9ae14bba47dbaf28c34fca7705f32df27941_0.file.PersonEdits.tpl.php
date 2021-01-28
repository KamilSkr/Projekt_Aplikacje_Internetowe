<?php
/* Smarty version 3.1.30, created on 2021-01-28 21:35:33
  from "D:\XAMPP\htdocs\project_bd_2\app\views\PersonEdits.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_60132015c21cb6_14251141',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a80c9ae14bba47dbaf28c34fca7705f32df27941' => 
    array (
      0 => 'D:\\XAMPP\\htdocs\\project_bd_2\\app\\views\\PersonEdits.tpl',
      1 => 1611865622,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_60132015c21cb6_14251141 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_120542505660132015c1e330_61735957', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_120542505660132015c1e330_61735957 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin_2">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personSaves" method="post" class="pure-form pure-form-aligned">
<?php if (\core\RoleUtils::inRole('admin')) {?>	
    <fieldset>
		<legend>Dane osoby</legend>
                <div class="pure-control-group">
            <label for="do_wykonania">zadanie do wykonania</label>
            <input id="do_wykonania" type="text" placeholder="zadanie do wykonania" name="do_wykonania" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->do_wykonania;?>
">
        </div>
        <div class="pure-control-group">
            <label for="id_pracownika">Pracownik</label>
            <input id="id_pracownika" type="text" placeholder="ID Pracownika" name="id_pracownika" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id_p;?>
">
        </div>
		<div class="pure-control-group">
            <label for="stanowisko">stanowisko</label>
            <input id="stanowisko" type="text" placeholder="stanowisko" name="stanowisko" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->stanowisko;?>
">
        </div>
        <div class="pure-control-group">
            <label for="status">status</label>
            <input id="status" type="text" placeholder="status" name="status" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->status;?>
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
            <label for="do_wykonania">zadanie do wykonania</label>
            <input id="do_wykonania" type="text" placeholder="zadanie do wykonania" name="do_wykonania" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->do_wykonania;?>
">
        </div>
        <div class="pure-control-group">
            <label for="id_pracownika">Pracownik</label>
            <input id="id_pracownika" type="text" placeholder="ID Pracownika" name="id_pracownika" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id_p;?>
">
        </div>
		<div class="pure-control-group">
            <label for="stanowisko">stanowisko</label>
            <input id="stanowisko" type="text" placeholder="stanowisko" name="stanowisko" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->stanowisko;?>
">
        </div>
        <div class="pure-control-group">
            <label for="status">status</label>
            <input id="status" type="text" placeholder="status" name="status" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->status;?>
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
            <label for="do_wykonania">zadanie do wykonania</label>
            <input id="do_wykonania" type="text" placeholder="zadanie do wykonania" name="do_wykonania" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->do_wykonania;?>
" >
        </div>
        <div class="pure-control-group">
            <label for="id_pracownika">Pracownik</label>
            <input id="id_pracownika" type="text" placeholder="ID Pracownika" name="id_pracownika" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id_p;?>
" readonly>
        </div>
		<div class="pure-control-group">
            <label for="stanowisko">stanowisko</label>
            <input id="stanowisko" type="text" placeholder="stanowisko" name="stanowisko" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->stanowisko;?>
" >
        </div>
        <div class="pure-control-group">
            <label for="status">status</label>
            <input id="status" type="text" placeholder="status" name="status" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->status;?>
">
        </div>
        		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
User">Powrót</a>
		</div>
	</fieldset>
                     <?php }?>
    <input type="hidden" name="id_zadania" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
</form>	
</div>

<?php
}
}
/* {/block 'top'} */
}
