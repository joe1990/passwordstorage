<?php

require(PWSTORAGE_DIR . 'controller/PWStorageController.php');
require(SMARTY_DIR . 'Smarty.class.php');


// smarty configuration
class PWStorageSetup extends Smarty {
    public function __construct() {
      parent::__construct();
      $this->setTemplateDir(PWSTORAGE_DIR . 'templates');
      $this->setCompileDir(PWSTORAGE_DIR . 'templates_c');
      $this->setConfigDir(PWSTORAGE_DIR . 'configs');
      $this->setCacheDir(PWSTORAGE_DIR . 'cache');
    }
}
?>
