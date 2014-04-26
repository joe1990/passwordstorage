<?php

/**
 * Project: Password Storage
 * Author: Joel Holzer
 * File: index.php
 * Version: 1.0
 */

//include smarty and set smarty directories
require('../smarty/library/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('../smarty/templates');
$smarty->setCompileDir('../smarty/templates_c');
$smarty->setCacheDir('../smarty/cache');
$smarty->setConfigDir('../smarty/configs');

//get the current action
$_action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'home';

$smarty->assign('action', $_action);

switch($_action) {
    case 'home':
        $smarty->display('home.tpl');
        break;
    case 'register':
        $smarty->display('register.tpl');
        break;
    case 'pwgenerator':
        $smarty->display('pwgenerator.tpl');
        break;
    case 'accounts':
        $smarty->display('accounts.tpl');
        break;
    default:
       $smarty->display('home.tpl');
        break;  
}




?>