<?php /* Smarty version Smarty-3.1.18, created on 2014-04-26 14:34:08
         compiled from "..\smarty\templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9342535ba6002b0268-94448709%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b965d2670da9dc45736d66d7dab6675260614e65' => 
    array (
      0 => '..\\smarty\\templates\\login.tpl',
      1 => 1398515638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9342535ba6002b0268-94448709',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_535ba6002b1686_34493821',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535ba6002b1686_34493821')) {function content_535ba6002b1686_34493821($_smarty_tpl) {?><div id="loginform">
<dl>
    <dt>
        Username
    </dt>
    <dd>
        <input type="text" name="username" size="30" maxlength="50"/>
    </dd>
    <dt>
        Password
    </dt>
    <dd>
        <input type="password" name="password" size="30" maxlength="40"/>
    </dd>
</dl>
<a href="#" class="button">Login</a>
</div><?php }} ?>
