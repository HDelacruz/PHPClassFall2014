<?php

 // remove all session variables
if (!isset($_SESSION)) session_start();
session_unset();
session_destroy();

// print nav bar
include "header.php";

// use validator class
include ("validator.php");
$val = new validator();

if(in_array("Submit",$_POST))
{

//getting imput values using filter imput
$error_message = '';
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

// check valid password
if (!$val->valid_password($password)) {
    $error_message = 'You must enter a valid Password.<br />';
}


//checking valid email
if (!$val->valid_email($email)) {
    $error_message .= 'You must enter a valid Email. <br/>';
}

//echo out error message
if (!empty($error_message)) {
    echo "<center>" . $error_message . "</center>";
} else {

    // check if email and password in data base
    if (!$val->check_log_in($email, $password)) {
        $error_message = "Incorrect login <br />";
        echo "<center>" .$error_message . "</center>";
 
    } else {

        session_start();
        // log in user
      $_SESSION['loggedin']=TRUE;
      header('Location: '.'admin.php');
    }
}
}

if(!in_array("Submit",$_POST) || !empty($error_message))
{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Log in</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    
    <div id="content">
        <h1>Login</h1>
        <form action="login.php" method="post">
        <input type="hidden" name="action" value="process_data"/>

       

        <label>E-Mail:</label>
        <input type="text" name="email" 
               value=""/>
        <br />

        <label>Password:</label>
        <input type="password" name="password" 
               value=""/>
        <br />

        <label>&nbsp;</label>
        <input type="submit" value="Submit" name="Submit"/>
        <br />

        </form>

        

    </div>
</body>
</html>

<?php
 }
 ?>
