<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mailing List</title>
        <link rel="stylesheet" type="text/css" href="main.css"/>
    </head>
    <body>
         <div id="content">
            <h1>Account Sign Up</h1>
            <form action="display_results.php" method="post">

            <fieldset>
            <legend>Account Information</legend>
                <label>E-Mail:</label>
                <input type="text" name="email" value="<?php if(isset($email)){echo $email;} ?>" class="textbox"/>
                <br />

                <label>Phone Number:</label>
                <input type="text" name="phone" value="<?php if(isset($phone)){echo $phone;} ?>" class="textbox"/>
            </fieldset>

            <fieldset>
            <legend>Settings</legend>

                <p>How did you hear about us?</p>
                
                
                <input type="radio" name="heard_from" value="Search Engine"<?php if (isset($heard_from) && $heard_from == "Search Engine"){ echo ' checked'; } ?>  />
                Search engine<br />
                <input type="radio" name="heard_from" value="Friend"<?php if (isset($heard_from) && $heard_from == "Friend"){ echo ' checked'; } ?> />
                Word of mouth<br />
                <input type=radio name="heard_from" value="Other"<?php if (isset($heard_from) && $heard_from == "Other"){ echo ' checked'; } ?> />
                Other<br />

                <p>Contact via:</p>
                <select name="contact_via">
                        <option value="email"<?php if (isset($contact_via) && $contact_via == "email"){ echo ' selected = "selected"'; } ?>>Email</option>
                        <option value="text"<?php if (isset($contact_via) && $contact_via == "text"){ echo ' selected = "selected"'; } ?>>Text Message</option>
                        <option value="phone"<?php if (isset($contact_via) && $contact_via == "phone"){ echo ' selected = "selected"'; } ?>>Phone</option>
                </select>

                <p>Comments: (optional)</p>
                <textarea name="comments" rows="4" cols="50"><?php if(isset($comments)){echo $comments;} ?></textarea>
            </fieldset>

            <input type="submit" value="Submit" />

            </form>
            <br />
        </div>
    </body>
</html>