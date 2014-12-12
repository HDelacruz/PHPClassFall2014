<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    <div id="content">
        <h1>Sign Up</h1>
        <form action="signup.php" method="post">
        <input type="hidden" name="action" value="process_data"/>

       

        <label>E-Mail:</label>
        <input type="text" name="email" 
               value=""/>
        <br />

        <label>Password:</label>
        <input type="password" name="password" 
               value=""/>
        <br />

        <label>&nbsp;</label>
        <input type="submit" value="Submit" />
        <br />

        </form>

        

    </div>
</body>
</html>