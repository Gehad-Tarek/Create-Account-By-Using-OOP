<?php 
    require_once 'Session.php';
    require_once 'Cookie.php';
    require_once 'FormHandler.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        body{
            padding-left: 30%;
            padding-right: 30%;
            text-align: center;
        }
        h1{
            color:  #2c2a2a;
        }
        input{
            width: 80%;
            margin-left: 5%;
            padding: 5px;
            margin-bottom: 10px;
            position: relative;
        }      
        #remember{
            margin-bottom: 10px;
            margin-right: 50%;
            position: relative;
            color: #2c2a2a;
        }
        #checkbox{
            position: absolute;
            margin-left: -43%;
        }
        button{
            padding: 5px 4%;
            background-color: gray;
            color: white;
            text-align: center;
            border: 1px solid gray;
            border-radius: 5px;
        }

        button:hover{
            background-color: #6a6767; 
            border-color: #6a6767;
        }
        .error{
            display: inline-block;
            font-weight: bold;
            color: red;
            /* margin-left:85%;
            position: absolute;
            top: 0px;
            left: 30%; */
            /* top: -10%; */
            /* margin-top: -10%; */
            width: 100%;
        }
    </style>
</head>
<body>

    <h1>Create An Account</h1>
    <form method="POST" action="RegisterPage.php" enctype="multipart/form-data">   
        <input type="text" name="name" value="<?php if($session->has('userError')) {
            echo $session->get('userError')['name'];
        } ?>" placeholder="username">

        <?php if ($formhandler->getError('name')) { ?>
            <div class="error"><?php echo $formhandler->getError('name'); ?></div>
        <?php } ?>

        <br />
        <input type="email" name="email" value="<?php if ($session->has('userError')) {
            echo $session->get('userError')['email']; 
        }?>" placeholder="email">

        <?php if ($formhandler->getError('email')) { ?>
            <div class="error"><?php echo $formhandler->getError('email'); ?></div>
        <?php } ?>

        <br />
        <input type="password" name="password" value="<?php if ($session->has('userError')) {
         echo $session->get('userError')['password']; 
        }?>"  placeholder="password">

        <?php if ($formhandler->getError('password')) { ?>
            <div class="error"><?php echo $formhandler->getError('password'); ?></div>
        <?php } ?>

        <br />
        <input type="password" name="confirm_password" value="<?php if ($session->has('userError')) {
         echo $session->get('userError')['confirm_password']; 
        }?>"  placeholder="confirm-password">

        <?php if ($formhandler->getError('confirm_password')) { ?>
            <div class="error"><?php echo $formhandler->getError('confirm_password'); ?></div>
        <?php } ?>

        <br />
        <input type="file" name="fileToUpload">
        <h5 id="remember"><input id="checkbox" type="checkbox" name="Remember" value="checked">Remember Me</h5> 
        <button type="submit" name="submit_button" >Create New Account</button>
        
    </form>
</body>
</html>