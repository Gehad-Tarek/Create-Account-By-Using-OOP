<?php

class Cookie
{
    /**
     * Add new cookie
     * 
     * @param  string $cookieName
     * @param  mixed $cookieValue 
     * @param $time
     * @return void
     */
    public function set(string $cookieName, $cookieValue, $time)
    {
        setcookie($cookieName, $cookieValue, $time);
    }

    /**
     * Check if cookie has the given key
     * 
     * @param  string $cookieName 
     * @return bool
     */
    public function has(string $cookieName): bool
    {
        return isset($_COOKIE[$cookieName]);
    } 

    /**
     * Get the value for given key  
     * 
     * @param  string $cookieName 
     * @return mixed
     */
    public function get(string $cookieName)
    {
        if ($this->has($cookieName)) {
            return $_COOKIE[$cookieName];
        }
    
        return null;

    }

    /**
     * Remove the given key from the cookie
     * 
     * @param  string $key 
     * @param $cookieValue
     * @param $time
     * @return void
     */
    public function remove(string $cookieName, $cookieValue, $time)
    { 
        setcookie($cookieName, $value, $time);

    }
}
 
    $cookie = new Cookie();
    function cookieObject(){
        global $cookie;
        return $cookie;
    }

?>