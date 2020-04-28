<?php 
require_once 'Session.php';
require_once 'Cookie.php';
require_once 'HomePage.php';

if (! $session->has('user')) {
    $homepage->unregisteredPage();
} elseif (! $cookie->has('user')) {
    $homepage->unregisteredPage();
}
else {
    $homepage->home();
}

?>