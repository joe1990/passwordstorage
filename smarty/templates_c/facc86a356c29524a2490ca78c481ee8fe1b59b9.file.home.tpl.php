<?php /* Smarty version Smarty-3.1.18, created on 2014-04-26 12:20:45
         compiled from "..\smarty\templates\home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10919535b87631256e9-16450291%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'facc86a356c29524a2490ca78c481ee8fe1b59b9' => 
    array (
      0 => '..\\smarty\\templates\\home.tpl',
      1 => 1398507500,
      2 => 'file',
    ),
    'b419ea7f6d62fa4cdd7b0469fe77e2c6328958c3' => 
    array (
      0 => '..\\smarty\\templates\\index.tpl',
      1 => 1398507523,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10919535b87631256e9-16450291',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_535b876317dcc1_70352274',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535b876317dcc1_70352274')) {function content_535b876317dcc1_70352274($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>PASSWORD STORAGE - Home</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800|Open+Sans+Condensed:300,700" rel="stylesheet" />
        <link href="../smarty/templates/styles/default.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../smarty/templates/styles/fonts.css" rel="stylesheet" type="text/css" media="all" />
    </head>
    <body>
        <div id="logo" class="container">
            <h1><span class="icon icon-lock icon-size"></span> Password <span>Storage</span></h1>
        </div>
        <div id="wrapper" class="container">
            <div id="menu" class="container">
                <ul>
                    <li class="current_page_item"><a href="#" accesskey="1" title="">Home</a></li>
                    <li><a href="#" accesskey="1" title="">Register</a></li>
                </ul>
            </div>
            <div id="page">
                
    <div class="title">
        <h2>Home</h2>
        <span class="byline">Integer sit amet pede vel arcu aliquet pretium</span>
    </div>
    <p>
        Hello, <?php echo $_smarty_tpl->tpl_vars['action']->value;?>
!
        Welcome on the password storage. The plattform can generate and store passwords. To use the plattform, you must first register. 
    </p>
    <a href="#" class="button">Learn More</a>

            </div>
        </div>
    </body>
</html><?php }} ?>
