<?php
require_once 'Session.php';
require_once 'Cookie.php';
class Helpers 
{
    private $session, $cookie;
    public function __construct(){
        $this->session = sessionObject();
        $this->cookie = cookieObject();
    }
    /**
     * Redirect to the given path
     * 
     * @param  string $path 
     * @return void
     */
    public static function redirectTo(string $path)
    {
        header("location: $path"); 
    }

    /**
     * Get value for the given key from user info in session & cookie
     * 
     * @param  string $key 
     * @return mixed
     */
    function user(string $key)
    {
        if (isset($_POST['Remember'])) {
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
}

    $helpers = new Helpers();
    function helpersObject(){
        global $helpers;
        return $helpers;
    }
?>