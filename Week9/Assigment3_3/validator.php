<?php


class validator {
    
    
    
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

  


}
