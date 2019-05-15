<?php

    if(isset($_POST['SubmitProduct']))
    {
        $inputsFilledProduct = CheckProductInputsFields();
        if($inputsFilledProduct)
        {
            AddProduct();
        }
    }

    function CheckProductInputsFields()
    {
        $inputsFilledProduct = true;
        if($_POST['ProductPrice'] == "")
        {
            echo "<script> forgotProductPrice();</script>";
            $inputsFilledProduct = false;
        }

        if($_POST['ProductName'] == "")
        {
            echo "<script> forgotProductName();</script>";
            $inputsFilledProduct = false;
        }

        if($_POST['ProductPicture'] == "")
        {
            echo "<script> forgotProductPicture();</script>";
            $inputsFilledProduct = false;
        }
        return $inputsFilledProduct;
    }

    function AddProduct()
    {
        $user_ID = $_COOKIE['user'];
        $name = $_POST['ProductName'];
        $price = $_POST['ProductPrice'];
        $picture = $_POST['ProductPicture'];
        $Description = $_POST['ProductDescription'];
        $Quantity = $_POST['ProductQuantity'];
        $pdo = new PDO("mysql:host = localhost; dbname=collegeProject", 'root','');
        $stmt = $pdo -> prepare("SELECT COUNT(*) FROM products");
        $stmt -> execute();
        $row = $stmt -> fetch();
        $count = (int)$row[0];
        $ID = $count;

        $stmt = $pdo -> prepare("SELECT ID FROM products WHERE ID = '$ID'");
        $stmt -> execute();
        $row = $stmt -> fetch();
        $ID2 = (int)$row[0];

        while ($ID = $ID2)
        {
            $ID++;
            $stmt = $pdo -> prepare("SELECT ID FROM products WHERE ID = '$ID'");
            $stmt -> execute();
            $row = $stmt -> fetch();
            $ID2 = (int)$row[0];
        }

        $pdo -> exec("INSERT INTO products(ID, Name, Description, Price, Quantity, ProductPicture, user_id) VALUES ('$ID', '$name', '$Description', '$price', '$Quantity', '$picture', '$user_ID')");
        echo"<script>window.location='UserProfile.php';</script>";
    }
?>
