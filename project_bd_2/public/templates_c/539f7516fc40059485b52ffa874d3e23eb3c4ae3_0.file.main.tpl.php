<?php
/* Smarty version 3.1.30, created on 2021-01-24 19:52:19
  from "D:\XAMPP\htdocs\project_bd\app\views\templates\main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_600dc1e3658ca4_02304800',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '539f7516fc40059485b52ffa874d3e23eb3c4ae3' => 
    array (
      0 => 'D:\\XAMPP\\htdocs\\project_bd\\app\\views\\templates\\main.tpl',
      1 => 1611514335,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600dc1e3658ca4_02304800 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta charset="utf-8"/>
	<title>Aplikacja bazodanowa</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css"
		integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/style.css">
            
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
/css/main.css">
</head>
        

<body style="margin: 20px;">

                <div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<?php if (\core\RoleUtils::inRole('admin')) {?>
                                <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
centrum">Magazyn</a>
                                <?php } elseif (\core\RoleUtils::inRole('user')) {?>
                                    <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
User">Magazyn</a>
                                <?php } elseif (\core\RoleUtils::inRole('employee')) {?>  
                                    <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
employee">Magazyn</a>
                                    <?php } else { ?>
                                        <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
loginShow">Magazyn</a>
                                <?php }?>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
                                    
                                        <?php if (\core\RoleUtils::inRole('admin')) {?>
                                            <li><a>Zalogowany jako Administrator</a></li>
                                            <?php } elseif (\core\RoleUtils::inRole('employee')) {?>
                                            <li><a>Zalogowany jako Kierownik</a></li>
                                            <?php } elseif (\core\RoleUtils::inRole('user')) {?>
                                            <li><a>Zalogowany jako Pracownik</a></li>
                                                 <?php } else { ?>
                                                 <li><a> </a></li>
                                            <?php }?>
                                    
                                        <?php if (\core\RoleUtils::inRole('admin')) {?>
                                        <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
centrum">Home</a></li>
					<li><a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout">Wyloguj</a></li>
                                        <?php } elseif (\core\RoleUtils::inRole('user')) {?>
                                        <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
User">Home</a></li>
                                        <li><a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout">Wyloguj</a></li>
                                        <?php } elseif (\core\RoleUtils::inRole('employee')) {?>
                                        <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
employee">Home</a></li>
					<li><a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout">Wyloguj</a></li>
                                        <?php } else { ?>
                                        <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personList">Home</a></li>
                                        <li><a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
loginShow">Zaloguj</a></li>
                                        <?php }?>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

                

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1693534340600dc1e36227f9_96568604', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_778934467600dc1e3648569_06158959', 'messages');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2146062582600dc1e3649d88_37549776', 'bottom');
?>



	<footer id="footer" class="top-space always-bottom">
		<div class="footer1">
			<div class="container">
				<div class="row">

					<div class="col-md-3 widget">
						<h3 class="widget-title">Kontakt</h3>
						<div class="widget-body">
							<a href="mailto:#">skrzypekpb@gmail.com</a><br><br/>

							<a href="https://github.com/KamilSkr/">https://github.com/KamilSkr/</a> <br/> <br/>

							<p>Aplikacje sieciowe</p>
						</div>
					</div>

					<div class="col-md-3 widget">

					</div>

					<div class="col-md-6 widget">
						<h3 class="widget-title">O Projekcie</h3>
						<div class="widget-body">
							<p>Wykorzystane zasoby: <br/>Framework PHP Amelia - http://amelia-framework.kudlacik.eu/, <br/>Smarty - https://www.smarty.net/, <br/>Medoo - https://medoo.in/, <br/>Szablon HTML - https://www.gettemplate.com/</p>
						</div>
					</div>

			
                                </div> 
                            
			</div>
		</div>

		<div class="footer2">
			<div class="container">
				<div class="row">

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
								<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
main">Home</a> |
								<?php if (!core\RoleUtils::inRole("logged")) {?>
									<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login">Zaloguj</a> |
									
								<?php }?>
								<?php if (core\RoleUtils::inRole("logged")) {?>
									<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout">Wyloguj</a>
								<?php }?>
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; 2021, Kamil Skrzypiński. Designed by <a href="http://gettemplate.com/" rel="designer">gettemplate</a>
							</p>
						</div>
					</div>

				</div> 
			</div>
		</div>

	</footer>
                                                        
                        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/jquery.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/browser.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/breakpoints.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/util.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/main.js"><?php echo '</script'; ?>
>
</body>

</html><?php }
/* {block 'top'} */
class Block_1693534340600dc1e36227f9_96568604 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'top'} */
/* {block 'messages'} */
class Block_778934467600dc1e3648569_06158959 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage()) {?>
<div class="messages bottom-margin">
	<ul>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
	<li class="msg <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>error<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>warning<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>info<?php }?>"><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</ul>
</div>
<?php }?>

<?php
}
}
/* {/block 'messages'} */
/* {block 'bottom'} */
class Block_2146062582600dc1e3649d88_37549776 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'bottom'} */
}
