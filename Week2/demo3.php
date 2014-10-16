<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1> My Form </h1>
        <form action="#" method="post">            
           F Name: <input type="text" name="fname" /> <br />
           L Name: <input type="text" name="lname" /> <br />
            <input type="submit" />            
        </form>
        
        <?php
        // put your code here
        filter_input(INPUT_POST, 'fname');
        var_dump($_POST);
        
        $errorMsg = '';
        
        if ( !empty($_POST) ) {
        
            if ( empty($_POST['fname']) === false ) {
                echo $_POST['fname'];
            } else {
                $errorMsg = 'First name is empty';
            }

            if ( isset($_POST['lname']) === true ) {
                echo $_POST['lname'];
            } else {
                $errorMsg = 'Last name is empty';
            }
            
        }
        /*
        empty
        isset();
        is_string($var)
        is_numeric($var)
        */
        
         if ( empty($errorMsg) === false ) {
             echo '<p>', $errorMsg , '</p>';
         }
        
             
             
        ?>
        
        
       
        
        
    </body>
</html>
