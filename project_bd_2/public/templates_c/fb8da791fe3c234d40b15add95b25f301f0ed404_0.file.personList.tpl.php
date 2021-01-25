<?php
/* Smarty version 3.1.30, created on 2021-01-24 21:10:26
  from "D:\XAMPP\htdocs\project_bd_2\app\views\personList.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_600dd432703353_77359469',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fb8da791fe3c234d40b15add95b25f301f0ed404' => 
    array (
      0 => 'D:\\XAMPP\\htdocs\\project_bd_2\\app\\views\\personList.tpl',
      1 => 1611518793,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_600dd432703353_77359469 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1406019938600dd432702796_07410592', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_1406019938600dd432702796_07410592 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

 <header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead">MAGAZYN</h1>
				<p class="tagline">APLIKACJA DO KOMUNIKACJI I ORGANIZACJI PRACY</p>
                                <?php if (\core\RoleUtils::inRole('admin')) {?>
				<p><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
loginShow" class="btn btn-default btn-lg" role="button">Lista</a> 
                                    <?php } elseif (\core\RoleUtils::inRole('user')) {?>
                                        <p><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
loginShow" class="btn btn-default btn-lg" role="button">Lista</a>
                                         <?php } elseif (\core\RoleUtils::inRole('employee')) {?>  
                                             <p><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
loginShow" class="btn btn-default btn-lg" role="button">Lista</a>
                                             <?php } else { ?>
                                                 <?php }?>
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


<?php
}
}
/* {/block 'top'} */
}
