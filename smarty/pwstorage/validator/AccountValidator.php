<?php

/**
 * Include a method for the validation of an account-object.
 * 
 * @author Joel Holzer <joe_ehcb@hotmail.com>
 * @version 1.0
 */
class AccountValidator {

    /**
     * Validates an account-object.
     * It validates title, website, username and password with following criterias:
     * -empty
     * -max. string length
     * -website valid url
     * 
     * @param Account $account Account to validate.
     * @return array Array with fault-objects (for every fault one object in the array). null if no validation error.
     */
    public function validate(Account $account) {
        $faults = null;
        $title = $account->getTitle();
        $website = $account->getWebsite();
        $username = $account->getUsername();
        $password = $account->getPassword();
        
        if (!$title || $title == "") {
            $fault = new Fault('Must not be empty.', 'Title');
            $faults[] = $fault->toArray();
        } elseif (strlen($title) > 50) {
            $fault = new Fault('May be a maximum of 50 characters.', 'Title');
            $faults[] = $fault->toArray();
        }
        
        $patternUrl = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";

        if (!$website || $website == "") {
            $fault = new Fault('Must not be empty.', 'Website');
            $faults[] = $fault->toArray();
        } elseif (strlen($website) > 100) {
            $fault = new Fault('May be a maximum of 100 characters.', 'Website');
            $faults[] = $fault->toArray();
        } elseif (!preg_match($patternUrl, $website)) {
            $fault = new Fault('Must be a valid URL', 'Website');
            $faults[] = $fault->toArray();
        }
        
        if (!$username || $username == "") {
            $fault = new Fault('Must not be empty.', 'Username');
            $faults[] = $fault->toArray();
        } elseif (strlen($username) > 50) {
            $fault = new Fault('May be a maximum of 50 characters.', 'Username');
            $faults[] = $fault->toArray();
        }
        
        if (!$password || $password == "") {
            $fault = new Fault('Must not be empty.', 'Password');
            $faults[] = $fault->toArray();
        } elseif (strlen($password) > 40) {
            $fault = new Fault('May be a maximum of 40 characters.', 'Password');
            $faults[] = $fault->toArray();
        }
        return $faults;
    }
}
?>
