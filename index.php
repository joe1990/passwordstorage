<?php

/**
 * Main-File of the application. Works with the http POST and GET parameter and call the corresponding controller methods.
 * Define constants for the pwstorage and smarty directory and include PWStorageSetup-File.
 * 
 * @author Joel Holzer <joe_ehcb@hotmail.com>
 * @version 1.0
 */
define('PWSTORAGE_DIR', 'C:/xampp/htdocs/pwstorage/');
define('SMARTY_DIR', 'C:/xampp/htdocs/pwstorage/smarty/library/libs/');
define('HASH_TYPE', 'sha256');
include(PWSTORAGE_DIR . 'setup/PWStorageSetup.php');


$userController = new UserController();
$accountController = new AccountController();
$baseController = new BaseController();

try {
    //Get the current view.
    $view = isset($_GET['view']) ? $_GET['view'] : 'home';

    //Login-Button was clicked -> login user
    if (isset($_POST['login'])) {
        $user = new User($_POST['username'], $_POST['password']);
        $userController->loginUser($user, $view);
    }
    //Register-Button was clicked -> register user
    elseif (isset($_POST['register'])) {
        $user = new User($_POST['username'], $_POST['password'], $_POST['passwordagain']);
        $userController->registerUser($user);
    }
    //Save-Button in profile-view was clicked. -> change user password
    elseif (isset($_POST['saveProfile'])) {
        $userController->changeUserPassword($_POST['password'], $_POST['passwordagain']);
    }
    //Add-Account-Button was clicked. -> add account
    elseif (isset($_POST['addAccount'])) {
        $account = new Account($_POST['title'], $_POST['website'], $_POST['username'], $_POST['password']);
        $accountController->addAccount($account);
    }
    //Edit-Account-Button was clicked. -> update account
    elseif (isset($_POST['updateAccount'])) {
        $account = new Account($_POST['title'], $_POST['website'], $_POST['username'], $_POST['password'], $_POST['id']);
        $accountController->updateAccount($account);
    }
    //Password-Generate Button was clicked. -> generate password
    elseif (isset($_POST['generatePassword'])) {
        $hasCharacters = isset($_POST['hasCharacters']) ? true : false;
        $hasDigits = isset($_POST['hasDigits']) ? true : false;
        $hasSpecialCharacters = isset($_POST['hasSpecialCharacters']) ? true : false;
        $password = new Password($_POST['length'], $hasCharacters, $hasDigits, $hasSpecialCharacters);
        $baseController->generatePassword($password);
    }
    //Logout-Button was clicked. -> logout user
    elseif (isset($_POST['logout'])) {
        $userController->logoutUser();
    }
    // Else: View will display
    else {
        switch ($view) {
            case 'home':
                $baseController->displayHome();
                break;
            case 'register':
                $userController->displayRegister();
                break;
            case 'registerConfirmation':
                $userController->displayRegisterConfirmation();
                break;
            case 'password-generator':
                $baseController->displayPWGenerator();
                break;
            case 'accounts':
                $accountController->displayAccounts();
                break;
            case 'addAccount':
                $accountController->displayAddAccount();
                break;
            case 'showAccount':
                $item = isset($_GET['item']) ? $_GET['item'] : '';
                $accountController->displayShowAccount($item);
                break;
            case 'deleteAccount':
                $item = isset($_GET['item']) ? $_GET['item'] : '';
                $accountController->deleteAccount($item);
                break;
            case 'editAccount':
                $item = isset($_GET['item']) ? $_GET['item'] : '';
                $accountController->displayEditAccount($item);
                break;
            case 'profile':
                $userController->displayProfile();
                break;
            default:
                $baseController->displayHome();
                break;
        }
    }
} 
//PDOException occured -> Database Error will be displayed
catch (PDOException $pdoE) {
    $baseController->displayPdoException();
}
//NotAuthorizedException occured. User is no authorized to see a ressource or do an action.
catch (NotAuthorizedException $naE) {
    $baseController->displayNotAuthorizedException();
}
// Other exception occured -> Error will be displayed
catch (Exception $e) {
    $baseController->displayException();
}
?>