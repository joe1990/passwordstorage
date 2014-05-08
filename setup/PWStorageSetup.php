<?php

require(PWSTORAGE_DIR . 'controller/BaseController.php');
require(PWSTORAGE_DIR . 'controller/UserController.php');
require(PWSTORAGE_DIR . 'controller/AccountController.php');
require(PWSTORAGE_DIR . 'persistence/DB.php');
require(PWSTORAGE_DIR . 'persistence/UserRepository.php');
require(PWSTORAGE_DIR . 'persistence/AccountRepository.php');
require(PWSTORAGE_DIR . 'model/Fault.php');
require(PWSTORAGE_DIR . 'model/Account.php');
require(PWSTORAGE_DIR . 'model/User.php');
require(PWSTORAGE_DIR . 'model/Password.php');
require(PWSTORAGE_DIR . 'validator/UserValidator.php');
require(PWSTORAGE_DIR . 'validator/AccountValidator.php');
require(PWSTORAGE_DIR . 'validator/PasswordValidator.php');
require(PWSTORAGE_DIR . 'helper/PasswordEncrypter.php');
require(PWSTORAGE_DIR . 'exception/NotAuthorizedException.php');
require(SMARTY_DIR . 'Smarty.class.php');

/**
 * Setup-Class for the Password Storage Application. Include (require) all other application files (classes) and configure the smarty directories.
 * 
 * @author Joel Holzer <joe_ehcb@hotmail.com>
 * @version 1.0
 */
class PWStorageSetup extends Smarty {
    
    /**
     * Constructor. Sets the smarty directories (template, compile, config and cache).
     */
    public function __construct() {
      parent::__construct();
      $this->setTemplateDir(PWSTORAGE_DIR . 'templates');
      $this->setCompileDir(PWSTORAGE_DIR . 'templates_c');
      $this->setConfigDir(PWSTORAGE_DIR . 'configs');
      $this->setCacheDir(PWSTORAGE_DIR . 'cache');
    }
}
?>
