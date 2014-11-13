<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
            $my_str1 = 'string1';
            $my_str2 = "single $my_str1";
            $my_str3 = 'single ' . $my_str1;
            $my_str4 = 'single ${my_str1}';
            $my_str5 = "single ${my_str1}";
            
            echo $my_str4;
            echo '<br />', $my_str5;
            
    //heredoc        
$str = <<<END
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>${my_str1}</title>
    </head>
    <body>
END;
echo $str;
$password = 'test';
//$password = sha1($password);
$dbPass = 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3';
echo md5($password);
echo '<br />';
//echo strlen(sha1($password));
echo sha1($password);
if ( sha1($password) === $dbPass ) {
    echo 'correct password';
}
                    
         
echo '<br />';
echo substr($dbPass, 20, 10);
echo '<br />';
$email = 'test@test.com sdfgsdfg sdfsd fsd fsd fsd fsstr';
echo strpos($email, '@');
echo '<br />';
echo str_shuffle($email);
echo strrev($email);
            
            
            
        
        
        ?>
    </body>
</html>