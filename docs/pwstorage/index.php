<?php

/**
 * Project: Password Storage
 * Author: Joel Holzer
 * File: index.php
 * Version: 1.0
 */

class Index {
    
}
define('PWSTORAGE_DIR', 'C:/xampp/htdocs/pwstorage/smarty/pwstorage/');
define('SMARTY_DIR', 'C:/xampp/htdocs/pwstorage/smarty/library/libs/');
include(PWSTORAGE_DIR . 'setup/PWStorageSetup.php');

$pwStorageController = new PWStorageController();

//get the current action
$_action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'home';

if (isset($_POST['login'])) {
    $user = new User($_POST['username'], $_POST['password']);
    $pwStorageController->loginUser($user, isset($_GET['action']) ? $_GET['action'] : 'home');
} elseif (isset($_POST['register'])) {
    $user = new User($_POST['username'], $_POST['password'], $_POST['passwordagain']);
    $pwStorageController->registerUser($user, isset($_GET['action']) ? $_GET['action'] : 'home');
} elseif (isset($_POST['logout'])) {
    $pwStorageController->logoutUser();
}else {
    switch($_action) {
        case 'home':
            $pwStorageController->displayHome();
            break;
        case 'register':
            $pwStorageController->displayRegister();
            break;
        case 'registerConfirmation':
            $pwStorageController->displayRegisterConfirmation();
            break;
        case 'pwgenerator':
           $pwStorageController->displayPWGenerator();
            break;
        case 'accounts':
            $pwStorageController->displayAccounts();
            break;
        case 'profile':
            $pwStorageController->displayProfile();
            break;
        default:
            $pwStorageController->displayHome();
            break;  
    }
}






?>