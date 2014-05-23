<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"> 
        <title>Codeup lesson</title>
    </head> 

    <?php
    echo "<h4>GET<br>";
        var_dump($_GET);
    echo "<h4>POST<br>";    
        var_dump($_POST);
    ?>

    <body>
        <h3>User Login</h3>
        <!-- method is the HOW / action is the WHERE  -->
        <form method="POST">
        <p>
            <label for="first_name">First name</label>
            <input id="first_name" name="first_name" type="text">
        </p>
        <p>
            <label for="last_name">Last name</label>
            <input id="last_name" name="last_name" type="text">
        </p>
        <p>
            <label for="password">Password</label>
            <input id="password" name="password" type="password">
        </p>
        <p>
            <input type="submit" value="Log In">
        </p>
        </form>

        <h3>Compose an Email</h3>

        <form method="POST">
            <p>
                <label for="to">To</label>
                <input id="to" name="to" type="text">
            </p>
            <p>
                <label for="from">From</label>
                <input id="eMail" name="from" type="email">
            </p>
            <p>
                <label for="subject">Subject</label>
                <input id="eMail" name="subject" type="email">
            </p>
            <p>
            <textarea name="email_body" rows="35" cols="75"> Content here</textarea>
            </p>
            <p>
                <input type="submit" value="Submit">
            </p>
            

        </form> -->

     </body>

</html>     
    
