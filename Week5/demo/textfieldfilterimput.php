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
        
        $textfield = filter_input(INPUT_POST, 'textfield');
        $passwordfield = filter_input(INPUT_POST, 'passwordfield');
        $hiddenfield = filter_input(INPUT_POST, 'hiddenfield');
       
            if ( empty($hiddenfield) ) {
                
                $hiddenfield = 'hahahaa';
            }
        
        ?>
       
        <form action="#" method="post">
            
            
<label>Text</label>
<input type="text" name="textfield" value="<?php echo $textfield; ?>" /><br />
    
<label>Text</label>
<input type="password" name="passwordfield" value="<?php echo $passwordfield; ?>" /><br />

<input type="hidden" name="hiddenfield" value="<?php echo $hiddenfield; ?>" /><br />
           
<input type="submit" value="submit" />
            
            
        </form>
        
    </body>
</html>