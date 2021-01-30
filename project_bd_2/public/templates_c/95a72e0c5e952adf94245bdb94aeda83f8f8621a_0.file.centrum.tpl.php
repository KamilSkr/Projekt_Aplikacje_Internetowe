<?php
/* Smarty version 3.1.30, created on 2021-01-30 14:29:21
  from "D:\XAMPP\htdocs\project_bd_2\app\views\centrum.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_60155f31a95e84_37646339',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95a72e0c5e952adf94245bdb94aeda83f8f8621a' => 
    array (
      0 => 'D:\\XAMPP\\htdocs\\project_bd_2\\app\\views\\centrum.tpl',
      1 => 1612013361,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_60155f31a95e84_37646339 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_101927115060155f31a93497_29316850', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_207177894960155f31a95331_41981573', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_101927115060155f31a93497_29316850 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div id="he">
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
    </div>
                        	
<div class="bottom-margin ">

</div>	
                <header id="header">
						
						<div class="content">
							<div class="inner">
								<h1>PEMAT</h1>
                                                               
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
                <td>Numer ID</td>
		<th>Imię</th>
		<th>Nazwisko</th>
		<th>Wiek</th>
                <th>Stanowisko</th>
		<th>Opcje</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pracownicy']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["id_pracownika"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["name"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["surname"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["data_urodzenia"];?>
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
                                                                <form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
centrum">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		
                <input type="text" placeholder="nazwa" name="sf_nazwa" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->nazwa;?>
"style="margin-bottom: 2em;"  />
                <button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
<div class="bottom-margin_1">
<a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personNewz">+ Nowy Towar</a>
</div>	

<table id="tab_people_1" class="pure-table pure-table-bordered">
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
                                                        </article>

						<!-- About -->
							<article id="about">
								<h2 class="major">Zadania dla pracowników</h2>
                                                                <form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
centrum">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="do wykonania" name="sf_do_wykonania" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->do_wykonania;?>
" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
                                                                <div class="bottom-margin_2">
<a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personNewss">+ Nowe zadania do wykonania</a>
</div>	

<table id="tab_people_2" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>Zadania do wykonania</th>
                <th>Pracownik</th>
		<th>Stanowisko</th>
		<th>Status</th>
		<th>Opcje</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['zadania']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["do_wykonania"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["id_pracownika"];?>
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

                                                        <article id="contact">
                                                            <h2 class="major">Kontakt</h2>
						<div class="widget-body">
                                                    <a>Kamil</a><br><br/>
                                                        
							<a href="mailto:#">skrzypekpb@gmail.com</a><br><br/>

							<a href="https://github.com/KamilSkr/">https://github.com/KamilSkr/</a> <br/> <br/>

							<p>Aplikacja internetowa</p>
						</div>
                                                        </article>
                 </div>

<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_207177894960155f31a95331_41981573 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>








<?php
}
}
/* {/block 'bottom'} */
}
