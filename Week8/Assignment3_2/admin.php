<?php
// Start the session
if (!isset($_SESSION)) session_start();

if(!isset($_SESSION['loggedin']))
       header('Location: '.'login.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>

<?php

include "header.php";

?>
    
    <h2>You are now logged in!</h1>

</body>
</html>
