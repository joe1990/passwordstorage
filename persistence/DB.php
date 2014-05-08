<?php

/**
 * Singleton. Create a PDO-Object for the connection to the mysql database.
 * 
 * @author Joel Holzer <joe_ehcb@hotmail.com>
 * @version 1.0
 */
class DB {
    private static $instance = NULL;
    
    /**
     * Return the instance (PDO-Object) if exists or create a new PDO-Object for the mysql database.
     * @return PDO-Object for the database connection. 
     */
    public static function getInstance() {
        if (!self::$instance) {
            $dsn = "mysql:host=localhost;dbname=passwordstorage";
            self::$instance = new PDO($dsn,'root','');
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}
?>
