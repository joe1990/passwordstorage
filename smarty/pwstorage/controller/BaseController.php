<?php

/**
 * BaseController. Include methods to display views which not belongs to a domain and base functionality which is use in different sub classes.
 * 
 * @author Joel Holzer <joe_ehcb@hotmail.com>
 * @version 1.0
 */
class BaseController {
    
    protected $template = null;
    
    /**
     * Constructor. Initialize the setup of the application and display the login-form and the menu.
     */
    public function __construct() {
        $this->template = new PWStorageSetup();
        $this->displayLoginAndMenu();
    }
    
    /**
     * Displays the home-screen of the application.
     */
    public function displayHome() {
        $this->template->assign('activeMenu', 'home');
        $this->template->display('home.tpl');
    }
    
    /**
     * Displays the login-form and the menu of the application. 
     * There are other menu entries if an user is logged in or not.
     */
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
    
    /**
     * Displays the password generator site.
     */
    public function displayPWGenerator() {
        $this->template->assign('activeMenu', 'pwgenerator');
        $this->template->display('pwgenerator.tpl');
    }
    
    /**
     * Displays a site which talks the application user that a database error occured.
     */
    public function displayPdoException() {
        $this->template->assign('activeMenu', null);
        $this->template->assign('errorType', 'Database error');
        $this->template->display('exception.tpl');
    }
    
    /**
     * Displays a site which talks the application user that an Error (not database error) occured.
     */
    public function displayException() {
        $this->template->assign('activeMenu', null);
        $this->template->assign('errorType', 'Error');
        $this->template->display('exception.tpl');
    }

    /**
     * Redirect to a specific view.
     * 
     * @param string $view View to redirect.
     */
    protected function redirect($view) {
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = "index.php?view=$view";
        header("Location: http://$host$uri/$extra");
    }
    
    /**
     * Redirect to a specific view with a message.
     * The message is write to the session for display in the redirected view.
     * 
     * @param string $view View to redirect.
     * @param string $message Message to write to the session.
     */
    protected function redirectWithMessage($view, $message) {
         if(!isset($_SESSION)) {
            session_start();    
        }  
        $_SESSION['successMessage'] = $message;
        $this->redirect($view);
    }

    
    /**
     * Sets the logged in user. The user-object is written to the session.
     * 
     * @param User $user User to write to the session. 
     */
    protected function setLoggedInUser(User $user) {
        if(!isset($_SESSION)) {
            session_start();    
        }  
        $_SESSION['user'] = $user;
    }
    
    /**
     * Returns the logged in user from the session.
     * 
     * @return Logged in User from the session.
     */
    protected function getLoggedInUser() {
        if(!isset($_SESSION)) {
            session_start();    
        }  
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        return null;
    }
}

?>
