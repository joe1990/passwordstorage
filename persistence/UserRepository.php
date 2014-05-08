<?php

/**
 * Include methods which operate with the user-table of the database (get data, add data, update data).
 * 
 * @author Joel Holzer <joe_ehcb@hotmail.com>
 * @version 1.0
 */
class UserRepository {

    /**
     * Get the ID of a specific user from the database and return them.
     * 
     * @param User $user User whose ID is determined.
     * @return int ID of the user.
     */
    public function getUserId(User $user) {
        $sql = 'SELECT id
                    FROM users
                    WHERE username = :username AND password = :password';
        $statement = DB::getInstance()->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $statement->execute(array(':username' => $user->getUsername(), ':password' => $user->getPassword()));
        $result = $statement->fetch(PDO::FETCH_OBJ);
        $userId = 0;
        if ($result != null) {
            $userId = $result->id;
        }
        return $userId;
    }

    /**
     * Check if an username exists in the database and return true if exist or false if not exist.
     * 
     * @param string $username Username to check.
     * @return boolean true if username exist, false if not exist.
     */
    public function isUsernameExists($username) {
        $sql = 'SELECT id
                    FROM users
                    WHERE username = :username';
        $statement = DB::getInstance()->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $statement->execute(array(':username' => $username));
        $result = $statement->fetch(PDO::FETCH_OBJ);
        if ($result != null) {
            return true;
        }
        return false;
    }

    /**
     * Add (Insert) a new user to the database.
     * 
     * @param User $user User to add.
     */
    public function addUser(User $user) {
        $sql = 'INSERT INTO 
                    users (username,password) VALUES (:username,:password)';
        $statement = DB::getInstance()->prepare($sql);
        $statement->execute(array(':username' => $user->getUsername(), ':password' => $user->getPassword()));
    }

    /**
     * Update a specific user in the database.
     * 
     * @param User $user User to update. User-object has updated attributes.
     */
    public function updateUserPassword(User $user) {
        $sql = 'UPDATE 
                    users SET password=:password
                    WHERE id=:id';
        $statement = DB::getInstance()->prepare($sql);
        $statement->execute(array(':password' => $user->getPassword(), ':id' => $user->getId()));
    }
}

?>
