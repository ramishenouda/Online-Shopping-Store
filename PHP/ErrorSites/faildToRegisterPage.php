<!DOCTYPE html>
<html>
    <head>
        <?php
            if(isset($_COOKIE['user']))
                header('location:../Index.php');
        ?>
        <title>FaildToRegisterPage</title>
    </head>
    <body>
        <center>
            <span style="font-size:60px;">OPS SOMETHING WENT WRONG</span>
            <h3> <a href="../Index.php">Click Here To Go To Home Page</a> </h3>
        </center>
    </body>
</html>
