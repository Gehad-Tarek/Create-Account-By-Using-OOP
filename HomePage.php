<?php
require_once 'Helpers.php';
class HomePage
{
    private $helpers;
    public function __construct(){
        $this->helpers = helpersObject();
    }
    /**
     * Display the visitor page >> the non logged in 
     * 
     * @return void
     */
    public function unregisteredPage()
    {
        $this->helpers->redirectTo('unregistered.php');
    }

    /**
     * Display the registered page 
     * 
     * @return void
     */
    public function home()
    {   
        $this->helpers->redirectTo('welcome.php');
    }
}
    $homepage = new HomePage();
    $homepage->unregisteredPage();
?>