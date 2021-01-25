<?php
/* Smarty version 3.1.30, created on 2021-01-24 21:04:14
  from "D:\XAMPP\htdocs\project_bd\app\views\centrum.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_600dd2beacf115_13780028',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '181e0bc1a78a232dfa49ff861dc2a1ce0d1f64c9' => 
    array (
      0 => 'D:\\XAMPP\\htdocs\\project_bd\\app\\views\\centrum.tpl',
      1 => 1611518516,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_600dd2beacf115_13780028 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_546653101600dd2beacacc6_23097968', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_78382844600dd2beace5d3_55407386', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_546653101600dd2beacacc6_23097968 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

 <header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead">MAGAZYN</h1>
				<p class="tagline">APLIKACJA DO KOMUNIKACJI I ORGANIZACJI PRACY</p>
				<p><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
centrum" class="btn btn-default btn-lg" role="button">Lista</a> 
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

</div>	
                <header id="header">
						
						<div class="content">
							<div class="inner">
								<h1>TRADE-PORT</h1>
                                                               
							</div>
						</div>
						<nav>
							<ul>
								<li><a href="#intro">Pracownicy</a></li>
								<li><a href="#work">Towar</a></li>
								<li><a href="#about">Lista zadan</a></li>
								<li><a href="#contact">Contact</a></li>
							</ul>
						</nav>
					</header>
                 <div id="main">

						<!-- Intro -->
							<article id="intro">
								<h2 class="major">Pracownicy</h2>
                                                                <form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
centrum">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="nazwisko" name="sf_surname" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->surname;?>
" style="float: left;" />
                <input type="text" placeholder="nazwa" name="sf_nazwa" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->nazwa;?>
"style="margin-left: 2em; float: left;"  />
                <input type="text" placeholder="do wykonania" name="sf_do_wykonania" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->do_wykonania;?>
" style="margin-left: 32em;" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
                                                                <div class="bottom-margin">
<a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personNew">+ Nowy Pracownik</a>
</div>	

<table id="tab_people" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>imię</th>
		<th>nazwisko</th>
		<th>wiek</th>
                <th>stanowisko</th>
		<th>opcje</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pracownicy']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["name"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["surname"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["age"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["stanowisko"];?>
</td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
personEdit/<?php echo $_smarty_tpl->tpl_vars['p']->value['id_pracownika'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
personDelete/<?php echo $_smarty_tpl->tpl_vars['p']->value['id_pracownika'];?>
">Usuń</a></td></tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</tbody>
</table>
                                                        </article>

						<!-- Work -->
							<article id="work">
								<h2 class="major">Towar</h2>
                                                                
<div class="bottom-margin_1">
<a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personNewz">+ Nowy Towar</a>
</div>	

<table id="tab_people_1" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>nazwa</th>
		<th>ilosc</th>
		<th>stan</th>
		<th>opcje</th>
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
                                                        </article>

						<!-- About -->
							<article id="about">
								<h2 class="major">O mnie</h2>
                                                                <div class="bottom-margin_2">
<a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personNewss">+ Nowe zadania do wykonania</a>
</div>	

<table id="tab_people_2" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>Zadania do wykonania</th>
		<th>stanowisko</th>
		<th>status</th>
		<th>opcje</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['zadania']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["do_wykonania"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["stanowisko"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["status"];?>
</td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
personEdits/<?php echo $_smarty_tpl->tpl_vars['p']->value['id_zadania'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
personDeletes/<?php echo $_smarty_tpl->tpl_vars['p']->value['id_zadania'];?>
">Usuń</a></td></tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</tbody>
</table>
                                                        </article>
                 </div>

<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_78382844600dd2beace5d3_55407386 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>








<?php
}
}
/* {/block 'bottom'} */
}
