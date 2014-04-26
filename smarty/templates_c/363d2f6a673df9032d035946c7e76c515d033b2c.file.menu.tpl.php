<?php /* Smarty version Smarty-3.1.18, created on 2014-04-26 13:28:51
         compiled from "..\smarty\templates\menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8580535b9325956fd0-05894755%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '363d2f6a673df9032d035946c7e76c515d033b2c' => 
    array (
      0 => '..\\smarty\\templates\\menu.tpl',
      1 => 1398511729,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8580535b9325956fd0-05894755',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_535b9325958c41_99374332',
  'variables' => 
  array (
    'menuEntries' => 0,
    'activeMenu' => 0,
    'menuEntry' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535b9325958c41_99374332')) {function content_535b9325958c41_99374332($_smarty_tpl) {?><div id="menu" class="container">
    <ul>
        <?php  $_smarty_tpl->tpl_vars['menuEntry'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menuEntry']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menuEntries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menuEntry']->key => $_smarty_tpl->tpl_vars['menuEntry']->value) {
$_smarty_tpl->tpl_vars['menuEntry']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['activeMenu']->value==$_smarty_tpl->tpl_vars['menuEntry']->value) {?>
                <li class="current_page_item"><a href="index.php?action=<?php echo $_smarty_tpl->tpl_vars['menuEntry']->value;?>
" accesskey="1" title=""><?php echo $_smarty_tpl->tpl_vars['menuEntry']->value;?>
</a></li>
            <?php } else { ?>
                <li ><a href="index.php?action=<?php echo $_smarty_tpl->tpl_vars['menuEntry']->value;?>
" accesskey="1" title=""><?php echo $_smarty_tpl->tpl_vars['menuEntry']->value;?>
</a></li>
            <?php }?>
        <?php } ?>
    </ul>
</div><?php }} ?>
