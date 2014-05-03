<?php

/**
 * Controller for all user-views (e.g. display login or register form) and all user-actions (e.g. login or register user).
 * 
 * @author Joel Holzer <joe_ehcb@hotmail.com>
 * @version 1.0
 */
class UserController extends BaseController {

    private $userRepository = null;

    /**
     * Constructor. Initialize the user-repository.
     */
    public function __construct() {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    /**
     * Login an user in the system if logindatas are correct, or display the register-form with validation errors.
     * Successfull login write the user with his plaintext-password to the session.
     * 
     * @param User $user User to login in the system.
     * @param string $view Actual active view. 
     */
    public function loginUser(User $user, $view) {
        $plainPassword = $user->getPassword();
        $user->setPassword(hash(HASH_TYPE, $user->getPassword()));
        $userId = $this->userRepository->getUserId($user);
        if ($userId > 0) {
            $user->setId($userId);
            $user->setPassword($plainPassword);
            $this->setLoggedInUser($user);
            $this->redirect('accounts');
        } else {
            $fault = new Fault('Logindata not correct.');
            $faults[] = $fault->toArray();
            $this->template->assign('loginFaults', $faults);

            switch ($view) {
                case 'home':
                    $this->displayHome();
                    break;
                case 'register':
                    $this->displayRegister();
                    break;
                default:
                    $this->displayHome();
                    break;
            }
        }
    }

    /**
     * Logout the loggedin-User. Destroy the session and redirect to home.
     */
    public function logoutUser() {
        if (!isset($_SESSION)) {
            session_start();
        }
        session_destroy();
        $_SESSION = array();
        $this->redirect('home');
    }

    /**
     * Displays the register-form.
     * 
     * @param User $user User to prefill out the register-form (e.g. if validation errors occured). Could be null (if register-form should not be prefill out).
     */
    public function displayRegister(User $user = null) {
        $this->template->assign('activeMenu', 'register');
        $this->template->assign('user', $user);
        $this->template->display('register.tpl');
    }

    /**
     * Register (adds) a new user to the system if all user-datas are correct (no validation errors).
     * If there are validation errors, the user will not add and the register-form is displayed with errors.
     * 
     * @param User $user User to register (add).
     */
    public function registerUser(User $user) {
        $userValidator = new UserValidator();
        $faults = $userValidator->validateRegister($user);
        if (!$faults) {
            $user->setPassword(hash(HASH_TYPE, $user->getPassword()));
            $this->userRepository->addUser($user);
            $this->redirect('registerConfirmation');
        } else {
            $this->template->assign('faults', $faults);
            $this->displayRegister($user);
        }
    }
    
    /**
     * Displays a view which confirm the registration of a user.
     */
    public function displayRegisterConfirmation() {
        $this->template->assign('activeMenu', 'register');
        $this->template->display('registerConfirmation.tpl');
    }

    /**
     * Displays the form to change the user password of the logged in user.
     */
    public function displayProfile() {
        $this->template->assign('activeMenu', null);
        $this->template->assign('user', $this->getLoggedInUser());
        $this->template->display('profile.tpl');
    }

    /**
     * Change the password of the logged in user if there are no validation error in the new password and password-again.
     * After changing the password, all passwords of the accounts from the logged in user will update with the new user password.
     * 
     * If there are validation errors, user and account passwords doesn't change and the form to change the user password is displayed with errors.
     * 
     * @param string $password New password.
     * @param string $passwordAgain New password-again.
     */
    public function changeUserPassword($password, $passwordAgain) {
        $userValidator = new UserValidator();
        $faults = $userValidator->validateProfile($password, $passwordAgain);
        if (!$faults) {
            $plainNewPassword = $password;
            $loggedInUser = $this->getLoggedInUser();
            $plainOldPassword = $loggedInUser->getPassword();
            $loggedInUser->setPassword(hash(HASH_TYPE, $password));
            $this->userRepository->updateUserPassword($loggedInUser);
            $loggedInUser->setPassword($plainNewPassword);
            $this->setLoggedInUser($loggedInUser);

            //Update all account passwords
            $accountController = new AccountController();
            $accountController->updateAllAccountPasswords($loggedInUser, $plainOldPassword, $plainNewPassword);

            $this->template->assign('successMessage', 'Save successfully');
        } else {
            $this->template->assign('faults', $faults);
        }
        $this->displayProfile();
    }
}

?>
