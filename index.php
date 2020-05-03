<?php 
// require_once 'Session.php';
// require_once 'Cookie.php';
require_once 'User.php';
require_once 'HomePage.php';

if ($user->isLoggedIn()) {
    $homepage->home();
} else {
    $homepage->unregisteredPage();
}
// if (! $session->has('user') && ! $cookie->has('user')) {
//     $homepage->unregisteredPage();
// } else {
//     $homepage->home();
// }