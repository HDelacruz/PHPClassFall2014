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
        //get the id by susing filter input
        $id = filter_input(INPUT_GET, 'id');
        
        //conection to my database
        $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
          
        //use preapre to run query statement
        $dbs = $db->prepare('select * from users where id = :id');  
        
        //binding 
        $dbs->bindParam(':id',$id, PDO::PARAM_INT);
        
        
        //if execute 
        if ($dbs->execute() && $dbs->rowCount() > 0)
        {
            $results = $dbs->fetch(PDO::FETCH_ASSOC);
            ?>
        
         <form action="#" method="post">            
             <input type="hidden" name="id" value="<?php echo $results['id']; ?>" />        <br>     
            full name: <input type="text" name="fullname" value="<?php echo $results['fullname'];?>" />  <br>           
            email: <input type="text" name="email" value="<?php echo $results['email'];?>" />   <br>          
            phone: <input type="text" name="phone" value="<?php echo $results['phone'];?>" />  <br>           
            zip: <input type="text" name="zip" value="<?php echo $results['zip'];?>" />  <br>     
            <td><a href="update.php?id=',$value['id'],'">Submit</a></td>
            
            
        </form>
     
        <?php
        
       
        } 
        else 
            {
            echo 'no data';
            }
            
        
        
        
        
        ?>
    </body>
</html>
