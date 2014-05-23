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

        <p>
        <textarea name="post_body" rows="5" cols="120"></textarea>
        </p>
        </form>

        <!-- <h1>Here's another form!</h1>

        <form method="POST" acion="another_file.php">
            <p>
                <label for="First_Name">First Name</label>
                <input id="First_Name" name="First" type="text">
            </p>
            <p>
                <label for="Last_Name">Last Name</label>
                <input id="Last_Name" name="Last" type="text">
            </p>
            <p>
                <input type="submit">
            </p>
        </form> -->

     </body>

</html>     
    
