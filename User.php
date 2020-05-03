<?php 
require_once 'Session.php';
require_once 'Cookie.php';
require_once 'Helpers.php';
class User 
{
    private $session, $cookie, $helpers;
    
    public function __construct()
    {
        $this->session = sessionObject();
        $this->cookie = cookieObject();
        $this->helpers = helpersObject();
    }
    /**
     * Check if user is logged in either in session or cookies
     * 
     * @return bool
     */
    public function isLoggedIn(): bool 
    {
        if ($this->session->has('user') || $this->cookie->has('user')) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Get user name
     * 
     * @return string
     */
    public function name(): string 
    {
        return $this->helpers->user('name');
    }
    
    /**
     * Get user email
     * 
     * @return string
     */
    public function email(): string 
    {
        return $this->helpers->user('email');
    }
    
    
    /**
     * Get user image path
     * 
     * @return string
     */
    public function image(): string 
    {
        return $this->helpers->user('imagePath');
    }
}

$user = new User();