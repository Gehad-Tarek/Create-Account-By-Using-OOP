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
     * Get value for the given key from user info in session & cookie
     * 
     * @param  string $key 
     * @return mixed
     */
    public function user(string $key)
    {
        if ($this->cookie->has('user')) {
            $user = $this->cookie->get('user');

            if (! $user) return '';
    
            if (! isset($user[$key])) return '';
    
            return $user[$key];
        } else {       
            $user = $this->session->get('user');

            if (! $user) return '';

            if (! isset($user[$key])) return '';

            return $user[$key];
        }
    }
    
    /**
     * Get user name
     * 
     * @return string
     */
    public function name(): string 
    {
        return $this->user('name');
    }
    
    /**
     * Get user email
     * 
     * @return string
     */
    public function email(): string 
    {
        return $this->user('email');
    }
    
    
    /**
     * Get user image path
     * 
     * @return string
     */
    public function image(): string 
    {
        return $this->user('imagePath');
    }
}

$user = new User();