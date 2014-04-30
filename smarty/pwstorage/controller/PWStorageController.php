<?php
require(PWSTORAGE_DIR . 'persistence/PersistenceManager.php');
require(PWSTORAGE_DIR . 'model/Fault.php');
require(PWSTORAGE_DIR . 'validator/RegisterValidator.php');

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
    
    public function displayRegister() {
        $this->template->assign('activeMenu', 'register');
        $this->template->display('register.tpl');
    }
    
    public function loginUser(User $user, $displayAction) {
        $user->setPassword(hash('sha256', $user->getPassword()));
        $userId = $this->persistenceManager->getUserId($user);
        if ($userId > 0) {
            $user->setId($userId);
            $this->setLoggedInUser($user);
            $this->redirect('home');
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
            $this->displayActive($displayAction);
        }
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
        $this->template->assign('activeMenu', 'accounts');
        $this->template->display('accounts.tpl');
    }
    
    public function displayProfile() {
        $this->template->assign('activeMenu', null);
        $this->template->assign('user', $this->getLoggedInUser());
        $this->template->display('profile.tpl');
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
