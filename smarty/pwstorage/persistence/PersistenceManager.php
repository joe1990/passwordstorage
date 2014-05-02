<?php

require(PWSTORAGE_DIR . 'persistence/DB.php');
require(PWSTORAGE_DIR . 'model/User.php');

class PersistenceManager {
    
    public function getUserId(User $user) {
        try {
            
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
        } catch (PDOException $e) {
            //TODO
        }
    }
    
    public function isUsernameExists($username) {
        try {
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
        } catch (PDOException $e) {
            //TODO
        }
    }
    
    public function addUser(User $user) {
        try {
            $sql = 'INSERT INTO 
                    users (username,password) VALUES (:username,:password)';
            $statement = DB::getInstance()->prepare($sql);
            $statement->execute(array(':username' => $user->getUsername(), ':password' => $user->getPassword()));
        } catch (PDOException $e) {
            //TODO
        }
    }
    
    public function updateUserPassword(User $user) {
        try {
            $sql = 'UPDATE 
                    users SET password=:password
                    WHERE id=:id';
            $statement = DB::getInstance()->prepare($sql);
            $statement->execute(array(':password' => $user->getPassword(), ':id' => $user->getId()));
        } catch (PDOException $e) {
            //TODO
        }
    }
    
    public function getAccounts(User $user) {
        try {
            $sql = 'SELECT id,title,website,username,password
                        FROM accounts
                        WHERE userid = :userid';
            $statement = DB::getInstance()->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $statement->execute(array(':userid' => $user->getId()));
            $result = $statement->fetchAll(PDO::FETCH_CLASS, "Account");
            return $result;
        } catch (PDOException $e) {
            //TODO
        }
    }
    
    public function getAccount($accountId) {
        try {
            $sql = 'SELECT id,title,website,username,password,userid
                        FROM accounts
                        WHERE id = :id';
            
            $statement = DB::getInstance()->prepare($sql);
            $statement->setFetchMode( PDO::FETCH_CLASS, 'Account');
            $statement->execute(array(':id' => $accountId));
            $result = $statement->fetch(PDO::FETCH_CLASS);
            if (!$result) {
                $result = null;
            }
            return $result;
        } catch (PDOException $e) {
            //TODO
        }
    }
    
    public function addAccount(Account $account) {
        try {
            $sql = 'INSERT INTO 
                    accounts (title,website,username,password,userid) VALUES (:title,:website,:username,:password,:userid)';
            $statement = DB::getInstance()->prepare($sql);
            $statement->execute(array(':title' => $account->getTitle(), ':website' => $account->getWebsite(), ':username' => $account->getUsername(), ':password' => $account->getPassword(), ':userid' => $account->getUserId()));
        } catch (PDOException $e) {
            //TODO
        }
    }
    
    public function updateAccountPassword(Account $account) {
        try {
            $sql = 'UPDATE 
                    accounts SET password=:password
                    WHERE id=:id';
            $statement = DB::getInstance()->prepare($sql);
            $statement->execute(array(':password' => $account->getPassword(), ':id' => $account->getId()));
        } catch (PDOException $e) {
            //TODO
        }
    }
    
    public function updateAccount(Account $account) {
        try {
            $sql = 'UPDATE 
                    accounts SET title=:title, website=:website, username=:username, password=:password
                    WHERE id=:id';
            $statement = DB::getInstance()->prepare($sql);
            $statement->execute(array(':title' => $account->getTitle(),':website' => $account->getWebsite(),':username' => $account->getUsername(),':password' => $account->getPassword(),':id' => $account->getId()));
        } catch (PDOException $e) {
            //TODO
        }
    }
    
    public function deleteAccount($id) {
        try {
            $sql = "DELETE FROM accounts WHERE id =  :id";
            $statement = DB::getInstance()->prepare($sql);
            $statement->execute(array(':id' => $id));
        } catch (PDOException $e) {
            //TODO
        }
    }
}
?>
