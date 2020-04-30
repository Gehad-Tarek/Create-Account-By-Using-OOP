<?php

function isJson(string $json):bool
{
    json_decode($json);
    if (json_last_error() === JSON_ERROR_NONE) {
        return true;
    }
    return false;
}

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
        if (is_array($cookieValue)) {
            $cookieValue = json_encode($cookieValue);
        }
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
            $value = $_COOKIE[$cookieName];

            if (isJson($value)) {
                return json_decode($value, true);
            } else {
                return $value;
            }
        }
    
        return '';

    }

    /**
     * Remove the given key from the cookie
     * 
     * @param  string $key 
     * @param $cookieValue
     * @param $time
     * @return void
     */
    public function remove(string $cookieName)
    { 
        setcookie($cookieName, '', 0);

    }
}
 
    $cookie = new Cookie();
    function cookieObject(){
        global $cookie;
        return $cookie;
    }


    // $user = [
    //     'id' => 1,
    //     'name' => 'Hasan',
    // ];

    // $d = json_encode($user);

    // $m = json_decode($d, true);
    
    // echo '<pre>';
    
    // print_r($m);

    // die;