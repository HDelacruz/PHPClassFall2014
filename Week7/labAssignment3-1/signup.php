<?php
require 'Validation.php';
//getting imput values using filter imput
       $error_message = '';
       $email = filter_input(INPUT_POST, 'email');
       $password = filter_input(INPUT_POST, 'password');
       
       //making sure is not empty
       if (empty($password))
       {
          $error_message = 'You must enter a Password.'; 
       }
       //has to be at least 4 characters
       else if (strlen($password) < 4) {
            $error_message = 'The Password must be at least 4 characters.';
           
        }
        //if is 4 characters or more encrypt the password
        else if (strlen($password) >= 4) 
        {
            $password = sha1($password);   
        }
   //checking make sure is not empty
if (empty($email)) 
       {
      $error_message .= '<P> You must enter an email address.<\p>';        
       }
       //make sure email is the right format
  else if( filter_var($email, FILTER_VALIDATE_EMAIL) == false )
  {
      $error_message .=  'email entered is not valid.';
  }
   
  //echo out error message
  if (!empty ($error_message))
  {
   echo $error_message;
  }
  
  else 
  {
   
  //connect to my database                                     
$db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");

$dbs = $db->prepare('insert into signup set email=:email, password= :password');     
     
$dbs->bindParam(':email', $email, PDO::PARAM_INT);
$dbs->bindParam(':password', $password, PDO::PARAM_INT);
        
 if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
     
     echo '<h1> Sign up Complete</h1>';  
         
 } else {
      echo '<h1> user ',' was <strong>NOT</strong>updated</h1>';
 }
        
        
  }
  
   function check_login($username, $password){
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



function emailExists($email)
{
   $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
    
    $query = $db->prepare('select * from signup where email=:email');
    //bind the parameters. 
    $query->bindParam(':email', $email, PDO::PARAM_INT);
    //if the query executes and there is a row count,
    if($query->execute() && $query->rowCount() > 0)
    {
        return TRUE;
    }
    else 
    {
        return FALSE;
    }

}


function valid_login($username, $password){
        $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
        $dbs = $db->prepare('select * from signup where email=:email and password=:password');
        $dbs->bindParam(':email', $username, PDO::PARAM_STR);
    $dbs->bindParam(':password', $password, PDO::PARAM_STR);
    if (empty($email) || (filter_var($email, FILTER_VALIDATE_EMAIL) == false) || (empty($password)) || (strlen($password) < 4)) {
        //($dbs->execute() && $dbs->rowcount() > 0) {
       return false;
    } else{
        return true;
    }
}

       
  
  
  
               
       
       
      ?>