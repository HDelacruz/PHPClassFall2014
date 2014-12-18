<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
         <title>Mailing List Results</title>
        <link rel="stylesheet" type="text/css" href="main.css"/>
    </head>
    <body>
        
        
        <?PHP
  //function to check email 
function valid_email($email) {
    if (empty($email)) {
        return FALSE;
    }

    If (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return FALSE;
    }

    return TRUE;
}
      
    //declarations
 $error_message = "";
 $email = filter_input(INPUT_POST, 'email');
 $phone = filter_input(INPUT_POST, 'phone');
 $hearFromUs = filter_input(INPUT_POST, 'heard_from');
 $contact = filter_input(INPUT_POST, 'contact_via');
 $comments = filter_input(INPUT_POST, 'comments');
 
 //checking email with email function
 if (!valid_email($email)) {
    $error_message .= 'You must enter a valid Email. <br/>';    
}

if (empty($phone)){
    $error_message .= 'You must enter a phone number. <br/>'; 
}


 if (isset($_POST['heard_from'])) {
        $heard_from = $_POST['heard_from'];
    } else {
        $heard_from = 'Unknown';
    }
    
 if(empty ($hearFromUs) )
        {
          $error_message .= 'Please tell us how you heard from us. <br/>'; 
        }
    
        
  //echo out error message
if (!empty($error_message)) {
    echo "<center>" . $error_message . "</center>";
    include "index.php";  
    Exit();
   
}

    else{


 
  
 $contact_via = filter_input(INPUT_POST,'contact_via');


 $email = htmlspecialchars($email);
 $phone = htmlspecialchars($phone);
 $comments = htmlspecialchars($comments);


    
  //connect to my database                                     
     $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");

    $dbs = $db->prepare('insert into account set email=:email, phone= :phone, heard=:heard_from, contact=:contact_via, comments=:comments ');
    
    $dbs->bindParam(':email', $email, PDO::PARAM_INT);
    $dbs->bindParam(':phone', $phone, PDO::PARAM_INT);
    $dbs->bindParam(':heard_from', $heard_from, PDO::PARAM_INT);
    $dbs->bindParam(':contact_via', $contact_via, PDO::PARAM_INT);
    $dbs->bindParam(':comments', $comments, PDO::PARAM_INT);
    }
        if ($dbs->execute() && $dbs->rowCount() > 0) 
        {

            echo '<h1> Sign up Complete!</h1>';
              
            
        } 
        
        else 
        {
            echo "<center>" .'<h1> user ', ' was <strong>NOT</strong>signed up</h1>'."<center>";
            
        }


    
    ?>
        
         <div id="content">
            <h1>Account Information</h1>

            <label>Email Address:</label>
            <span><?php echo htmlspecialchars($email); ?></span><br />
            
            <label>Phone Number:</label>
            <span><?php echo htmlspecialchars($phone); ?></span><br />

            <label>Heard From:</label>
            <span><?php echo $heard_from; ?></span><br />

            <label>Contact Via:</label>
            <span><?php echo $contact_via; ?></span><br /><br />

            <span>Comments:</span><br />
            <span><?php echo $comments; ?></span><br />
            
            <td><a href="display.php?id=',$value['id'],'">Display Database</a></td>';
</div>

        
        
        
        
        
      
        </div>
    </body>
</html>