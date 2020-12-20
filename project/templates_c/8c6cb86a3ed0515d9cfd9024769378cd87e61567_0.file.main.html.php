<?php
/* Smarty version 3.1.30, created on 2020-12-20 16:30:53
  from "D:\XAMPP\htdocs\project\app\views\templates\main.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fdf6e2dcb2fc3_43286009',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c6cb86a3ed0515d9cfd9024769378cd87e61567' => 
    array (
      0 => 'D:\\XAMPP\\htdocs\\project\\app\\views\\templates\\main.html',
      1 => 1608478253,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fdf6e2dcb2fc3_43286009 (Smarty_Internal_Template $_smarty_tpl) {
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
        <noscript><link rel="stylesheet" href="app/assets/css/noscript.css" /></noscript>
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
        
    <h1>Kalkulator</h1>
	
</div>

<div class="content">
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5548185345fdf6e2dcb20c9_19360987', 'content');
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
	<?php echo '<script'; ?>
 src="assets/js/jquery.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/jquery.dropotron.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/jquery.scrolly.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="ssets/js/jquery.scrollex.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/browser.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/util.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="assets/js/main.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
/* {block 'content'} */
class Block_5548185345fdf6e2dcb20c9_19360987 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
}
