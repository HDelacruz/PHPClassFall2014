<?php

// functions
// function that will take an email and password 
// and confirm that it is found in the database

function check_log_in($email, $password) {

  
//connect to my database                                     
    $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");

    $dbs = $db->prepare('select email, password from signup where email = :email');

    $dbs->bindParam(':email', $email);

    $dbs->execute();

    $rows = $dbs->fetchAll();
    $dbs->closeCursor();
   
    foreach ($rows as $row) {
        if ($row['password'] == sha1($password)) {
            return TRUE;
        }
    }

    return FALSE;
}

// function to check if an email exist in the database

function check_if_email_exist($email) {
    //connect to my database                                     
    $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");

    $dbs = $db->prepare('select email, password from signup where email = :email');

    $dbs->bindParam(':email', $email);

    $dbs->execute();
    
    $rows = $dbs->fetchAll();
    $dbs->closeCursor();

    return count($rows)>0;

}

// function to check if an email is valid
function valid_email($email) {
    if (empty($email)) {
        return FALSE;
    }

    If (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return FALSE;
    }

    return TRUE;
}

// function to check if a password is valid
function valid_password($password) {
    if (empty($password)) {
        return FALSE;
    }

    if (strlen($password) < 4) {
        return FALSE;
    }

    return TRUE;
}

//getting imput values using filter imput
$error_message = '';
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

// check valid password
if (!valid_password($password)) {
    $error_message .= '<p>You must enter a valid Password.</p>';
}


//checking valid email
if (!valid_email($email)) {
    $error_message .= '<p>You must enter a valid Email. </p>';
}

//echo out error message
if (!empty($error_message)) {
    echo $error_message;
} else {

    // check if email and password in data base
    if (check_log_in($email, $password)) {
        echo "you are allready signed up <br />";
    } else if (check_if_email_exist($email)) {
        echo "email exists in data base<br />";
    } else {

        //connect to my database                                     
        $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");

        $dbs = $db->prepare('insert into signup set email=:email, password= :password');
        $password = sha1($password);
        $dbs->bindParam(':email', $email, PDO::PARAM_INT);
        $dbs->bindParam(':password', $password, PDO::PARAM_INT);

        if ($dbs->execute() && $dbs->rowCount() > 0) 
        {

            echo '<h1> update complete</h1>';
        } 
        
        else 
        {
            echo '<h1> user ', ' was <strong>NOT</strong>updated</h1>';
        }
    }
}
?>

