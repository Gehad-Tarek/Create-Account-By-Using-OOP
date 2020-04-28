<?php
require_once 'Session.php';
class FormHandler 
{
    private $session;
    public function __construct()
    {
        $this->session = sessionObject();
    }

    /**
     * Get value from post array
     * 
     * @param  string $key 
     * @return mixed
     */
    public function post(string $key)
    {
        if (isset($_POST[$key])) {
            return $_POST[$key];
        }

        return null;
    }


    /**
     * Add new error to the form
     * 
     * @param  string $name 
     * @param  string $message 
     * @return void
     */
    public function setError(string $name, string $errorMessage)
    {
            $formErrorsKey = 'form_errors'; 

            $errors =$this->session->get($formErrorsKey);

            if (! $errors) {
                $errors = [];
            }

            $errors[$name] = $errorMessage;
            $this->session->set($formErrorsKey, $errors);
    }

    /**
     * Check if form has errors
     * 
     * @return bool
     */
    public function hasError(): bool
    {
        return $this->session->has('form_errors') === true;
    }

    /**
     * Get form error value for the give key
     * 
     * @param  string $key  
     */
    public function getError(string $name)
    {
        $errors = $this->session->get('form_errors');

        if (! $errors) return '';
        
        if (! isset($errors[$name])) {
            return '';
        } else {
            return $errors[$name];
        }
    } 

    /**
     * Remove the form errors from session
     * 
     * @return void
     */
     function clearErrors()
    {
        $this->session->remove('form_errors');
        // $this->session->destroy(); // this line is wrong

    }

    public function errorsList()
    {
        return $this->session->get('form_errors');
    }
}   

    $formhandler = new FormHandler();

    function formhandlerObject()
    {
        global $formhandler;
        return $formhandler;
    }


    // echo '<pre>';

    // print_r($formhandler->errorsList());

    // die;