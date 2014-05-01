<?php
require(PWSTORAGE_DIR . 'persistence/PersistenceManager.php');
require(PWSTORAGE_DIR . 'model/Fault.php');
require(PWSTORAGE_DIR . 'validator/RegisterValidator.php');
require(PWSTORAGE_DIR . 'validator/ProfileValidator.php');
require(PWSTORAGE_DIR . 'validator/AddAccountValidator.php');
require(PWSTORAGE_DIR . 'model/Account.php');
require(PWSTORAGE_DIR . 'helper/PasswordEncrypter.php');

class PWStorageController {
    
    private $template = null;
    private $persistenceManager = null;
    
    public function __construct() {
        $this->template = new PWStorageSetup();
        $this->persistenceManager = new PersistenceManager();
        $this->displayLoginAndMenu();
    }
    
    private function displayLoginAndMenu() {
        $loggedInUser = $this->getLoggedInUser();
        if ($loggedInUser != null) {
            $this->template->assign('loggedInUser', $loggedInUser);
            $this->template->assign('menuEntries', array('accounts','pwgenerator'));
        } else {
            $this->template->clearAssign('loggedInUser');
            $this->template->assign('menuEntries', array('home','register'));
        }
    }
    
    public function displayHome() {
        $this->template->assign('activeMenu', 'home');
        $this->template->display('home.tpl');
    }
    
    public function displayRegister(User $user = null) {
        $this->template->assign('activeMenu', 'register');
        $this->template->assign('user', $user);
        $this->template->display('register.tpl');
    }
    
    public function loginUser(User $user, $displayAction) {
        $plainPassword = $user->getPassword();
        $user->setPassword(hash('sha256', $user->getPassword()));
        $userId = $this->persistenceManager->getUserId($user);
        if ($userId > 0) {
            $user->setId($userId);
            $user->setPassword($plainPassword);
            $this->setLoggedInUser($user);
            $this->redirect('accounts');
        } else {
            $fault = new Fault('Logindata not correct.');
            $faults[] = $fault->toArray();
            $this->template->assign('loginFaults', $faults);
            $this->displayActive($displayAction);
        }
    }
    
    public function logoutUser() {
        if(!isset($_SESSION)) {
            session_start();    
        }  
        session_destroy();
        $_SESSION = array();
        $this->redirect('home');
    }
    
    public function registerUser(User $user, $displayAction) {
        $registerValidator = new RegisterValidator();
        $faults = $registerValidator->validate($user);
        if (!$faults) {
            $user->setPassword(hash('sha256', $user->getPassword()));
            $this->persistenceManager->addUser($user);
            $this->redirect('registerConfirmation');
        } else {
            $this->template->assign('faults', $faults);
            $this->displayRegister($user);
        }
    }
    
    public function displayProfile() {
        $this->template->assign('activeMenu', null);
        $this->template->assign('user', $this->getLoggedInUser());
        $this->template->display('profile.tpl');
    }
    
    public function changeUserPassword($password, $passwordAgain, $displayAction) {
        $profileValidator = new ProfileValidator();
        $faults = $profileValidator->validate($password, $passwordAgain);
        if (!$faults) {
            //TODO: Change all Passwords when changing user password
            $loggedInUser = $this->getLoggedInUser();
            $loggedInUser->setPassword(hash('sha256', $password));
            $this->persistenceManager->updateUserPassword($loggedInUser);
            $this->template->assign('successMessage', 'Save successfully');
        } else {
            $this->template->assign('faults', $faults);
        }
        $this->displayProfile();
    }
    
    public function displayRegisterConfirmation() {
        $this->template->assign('activeMenu', 'register');
        $this->template->display('registerConfirmation.tpl');
    }
    
    public function displayPWGenerator() {
        $this->template->assign('activeMenu', 'pwgenerator');
        $this->template->display('pwgenerator.tpl');
    }
    
    public function displayAccounts() {
        $accounts = $this->persistenceManager->getAccounts($this->getLoggedInUser());
        $this->template->assign('accounts', $accounts);
        $this->template->assign('activeMenu', 'accounts');
        $this->template->display('accounts.tpl');
    }
    
    public function displayAddAccount(Account $account = null) {
        $this->template->assign('activeMenu', 'accounts');
        $this->template->assign('account', $account);
        $this->template->display('addAccount.tpl');
    }
    
    public function addAccount(Account $account) {
        $addAccountValidator = new AddAccountValidator();
        $faults = $addAccountValidator->validate($account);
        if (!$faults) {
            $account->setUserId($this->getLoggedInUser()->getId());
            //Encrypt Password
            $passwordEncrypter = new PasswordEncrypter();
            $encryptedPassword = $passwordEncrypter->encrypt($account->getPassword(), $this->getLoggedInUser()->getPassword());
            $account->setPassword($encryptedPassword);
            
            $this->persistenceManager->addAccount($account);
            $this->redirect('accounts');
        } else {
            $this->template->assign('faults', $faults);
            $this->displayAddAccount($account);
        }
    }

    public function displayShowAccount($accountId) {
        $account = $this->persistenceManager->getAccount($accountId);
        //Decrypt Password
        $passwordEncrypter = new PasswordEncrypter();
        $account->setPassword($passwordEncrypter->decrypt($account->getPassword(), $this->getLoggedInUser()->getPassword()));
        
        $this->template->assign('account', $account);
        $this->template->assign('activeMenu', 'accounts');
        $this->template->display('showAccount.tpl');
    }
    
    public function displayEditAccount($accountId) {
        $account = $this->persistenceManager->getAccount($accountId);
        $this->template->assign('account', $account);
        $this->template->assign('activeMenu', 'accounts');
        $this->template->display('editAccount.tpl');
    }
    
    private function displayActive($displayAction) {
        switch ($displayAction) {
            case 'home': 
                $this->displayHome();
                break;
            case 'register':
                $this->displayRegister();
                break;
            default:
                $this->displayHome();
                break;
        }
    }
    
    private function setLoggedInUser($user) {
        if(!isset($_SESSION)) {
            session_start();    
        }  
        $_SESSION['user'] = $user;
    }
    
    /**
     * 
     * @return User
     */
    private function getLoggedInUser() {
        if(!isset($_SESSION)) {
            session_start();    
        }  
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        return null;
    }
    
    private function redirect($action) {
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = "index.php?action=$action";
        header("Location: http://$host$uri/$extra");
    }
}
?>
