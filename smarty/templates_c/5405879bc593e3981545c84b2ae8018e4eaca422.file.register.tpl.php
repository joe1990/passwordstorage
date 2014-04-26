<?php /* Smarty version Smarty-3.1.18, created on 2014-04-26 14:26:49
         compiled from "..\smarty\templates\register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23033535b888eb79d96-06382841%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5405879bc593e3981545c84b2ae8018e4eaca422' => 
    array (
      0 => '..\\smarty\\templates\\register.tpl',
      1 => 1398514323,
      2 => 'file',
    ),
    'b419ea7f6d62fa4cdd7b0469fe77e2c6328958c3' => 
    array (
      0 => '..\\smarty\\templates\\index.tpl',
      1 => 1398515191,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23033535b888eb79d96-06382841',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_535b888eb7dcf3_89242639',
  'variables' => 
  array (
    'activeMenu' => 0,
    'menuEntries' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535b888eb7dcf3_89242639')) {function content_535b888eb7dcf3_89242639($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>PASSWORD STORAGE - Register</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800|Open+Sans+Condensed:300,700" rel="stylesheet" />
        <link href="../smarty/templates/styles/default.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../smarty/templates/styles/fonts.css" rel="stylesheet" type="text/css" media="all" />
    </head>
    <body>
        <div id="header" class="container">
            <div id="logo">
                <h1><span class="icon icon-lock icon-size"></span> Password <span>Storage</span></h1>
            </div>
            <div id="login">
                <?php echo $_smarty_tpl->getSubTemplate ("login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
        </div>
        <div id="wrapper" class="container">
            <?php echo $_smarty_tpl->getSubTemplate ("menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('activeMenu'=>$_smarty_tpl->tpl_vars['activeMenu']->value,'menuEntries'=>$_smarty_tpl->tpl_vars['menuEntries']->value), 0);?>

            <div id="page">
                
    <div class="title">
        <h2>Register</h2>
    </div>
    <div id="form_register">
        <dl>
            <dt>
                Username
            </dt>
            <dd>
                 <input type="text" name="username" size="40" maxlength="50"/>
            </dd>
            <dt>
               Password
            </dt>
            <dd>
                <input type="password" name="password" size="40" maxlength="40"/>
            </dd>
            <dt>
               Re-enter Password
            </dt>
            <dd>
                <input type="password" name="password-again" size="40" maxlength="40"/>
            </dd>
        </dl>
        <a href="#" class="button">Register</a>
    </div>

            </div>
        </div>
    </body>
</html><?php }} ?>
