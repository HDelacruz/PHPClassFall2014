<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        
        <?php
       
            $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");

            $dbs = $db->prepare('select * from account ');
        
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                
                $results = $dbs->fetchAll(PDO::FETCH_ASSOC);
                
                
                echo '<table border="1">'; 
                echo '<tr><th>ID</th><th>Email</th><th>Phone</th>';
                echo '<th>How you Heard</th><th>Contact</th><th>Comments</th';
                foreach ($results as $key => $value) {
                    echo '<tr>';
                     echo '<td>', $key ,'</td>';
                     
                     echo '<td>', $value['email'] ,'</td>';
                     echo '<td>', $value['phone'] ,'</td>';
                     echo '<td>', $value['heard'] ,'</td>';
                     echo '<td>', $value['contact'] ,'</td>';          
                     echo '<td>', $value['comments'] ,'</td>';          
                               
                             
                    echo '</tr>';
                }
                echo '</table>';
                
                
            }
        
        ?>
