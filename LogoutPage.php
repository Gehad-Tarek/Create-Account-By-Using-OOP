<?php 
require_once 'Session.php';
require_once 'Cookie.php';
require_once 'Helpers.php';

class LogoutPage 
{
    private $session, $cookie, $helpers;
    
    public function __construct()
    {
        $this->session = sessionObject();
        $this->cookie = cookieObject();
        $this->helpers = helpersObject();
    }
    /**
     * Log the user out
     */
    public function logout()
    {
        if (isset($_SESSION['user'])) {
            $this->session->remove('user');
        } else if (isset($_COOKIE['user'])) {
            $this->cookie->remove('user');
        }
        $this->helpers->redirectTo('index.php');
    }
}
    
    $log = new LogoutPage();
    $log->logout();
   


    // function logoutObject(){
    //     global $log;
    //     return $log;
    // }




?>