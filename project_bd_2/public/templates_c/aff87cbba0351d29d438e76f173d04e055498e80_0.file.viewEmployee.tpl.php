<?php
/* Smarty version 3.1.30, created on 2021-02-06 18:26:29
  from "D:\XAMPP\htdocs\project_bd_2\app\views\viewEmployee.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_601ed145844f71_42946713',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aff87cbba0351d29d438e76f173d04e055498e80' => 
    array (
      0 => 'D:\\XAMPP\\htdocs\\project_bd_2\\app\\views\\viewEmployee.tpl',
      1 => 1612631855,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_601ed145844f71_42946713 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_435056131601ed145832ee8_55293368', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1762244573601ed145844754_76074529', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_435056131601ed145832ee8_55293368 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

 <header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead">MAGAZYN</h1>
				<p class="tagline">APLIKACJA DO KOMUNIKACJI I ORGANIZACJI PRACY</p>
				<p><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
employeePracownik" class="btn btn-default btn-lg" role="button">Lista</a> 
                                    <?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout" class="btn btn-action btn-lg" role="button">Wyloguj</a></p>
                                    <?php } else { ?>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
loginShow" class="btn btn-action btn-lg" role="button">Zaloguj</a></p>
                                    <?php }?>
			</div>
		</div>
	</header>
                        	
<div class="bottom-margin ">
<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
employeePracownik">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="nazwisko" name="sf_surname" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->surname;?>
" style="float: left;" />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>	

<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_1762244573601ed145844754_76074529 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <table id="tab_people" class="pure-table pure-table-bordered" style="margin-top: 2em">
<thead>
	<tr>
                <th>Numer ID</th>
		<th>Imię</th>
		<th>Nazwisko</th>
		<th>Wiek</th>
                <th>Stanowisko</th>
		
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pracownicy']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
<tr><th><?php echo $_smarty_tpl->tpl_vars['p']->value["id_pracownika"];?>
</th><td><?php echo $_smarty_tpl->tpl_vars['p']->value["name"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["surname"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["data_urodzenia"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["stanowisko"];?>
</td></tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</tbody>
</table>

<?php
}
}
/* {/block 'bottom'} */
}
