<!DOCTYPE html>
<head>
    <?php
        require_once "../HTML/navbar.html";
        require_once "../JAVASCRIPT/NavBarItemsJSFunctions.js";
        include "Functions/Connection.php";
    ?>
</head>
<?php
        if(isset($_COOKIE['user']))
        {
            $FirstName = GetUserInfromation();
            if($FirstName == "")
                echo "<script> window.location ='LogOut.php'</script>";

            $pdo = new PDO("mysql:host=localhost; dbname=collegeProject", 'root', '');
            $user_ID = $_COOKIE['user'];
            $stmt = $pdo -> prepare("SELECT COUNT(*) FROM notfications WHERE user_id = $user_ID");
            $stmt -> execute();
            $row = $stmt -> fetch();
            $COUNT = (int)$row[0];
            echo "<script> logged('$FirstName', $COUNT);</script>";
            $ID = (int)$_COOKIE['user'];
            if($ID == 0)
                echo "<script> ShowManagePageButton();</script>";
        }

        else
        {
            echo "<script> notLogged() </script>";
        }

        if(isset($_POST['Search']))
        {
            $searchValue = $_POST['searchbar'];
            setcookie('search', $searchValue, time() + (86400 * 3));
            echo"<script>window.location = 'SearchPage.php';</script>";
        }

        function GetUserInfromation()
        {
            $pdo = new PDO("mysql:host=localhost; dbname=collegeProject", 'root', '');
            $ID = $_COOKIE['user'];
            $stmt = "SELECT * FROM users WHERE ID = $ID";
            $stmt = $pdo -> prepare($stmt);
            $stmt -> execute();
            $row = $stmt -> fetch();
            $FirstName = $row[1];
            $LastName = $row[2];
            $Password = $row[3];
            $Email = $row[4];
            $phonenumber = $row[5];
            $profilePictureUrl = $row[6];
            return $FirstName;
        }
?>
