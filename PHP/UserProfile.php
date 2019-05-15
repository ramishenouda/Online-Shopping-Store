<head>
    <br>
    <?php
        GetUserInfromationP();
        if(!isset($_COOKIE['user']))
            header('location:LoginRegister.php');
        require_once "FORMS/NavBarFORM.php";
        require_once "FORMS/ProfileForm.php";
        require_once "../JAVASCRIPT/RegisterProductJSFunctions.js";
        require_once "Functions/ShowProductsOnProfilesPHPFunctions.php";
        require_once "Functions/AddProductPHPFunctions.php";
        $FirstName;
        $LastName;
        $Password;
        $Email;
        $phonenumber;
        $profilePictureUrl;
     ?>
     <title><?php echo"$FirstName"; ?></title>
</head>

<?php
    function GetUserInfromationP()
    {
        $ID = $_COOKIE['user'];
        $pdo = new PDO("mysql:host=localhost; dbname=collegeProject", 'root', '');
        $stmt = "SELECT * FROM users WHERE 'ID' = $ID";
        $stmt = $pdo -> prepare($stmt);
        $stmt -> execute();
        $row = $stmt -> fetch();

        $FirstName = $row[1];
        $LastName = $row[2];
        $Password = $row[3];
        $Email = $row[4];
        $phonenumber = $row[5];
        $profilePictureUrl = $row[6];
    }
?>
