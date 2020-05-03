<?php 
require_once 'Session.php';
require_once 'Cookie.php';
// require_once 'Helpers.php';
class User 
{
    private $session, $cookie;
    
    public function __construct()
    {
        $this->session = sessionObject();
        $this->cookie = cookieObject();
        // $this->helpers = helpersObject();
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
        // return $this->helpers->user('name');
        if ($this->cookie->has('user')) {
            $user = $this->cookie->get('user');

            if (! $user) return '';
    
            if (! isset($user['name'])) return '';
    
            return $user['name'];
        } else {       
            $user = $this->session->get('user');

            if (! $user) return '';

            if (! isset($user['name'])) return '';

            return $user['name'];
        }
    }
    
    /**
     * Get user email
     * 
     * @return string
     */
    public function email(): string 
    {
        // return $this->helpers->user('email');
        if ($this->cookie->has('user')) {
            $user = $this->cookie->get('user');

            if (! $user) return '';
    
            if (! isset($user['email'])) return '';
    
            return $user['email'];
        } else {       
            $user = $this->session->get('user');

            if (! $user) return '';

            if (! isset($user['email'])) return '';

            return $user['email'];
        }
    }
    
    
    /**
     * Get user image path
     * 
     * @return string
     */
    public function image(): string 
    {
        // return $this->helpers->user('imagePath');
        if ($this->cookie->has('user')) {
            $user = $this->cookie->get('user');

            if (! $user) return '';
    
            if (! isset($user['imagePath'])) return '';
    
            return $user['imagePath'];
        } else {       
            $user = $this->session->get('user');

            if (! $user) return '';

            if (! isset($user['imagePath'])) return '';

            return $user['imagePath'];
        }
    }
}

$user = new User();