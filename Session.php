<?php
class Session 
{
    
    public function __construct()
    {
        session_start();
    }
    /**
     * Add new key to the session
     * 
     * @param  string $key 
     * @param  mixed $value 
     * @return void
    **/
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Check if session has the given key
     * 
     * @param  string $key 
     * @return bool
     */
    public function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    } 

    /**
     * Get the value for given key  
     * 
     * @param  string $key 
     * @return mixed
     */
    public function get(string $key)
    {
        if ($this->has($key)) {             //we use [ $this->methodName ] to call a fun in another fun in the same class
            return $_SESSION[$key];
        }
    
        return '';
    }

    /**
     * Remove the given key from the session
     * 
     * @param  string $key 
     * @return void
     */
    public function remove(string $key)
    {
        unset($_SESSION[$key]);
    }

    // /**
    //  * Destroy the session
    //  * 
    //  * @return void
    //  */
    // public function destroy()
    // {
    //     unset($_SESSION);
    //     //session_unset();

    //     // remove all content in the session file
    //     session_destroy(); 
    // }

}

    $session = new Session();
    function sessionObject(){
        global $session;
        return $session;
    }

?>