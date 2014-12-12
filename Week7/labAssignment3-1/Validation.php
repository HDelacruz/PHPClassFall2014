<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php     
    //check log in - function that will take an email and password and confirm that it is found in the database.  
  function checkLogin($username, $password){
        $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
        $dbs = $db->prepare('select * from signup where email=:email and password=:password');
        $dbs->bindParam(':email', $username, PDO::PARAM_STR);
        $dbs->bindParam(':password', $password, PDO::PARAM_STR);
    if ($dbs->execute() && $dbs->rowcount() > 0) {
       return true;
    } else{
        return false;
    }
}

function email_Exists($email)
{
   $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
    
    $dbs = $db->prepare('select * from signup where email=:email ');
    //bind the parameters. 
    $dbs->bindParam(':email', $email, PDO::PARAM_INT);
    
    //if the query executes and there is a row count,
    if($dbs->execute() && $dbs->rowCount() > 0)
    {
        return TRUE;
    }
    else 
    {
        return FALSE;
    }

}

function PassExists($email)
{
   $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
    
    $dbs = $db->prepare('select * from signup where password=:password');
    
    //bind the parameters. 
     $dbs->bindParam(':password', $password, PDO::PARAM_INT);
    //if the query executes and there is a row count,
    if($dbs->execute() && $dbs->rowCount() > 0)
    {
        return TRUE;
    }
    else 
    {
        return FALSE;
    }

}

$err_Message = array('');
//take in filtered post values from the signup form. 
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

if(email_Exists($email)==false)
{
    array_push($err_Message, '<p>Email is missing or invalid! Please enter a valid email address!</p>');
}
if(PassExists($password)== false)
{
    array_push($err_Message, '<p>Password is missing or invalid. Please enter a password that is greater than 3 characters in length.</p>');
}
if(checkLogin($email, $password)== false)
{
   array_push($err_Message, '<p>Login Failed! Username or Password invalid!</p>');
}
//if there are no errors...
if (sizeof($err_Message) == 1)
{
 echo "Sign up Complete!";

}
   include 'index.php'; 
 


        ?>
    </body>
</html>
