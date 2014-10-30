<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
              
$id = filter_input(INPUT_POST, 'id');
$fullname = filter_input(INPUT_POST, 'fullname');
$phone = filter_input(INPUT_POST, 'phone');
$email = filter_input(INPUT_POST, 'email');
$zip = filter_input(INPUT_POST, 'zip');

//var_dump($fullname);

//connect to my database
$db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");


//prea
$dbs = $db->prepare('update users set fullname=:fullname, phone= :phone, email= :email, zip= :zip where  id = :id');     
     
$dbs->bindParam(':id', $id, PDO::PARAM_INT);
$dbs->bindParam(':fullname', $fullname, PDO::PARAM_INT);
$dbs->bindParam(':phone', $phone, PDO::PARAM_INT);
$dbs->bindParam(':email', $email, PDO::PARAM_INT);
$dbs->bindParam(':zip', $zip, PDO::PARAM_INT);
        
 if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
     
     echo '<h1> update complete</h1>';
              
 } else {
      echo '<h1> user ',' was <strong>NOT</strong>updated</h1>';
 }                 
?>       
         <a href="viewpage.php">View Users</a>
    </body>
</html>