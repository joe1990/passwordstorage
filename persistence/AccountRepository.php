<?php

/**
 * Include methods which operate with the account-table of the database (get data, add data, update data, delete data).
 * 
 * @author Joel Holzer <joe_ehcb@hotmail.com>
 * @version 1.0
 */
class AccountRepository {

    /**
     * Get all accounts of a specific user from the database and return them in an array of account-objects.
     * 
     * @param User $user User whose accounts are determined.
     * @return array Array of the determined accounts (account-objects).
     */
    public function getAccounts(User $user) {
        $sql = 'SELECT id,title,website,username,password
                        FROM accounts
                        WHERE userid = :userid';
        $statement = DB::getInstance()->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $statement->execute(array(':userid' => $user->getId()));
        $result = $statement->fetchAll(PDO::FETCH_CLASS, "Account");
        return $result;
    }

    /**
     * Get a specific account from the database and return this as an account-object. 
     * 
     * @param int $accountId ID of the account which is determined.
     * @return account-object of the determined account. NULL if no account is determined.
     */
    public function getAccount($accountId) {
        $sql = 'SELECT id,title,website,username,password,userid
                        FROM accounts
                        WHERE id = :id';

        $statement = DB::getInstance()->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Account');
        $statement->execute(array(':id' => $accountId));
        $result = $statement->fetch(PDO::FETCH_CLASS);
        if (!$result) {
            $result = null;
        }
        return $result;
    }
    
    /**
     * Get the user-id of a specific account from the database
     * 
     * @param int $accountId ID of the account which user-id is determined.
     * @return int User-ID
     */
    public function getAccountUserId($accountId) {
        $sql = 'SELECT userid
                        FROM accounts
                        WHERE id = :id';
        $statement = DB::getInstance()->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $statement->execute(array(':id' => $accountId));
        $result = $statement->fetch(PDO::FETCH_OBJ);
        $userId = 0;
        if ($result != null) {
            $userId = $result->userid;
        }
        return $userId;
    }

    /**
     * Add an account to the database.
     * 
     * @param Account $account Account to add.
     */
    public function addAccount(Account $account) {
        $sql = 'INSERT INTO 
                    accounts (title,website,username,password,userid) VALUES (:title,:website,:username,:password,:userid)';
        $statement = DB::getInstance()->prepare($sql);
        $statement->execute(array(':title' => $account->getTitle(), ':website' => $account->getWebsite(), ':username' => $account->getUsername(), ':password' => $account->getPassword(), ':userid' => $account->getUserId()));
    }

    /**
     * Update the password of an account in the database.
     * 
     * @param Account $account Account to update. Account-object has updated password attribute.
     */
    public function updateAccountPassword(Account $account) {
        $sql = 'UPDATE 
                    accounts SET password=:password
                    WHERE id=:id';
        $statement = DB::getInstance()->prepare($sql);
        $statement->execute(array(':password' => $account->getPassword(), ':id' => $account->getId()));
    }

    /**
     * Update a specific account in the database.
     * 
     * @param Account $account Account to update. Account-object has updated attributes.
     */
    public function updateAccount(Account $account) {
        $sql = 'UPDATE 
                    accounts SET title=:title, website=:website, username=:username, password=:password
                    WHERE id=:id';
        $statement = DB::getInstance()->prepare($sql);
        $statement->execute(array(':title' => $account->getTitle(), ':website' => $account->getWebsite(), ':username' => $account->getUsername(), ':password' => $account->getPassword(), ':id' => $account->getId()));
    }

    /**
     * Delete a specific account from the database.
     * 
     * @param int $id ID of the account to delete.
     */
    public function deleteAccount($id) {
        $sql = "DELETE FROM accounts WHERE id =  :id";
        $statement = DB::getInstance()->prepare($sql);
        $statement->execute(array(':id' => $id));
    }
}

?>
