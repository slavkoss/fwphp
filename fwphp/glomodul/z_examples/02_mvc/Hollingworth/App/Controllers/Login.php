<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\User;
use \App\Auth;
use \App\Flash;

/**
 * Login controller
 *
 * PHP version 7.0
 */
class Login extends \Core\Controller
{

    /**
     * Show the login page
     *
     * @return void
     */
    public function newAction()
    {
        View::render('Login/new.html');
        //View::renderTemplate('Login/new.html');
    }

    /**
     * Log in a user
     *
     * @return void
     */
    public function createAction()
    {
        $user = User::authenticate($_POST['email'], $_POST['password']);
        
        $remember_me = isset($_POST['remember_me']);

        if ($user) {

            Auth::login($user, $remember_me);

            Flash::addMessage('Login successful');

            $this->redirect(Auth::getReturnToPage());

        } else {

            Flash::addMessage('Login unsuccessful, please try again', Flash::WARNING);

            View::render('Login/new.html', [
                'email' => $_POST['email'],
                'remember_me' => $remember_me
            ]);
        }
    }

    /**
     * Log out a user
     *
     * @return void
     */
    public function destroyAction()
    {
                       ?><script>alert("<?='FN='. __FUNCTION__  . ', NO Param. ' .'\n'. str_replace('\\','/', __FILE__) . ', ln='. __LINE__   ?>");</script><?php
        Auth::logout();

        $this->redirect('/login/show-logout-message');
    }

    /**
     * Show a "logged out" flash message and redirect to the homepage. Necessary to use the flash messages
     * as they use the session and at the end of the logout method (destroyAction) the session is destroyed
     * so a new action needs to be called in order to use the session.
     *
     * @return void
     */
    public function showLogoutMessageAction()
    {
        Flash::addMessage('Logout successful');

        $this->redirect('/');
    }
}
