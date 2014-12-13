<?php
// signup.php

include ("validator.php");
$val = new validator();

  include "header.php";
  
  
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
    if ($val->check_log_in($email, $password)) {
        $error_message = "you are allready signed up <br />";
        echo "<center>" .$error_message . "</center>";
    } else if ($val->check_if_email_exist($email)) {
        $error_message = "email exists in data base<br />";
        echo "<center>" . $error_message . "</center>";
    } else {

        //connect to my database                                     
        $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");

        $dbs = $db->prepare('insert into signup set email=:email, password= :password');
        $password = sha1($password);
        $dbs->bindParam(':email', $email, PDO::PARAM_INT);
        $dbs->bindParam(':password', $password, PDO::PARAM_INT);

        if ($dbs->execute() && $dbs->rowCount() > 0) 
        {

            echo '<h1> Sign up Success!</h1>';
        } 
        
        else 
        {
            echo '<h1> user ', ' was <strong>NOT</strong>signed up</h1>';
        }
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
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    
    <div id="content">
        <h1>Sign Up</h1>
        <form action="signup.php" method="post">
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
