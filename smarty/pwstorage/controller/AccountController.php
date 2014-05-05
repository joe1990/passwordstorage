<?php

/**
 * Controller for all account-views (e.g. display accounts) and all account-actions (e.g. add account).
 * 
 * @author Joel Holzer <joe_ehcb@hotmail.com>
 * @version 1.0
 */
class AccountController extends BaseController{
    
    private $accountRepository = null;
    private $passwordEncrypter = null;
    
    /**
     * Constructor. Initialize the user-repository and the password-encrypter.
     */
    public function __construct() {
        parent::__construct();
        $this->accountRepository = new AccountRepository();
        $this->passwordEncrypter = new PasswordEncrypter();
    }
    
    /**
     * Displays a list of all accounts from the logged in user.
     */
    public function displayAccounts() {
        $accounts = $this->accountRepository->getAccounts($this->getLoggedInUser());
        $this->assignSessionSuccessMessage();
        $this->template->assign('accounts', $accounts);
        $this->template->assign('activeMenu', 'accounts');
        $this->template->display('accounts.tpl');
    }
    
    /**
     * Displays the form to add a new account.
     * 
     * @param Account $account Account to prefill out the add-form (e.g if validation errors occured). Could be null (if add-form should not be prefill out).
     */
    public function displayAddAccount(Account $account = null) {
        $this->template->assign('activeMenu', 'accounts');
        $this->template->assign('account', $account);
        $this->template->display('addAccount.tpl');
    }
    
    
    /**
     * Adds a new account to the system if all account-datas are correct (no validation errors). The account password will encrypt with the password of the logged in user.
     * If there are validation errors, the account will not add and the add-form is displayed with errors.
     * 
     * @param Account $account Account to add.
     */
    public function addAccount(Account $account) {
        $addAccountValidator = new AccountValidator();
        $faults = $addAccountValidator->validate($account);
        if (!$faults) {
            $account->setUserId($this->getLoggedInUser()->getId());
            //Encrypt Password
            $encryptedPassword = $this->passwordEncrypter->encrypt($account->getPassword(), $this->getLoggedInUser()->getPassword());
            $account->setPassword($encryptedPassword);
            
            $this->accountRepository->addAccount($account);
            $this->redirectWithMessage('accounts', 'Account added successfully');
        } else {
            $this->template->assign('faults', $faults);
            $this->displayAddAccount($account);
        }
    }
    
    /**
     * Displays the details of a specific account. The password will encrypt before display.
     * 
     * @param int $accountId ID of the account which details will display.
     */
    public function displayShowAccount($accountId) {
        
        $account = $this->accountRepository->getAccount($accountId);
        
        if ($account != NULL && $account->getUserId() == $this->getLoggedInUser()->getId()) {
            //Decrypt Password
            $account->setPassword($this->passwordEncrypter->decrypt($account->getPassword(), $this->getLoggedInUser()->getPassword()));

            $this->template->assign('account', $account);
            $this->template->assign('activeMenu', 'accounts');
            $this->template->display('showAccount.tpl');
        } else {
            throw new NotAuthorizedException();
        }  
    }
    
    /**
     * Displays the form to edit an account. The password will encrypt before display.
     * 
     * @param int $accountId ID of the account which details will edit.
     */
    public function displayEditAccount($accountId) {
        $account = $this->accountRepository->getAccount($accountId);
        
        if ($account != NULL && $account->getUserId() == $this->getLoggedInUser()->getId()) {
            //Decrypt Password
            $account->setPassword($this->passwordEncrypter->decrypt($account->getPassword(), $this->getLoggedInUser()->getPassword()));
        
            $this->assignDisplayEditAccount($account);
        } else {
            throw new NotAuthorizedException();
        }  
        
    }
    
    /**
     * Update an account if there are no validation errors in the edited account. The account password will encrypt with the password of the logged in user.
     * If there are validation errors, account data doesn't change and the form to edit the account is displayed with errors.
     * 
     * @param Account $account Account to update. Account-object has updated attributes.
     */
    public function updateAccount(Account $account) {
        $editAccountValidator = new AccountValidator();
        $faults = $editAccountValidator->validate($account);
        if (!$faults) {
            if ($this->accountRepository->getAccountUserId($account->getId()) == $this->getLoggedInUser()->getId()) {
                $account->setUserId($this->getLoggedInUser()->getId());
                //Encrypt Password
                $encryptedPassword = $this->passwordEncrypter->encrypt($account->getPassword(), $this->getLoggedInUser()->getPassword());
                $account->setPassword($encryptedPassword);
                $this->accountRepository->updateAccount($account);
                $this->redirectWithMessage('accounts', 'Account updated successfully');
            } else {
                throw new NotAuthorizedException();
            }
        } else {
            $this->template->assign('faults', $faults);
            $this->assignDisplayEditAccount($account);
        }
    }
    
    /**
     * Assign an account to the template and display the form to edit an account.
     * 
     * @param Account $account Account to edit (display in the edit-form).
     */
    private function assignDisplayEditAccount(Account $account) {
        $this->template->assign('account', $account);
        $this->template->assign('activeMenu', 'accounts');
        $this->template->display('editAccount.tpl');
    }

    /**
     * Delete a specific account and redirect with a successfull-message to the list of all accounts.
     * 
     * @param int $accountId ID of the account to delete.
     */
    public function deleteAccount($accountId) {
        if ($this->accountRepository->getAccountUserId($accountId) == $this->getLoggedInUser()->getId()) {
            $this->accountRepository->deleteAccount($accountId);
            $this->redirectWithMessage('accounts', 'Account deleted successfully');
        } else {
            throw new NotAuthorizedException();
        }
    }
    
    /**
     * Updates all account passwords of a specific user. This is required if a user change his password.
     * 
     * All passwords will decrypt with the old user password and new encrypt with the new user password.
     * 
     * @param User $user User whose accouns will update.
     * @param string $oldUserPassword Old user password. Need to decrypt the account passwords.
     * @param string $newUserPassword New user password. Need to encrypt the account passwords.
     */
    public function updateAllAccountPasswords(User $user, $oldUserPassword, $newUserPassword) {
        $accounts = $this->accountRepository->getAccounts($user);
        foreach($accounts as $account) {
            $decryptedPassword = $this->passwordEncrypter->decrypt($account->getPassword(), $oldUserPassword);
            $encryptedPassword = $this->passwordEncrypter->encrypt($decryptedPassword, $newUserPassword);
            $account->setPassword($encryptedPassword);
            $this->accountRepository->updateAccountPassword($account);
        }
    }
    
    /**
     * Assign the success message from the session to the template and unset the session success message.
     */
    private function assignSessionSuccessMessage() {
        if (isset($_SESSION['successMessage'])) {
            $this->template->assign('successMessage', $_SESSION['successMessage']);
            unset($_SESSION['successMessage']);
        }
    }
    
}
?>
