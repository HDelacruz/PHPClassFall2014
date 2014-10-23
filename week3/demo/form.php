<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
         <?php
         
             $pdo = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
            
         
            if ( !empty($_POST) ) {
                
                $sql = "insert into users set fullname='"
                        . $_POST['fullname'] . 
                        "', email = 'test@test.com', phone = '4014443333', zip = '12345';";
                
                
                echo $sql ;
                
                if ( $pdo->exec($sql) ) {
                    echo 'Saved Data';                    
                } else {
                    echo 'Saved NOT Data';
                }
                    
                
                echo $_POST['fullname'];
            }
            
            
           
            //var_dump($pdo);
            $statement = $pdo->query('select * from users');
            $users = $statement->fetch(PDO::FETCH_ASSOC);
            
            foreach($users as $key => $value) {
                echo '<p>', $key , ' = ', $value, '</p>';
            }
            
            
            
            $users = $statement->fetchAll(PDO::FETCH_ASSOC);
            var_dump($users);
            foreach($users as $user) {
                foreach($user as $key => $value) {
                    echo '<p>', $key , ' = ', $value, '</p>';
                }
            }
            
            
            
            
            
            
            //var_dump($users);
            
            $arr = array();
            $arr['hello'] = 'hi';
            $arr['hi'] = 'how are you';
            $arr[0] = 'zero';
            $arr[0] = 'zerozero';
            
            var_dump($arr);
            
            foreach($arr as $key => $value) {
                echo '<p>', $key , ' = ', $value, '</p>';
            }
            
            foreach($arr as $value) {
                echo '<p>', $value, '</p>';
            }
            
            
        ?>  
        
        <form action="#" method="post">            
            <input type="text" name="fullname" value="" />            
            <input type="submit" value="submit" />            
        </form>
        
        
       
    </body>
</html>