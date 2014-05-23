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
        <textarea name="email_body" rows="25" cols="55" placeholder="Content here"></textarea>
        </p>

        <p>
            <label for="send_email">
                <input type="checkbox" id="send_email" name="send_email" value="yes" checked> Please send a copy to my sent folder!
            </label>
        <p>
            <input type="submit" value="Submit">
        </p>
        </form> -->

        <form>
        <h3>San Antonio Multiple Choice Quiz</h3>

        <p>What is Tim Duncans jersey # ?</p>
        <label for="answer1">
            <input type="radio" id="answer1" name="q1" value="houston">9
        </label>
        <label for="answer2">
            <input type="radio" id="answer2" name="q1" value="dallas">50
        </label>
        <label for="answer3">
            <input type="radio" id="answer3" name="q1" value="austin">21
        </label>
        <label for="answer4">
            <input type="radio" id="answer4" name="q1" value="san antonio">22
        </label>

        <p>Who is San Antonio's current mayor ?</p>
        <label for="answer1">
            <input type="radio" id="answer1" name="q1" value="Julian Castro">Julian Castro
        </label>
        <label for="answer2">
            <input type="radio" id="answer2" name="q1" value="Nelson Wolff">Nelson Wolff
        </label>
        <label for="answer3">
            <input type="radio" id="answer3" name="q1" value="Joaquin Castro">Joaquin Castro
        </label>
        <label for="answer4">
            <input type="radio" id="answer4" name="q1" value="no one">no one
        </label>

        <p>Where does San Antonio rank amongst the US largest cities # ?</p>
        <label for="answer1">
            <input type="radio" id="answer1" name="q1" value="5th">5th
        </label>
        <label for="answer2">
            <input type="radio" id="answer2" name="q1" value="9th">9th
        </label>
        <label for="answer3">
            <input type="radio" id="answer3" name="q1" value="11th">11th
        </label>
        <label for="answer4">
            <input type="radio" id="answer4" name="q1" value="7th">7th
        </label>

     </body>

</html>     
    