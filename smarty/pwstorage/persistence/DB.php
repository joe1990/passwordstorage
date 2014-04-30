<?php

class DB {
    private static $instance = NULL;
    
    public static function getInstance() {
        if (!self::$instance) {
            $dsn = "mysql:host=localhost;dbname=passwordstorage";
            self::$instance = new PDO($dsn,'root','');
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
    
    private function __clone() {}
}
?>
