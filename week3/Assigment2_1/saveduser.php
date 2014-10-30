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
         // put your code here
       $name = filter_input(INPUT_POST, 'name');;
       $phone = filter_input(INPUT_POST, 'phone');
       $email = filter_input(INPUT_POST, 'email');
       $zip = filter_input(INPUT_POST, 'zip');
       
       if ( empty($name ) || !is_string ($name) )
         {
        $error_message = 'name is a required field and only letters please.'; 
         }
      else if ( empty($phone ) || !is_numeric ($phone) )
        {
        $error_message = 'phone is a require field and only numbers please';
        }
                       
       else if (empty($email ))
     {
         $error_message = 'email is a required field please';
     }
     else if(empty($zip) || !is_numeric($zip))
     {
         $error_message = 'zip is reauired and shoulud be numbers only';
     }
        
       //connect to database
       $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
                
             
         //use to insert to database table  
       $dbs = $db->prepare('insert into users set name = :name, phone = :phone, email = :email, zip = :zip');  
          
        //var_dump($dbs);
        
         $dbs->bindParam(':name',$name, PDO::PARAM_INT);
         $dbs->bindParam(':phone',$phone, PDO::PARAM_INT);
         $dbs->bindParam(':email',$email, PDO::PARAM_INT);
         $dbs->bindParam(':zip',$zip, PDO::PARAM_INT);
    
    if ( $dbs->execute() && $dbs->rowCount() > 0 ) 
         {
           echo 'Saved Data';                    
         }
          else 
              {
                echo 'Data NOT Saved';
              }          
 
        ?>
    </body>
</html>
