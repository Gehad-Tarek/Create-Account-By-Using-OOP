<?php
// require_once 'Helpers.php';
require_once 'User.php';
// echo '<pre>';

// print_r($_COOKIE);

// die;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Home</title>
</head>
<body>
<form method="POST" action="LogoutPage.php">
    <h1>
        Welcome 
        <?php echo  $user->name(); ?>        <!-- user function has been identified in helpers.php -->  
    </h1>

    <button>Logout</button>
</form>
</body>
</html>