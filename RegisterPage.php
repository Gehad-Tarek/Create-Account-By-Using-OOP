<?php
require_once 'Session.php';
require_once 'Cookie.php';
require_once 'FormHandler.php';
require_once 'Helpers.php';

class RegisterPage
{
    private $session, $cookie, $formhandler, $helpers;

    public function __construct()
    {
        $this->session = sessionObject();
        $this->cookie = cookieObject();
        $this->formhandler = formhandlerObject();
        $this->helpers = helpersObject();
    } 

    // Display create account page
    public function render()
    {  
        $this->helpers->redirectTo('register.php');
    }

   // Create a new user
    public function submit()
    {
        $this->formhandler->clearErrors();

        $email = $this->formhandler->post('email');
        $username = $this->formhandler->post('name');
        $password = $this->formhandler->post('password');
        $confirmPassword = $this->formhandler->post('confirm_password');

        if (! $username) {
            $this->formhandler->setError('name', 'User Name Is Required');
        }

        if ($email == '') {
            $this->formhandler->setError('email', 'Email Address is required');
        }

        if (! $password) {
            $this->formhandler->setError('password', 'Password is required');   
        }  elseif (strlen($password) < 8) {
            $this->formhandler->setError('password', 'Minimum Password length is 8');
        }

        if (! $confirmPassword) {
            $this->formhandler->setError('confirm_password', 'Confirm Password is required');
        } elseif ($confirmPassword != $password) {
            $this->formhandler->setError('confirm_password', 'Confirm Password did not match password');
        }

        if ($this->formhandler->hasError()) {             // if there is an error in the user data  
            // echo '<pre>';
            // print_r($this->formhandler->errorsList());
            $this->helpers->redirectTo('register.php');
        } else {                                         // if all the data is correct
            if (isset($_POST['Remember'])) {
                $this->rememberUser();
            } else {
                $this->visitorUser();
            }
            // die('@_@');
            $this->helpers->redirectTo('welcome.php');
        }  
    }

   /**
    * Remember The user data in cookies
    * 
    * @return void
    */
   public function rememberUser() 
   {
        $this->cookie->set('user', [
        'name' => $this->formhandler->post('name'),
        'email' => $this->formhandler->post('email')
        ], time() + 3600);
   }
   
   /**
    * Remember The user data in session
    * 
    * @return void
    */
   public function visitorUser() 
   {
        $this->session->set('user',[
        'name' => $this->formhandler->post('name'),
        'email' => $this->formhandler->post('email') 
        ]);
   }
}
    $registerpage = new RegisterPage();
    $registerpage->submit();
?>