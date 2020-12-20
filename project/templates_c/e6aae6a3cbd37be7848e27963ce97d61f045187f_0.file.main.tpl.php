<?php
/* Smarty version 3.1.30, created on 2020-12-20 19:38:37
  from "D:\XAMPP\htdocs\project\app\views\templates\main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fdf9a2d9c96b9_02798093',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e6aae6a3cbd37be7848e27963ce97d61f045187f' => 
    array (
      0 => 'D:\\XAMPP\\htdocs\\project\\app\\views\\templates\\main.tpl',
      1 => 1608489517,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fdf9a2d9c96b9_02798093 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_description']->value)===null||$tmp==='' ? 'Opis domyślny' : $tmp);?>
">
	<title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? "Tytuł domyślny" : $tmp);?>
</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css" integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/style.css">	
        <noscript><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/noscript.css" /></noscript>
</head>
<body>

<div class="header">
    
    <nav id="nav">
							<ul>
									<li><a href="http://localhost:80/project/index.php">Home</a></li>
                                                                        <li><a href="http://localhost:80/project/app/calc.php">Kalkulator Kredytowy</a></li>
                                                                        <li><a href="https://github.com/KamilSkr/Projekt_Aplikacje_Internetowe.git">Github</a></li>
                                                                        <li><a href="http://localhost:80/project/index_1.php">Kalkulator</a></li>
							
							</ul>
						</nav>
    
	<h1><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? "Tytuł domyślny" : $tmp);?>
</h1>
	
	
</div>

<div class="content">
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13031823935fdf9a2d9c7f19_64457091', 'content');
?>

</div><!-- content -->

<div class="footer">
	<section class="contact">
										<ul class="icons">
											<li><a href="https://github.com/KamilSkr/Projekt_Aplikacje_Internetowe.git" class="icon brands fa-github"><span class="label">Github</span></a></li>
											<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                                                                                        <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
										</ul>
									</section>
	
</div>

</body>
</html><?php }
/* {block 'content'} */
class Block_13031823935fdf9a2d9c7f19_64457091 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
}
