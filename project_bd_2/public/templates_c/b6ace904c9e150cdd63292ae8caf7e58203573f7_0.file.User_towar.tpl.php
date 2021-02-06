<?php
/* Smarty version 3.1.30, created on 2021-02-06 16:37:44
  from "D:\XAMPP\htdocs\project_bd_2\app\views\User_towar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_601eb7c8120e21_07967575',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b6ace904c9e150cdd63292ae8caf7e58203573f7' => 
    array (
      0 => 'D:\\XAMPP\\htdocs\\project_bd_2\\app\\views\\User_towar.tpl',
      1 => 1612625726,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_601eb7c8120e21_07967575 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1425670810601eb7c8103a95_54327090', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_154144101601eb7c8120607_67030132', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_1425670810601eb7c8103a95_54327090 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

 <header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead">MAGAZYN</h1>
				<p class="tagline">APLIKACJA DO KOMUNIKACJI I ORGANIZACJI PRACY</p>
				<p><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
User" class="btn btn-default btn-lg" role="button">Lista</a> 
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
User">
    <legend style="color: #ffffff;">Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="nazwa" name="sf_nazwa" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->nazwa;?>
"style="float: left;"  />
                <input type="text" placeholder="do wykonania" name="sf_do_wykonania" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->do_wykonania;?>
" style="margin-left: 15em;" /><br />              
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
               
</form>
</div>	

<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_154144101601eb7c8120607_67030132 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>




<table id="tab_people_1" class="pure-table pure-table-bordered" style="margin-top: 2em;" >
<thead>
	<tr>
                <th>Nazwa</th>
		<th>Ilosc</th>
		<th>Stan</th>
                <td>Zamówił sprzedawca o nr ID:</td>
		<th>Opcje</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['towar']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["nazwa"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["ilosc"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["stan"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["id_zamawiajacego"];?>
</td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
personEditz/<?php echo $_smarty_tpl->tpl_vars['p']->value['id_towaru'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
personDeletez/<?php echo $_smarty_tpl->tpl_vars['p']->value['id_towaru'];?>
">Usuń</a></td></tr>
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
