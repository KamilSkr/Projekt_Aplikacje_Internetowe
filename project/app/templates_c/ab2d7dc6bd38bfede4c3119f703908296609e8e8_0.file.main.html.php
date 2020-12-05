<?php
/* Smarty version 3.1.30, created on 2020-12-05 21:17:29
  from "D:\XAMPP\htdocs\project\templates\main.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fcbead9bff1d8_13717079',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab2d7dc6bd38bfede4c3119f703908296609e8e8' => 
    array (
      0 => 'D:\\XAMPP\\htdocs\\project\\templates\\main.html',
      1 => 1607199449,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fcbead9bff1d8_13717079 (Smarty_Internal_Template $_smarty_tpl) {
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
</head>
<body>

        <div class="header">
               <div style="width:90%; margin: 2em auto;">
                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/calc.php" class="pure-button" style=" position: relative; right:  100px;">Kalkulator kredytowy</a>
                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/security/logout.php" class="pure-button pure-button-active" style=" position: relative; left: 50px;">Wyloguj</a>
               </div>
        </div>

        <div class="content">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14545372195fcbead9bfc147_10744532', 'content');
?>

        </div><!-- content -->

        <div class="footer">
                <p>
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18657875265fcbead9bfe2d1_89039586', 'footer');
?>

                </p>
                <section class="contact">
		<ul class="icons">
                    <li><a href="https://github.com/KamilSkr/Projekt_Aplikacje_Internetowe.git" class="icon brands fa-github"><span class="label">Github</span></a></li>
                    <li><a href="#" class="icon fa-facebook-f"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
										</ul>
									</section>
        </div>

</body>

</html><?php }
/* {block 'content'} */
class Block_14545372195fcbead9bfc147_10744532 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
  <?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_18657875265fcbead9bfe2d1_89039586 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść stopki .... <?php
}
}
/* {/block 'footer'} */
}
