
<head>
    <link rel="stylesheet" href="../CSS/ProfileStyle.css">
    <?php
    //this is a 2D Array to store the user's Products in It
    $products = array(array());
    $numberOfProducts = 0;
    $user_ID = $_COOKIE['user'];
    $pdo = new PDO("mysql:host=localhost; dbname=collegeProject", 'root', '');
    $stmt = $pdo -> prepare("SELECT * FROM products WHERE user_id = $user_ID");
    $stmt -> execute();
    $row = $stmt -> fetch();
    do
    {
        $product = array();
        $product[] = $row[0];
        $product[] = $row[1];
        $product[] = $row[2];
        $product[] = $row[3];
        $product[] = $row[4];
        $product[] = $row[5];
        $product[] = $row[6];
        $products[$numberOfProducts] = $product;
        $numberOfProducts++;
    }
    while($row = $stmt -> fetch());
 ?>
</head>

<?php
    if (isset($_POST['RemoveProductButton']))
    {
        $productID = $_POST['RemoveProductButton'];
        $quantity = (int)$_POST['QuantityToRemove'];
        if($quantity == "")
            echo "<script>alert('Enter Quantity to be removed');</script>";

        else
        {
            RemoveProduct($productID, $quantity);
        }
    }

    if(!isset($_POST['EditProductButton']))
    {
        echo "<center>";
        if($products[0][1]  == "")
        {
            return;
        }
        echo "<hr>";
        echo "<pre style = font-size:24px> Your Products </pre>";
        for ($i = 0; $i < $numberOfProducts; $i++)
        {
            $ID = $products[$i][0];
            $name = $products[$i][1];
            $Description = $products[$i][2];
            $quantity = $products[$i][3];
            $price = $products[$i][4];
            $picture = $products[$i][5];
            $user_id = $products[$i][6];

            if($i != 0)
                echo "--------------------------------";
            echo "<table class='PROFILEProductsTable'>";
            echo "<tr>";
            echo'<td><img src='.$picture.'></td>';
            echo "<td>";
            echo'<ul class="ULPROFILEUSER">';
            echo'<li class="LIPROFILE">'.$quantity.' In Stock'.'</li>';
            echo'<li class="LIPROFILEPRODUCTNAME">'.$name.'</li>';
            echo'<li class="LIPROFILE">'.$price.'LE</li>';
            echo'<li class="LIPROFILE"> '.$Description.'</li>';
            echo "----<br>";
            echo "<form method='post'>";
            echo "<li><button type='submit' value=".$ID." name='EditProductButton' class='EditProductButtonProfile'>Edit Product</button></li>";
            echo "<li><li>";
            echo "<li><button type='submit' value=".$ID." name='RemoveProductButton' class='RemoveProductButtonProfile'>Remove Product</button> <input type='number' name='QuantityToRemove' placeholder='Quantity To Remove'></li>";
            echo "</form>";
            echo'</ul>';
            echo"</td>";
            echo "</tr>";
            echo "</table>";
        }
        echo "</center>";
    }

    else
    {
        $productID = $_POST['EditProductButton'];
        echo "<center>";
        if($products[0][1]  == "")
        {
            return;
        }
        echo "<hr>";
        echo "<pre style = font-size:24px> Your Products </pre>";
        for ($i = 0; $i < $numberOfProducts; $i++)
        {
            $ID = $products[$i][0];
            $name = $products[$i][1];
            $Description = $products[$i][2];
            $quantity = $products[$i][3];
            $price = $products[$i][4];
            $picture = $products[$i][5];
            $user_id = $products[$i][6];

            if($i != 0)
                echo "--------------------------------";
            if($ID != $productID)
            {
                echo "<table class='PROFILEProductsTable'>";
                echo "<tr>";
                echo'<td><img src='.$picture.'></td>';
                echo "<td>";
                echo'<ul class="ULPROFILEUSER">';
                echo'<li class="LIPROFILE">'.$quantity.' In Stock'.'</li>';
                echo'<li class="LIPROFILEPRODUCTNAME">'.$name.'</li>';
                echo'<li class="LIPROFILE">'.$price.'LE</li>';
                echo'<li class="LIPROFILE"> '.$Description.'</li>';
                echo "----<br>";
                echo "<form method='post'>";
                echo "<li><button type='submit' value=".$ID." name='EditProductButton' class='EditProductButtonProfile'>Edit Product</button></li>";
                echo "<li><li>";
                echo "<li><button type='submit' value=".$ID." name='RemoveProductButton' class='RemoveProductButtonProfile'>Remove Product</button> <input type='number' name='QuantityToRemove' placeholder='Quantity To Remove'></li>";
                echo "</form>";
                echo'</ul>';
                echo"</td>";
                echo "</tr>";
                echo "</table>";
            }
            else
            {
                echo "<table class='PROFILEProductsTable'>";
                echo "<tr>";
                echo'<td><img src='.$picture.'></td>';
                echo "<td>";
                echo "<form method='post'>";
                echo'<ul class="ULPROFILEUSER">';
                echo'<li class="LIPROFILE">'.'Quantity : <input type="number" value='.$quantity.' class="EditProductInput" name="EditProductQuantity">'.'</li>';
                echo'<li class="LIPROFILE">'.'Name : <input type="text" value='.$name.' class="EditProductInput" name="EditProductName">'.'</li>';
                echo'<li class="LIPROFILE">'.'Price : <input type="number" value='.$price.' class="EditProductInput" name="EditProductPrice">'.'</li>';
                echo'<li class="LIPROFILE">'.'Picture : <input type="text" value='.$picture.' class="EditProductInput" name="EditProductPicture">'.'</li>';
                echo'<li class="LIPROFILE"> '.'Description : <textarea class="ProductDescription" name="EditProductDescription" rows="8" cols="80" placeholder="Product Description (Optional)">'.$Description.'</textarea>'.'</li>';
                echo "----<br>";
                echo "<li><button type='submit' value=".$ID." name='DoneEditingProductProfile' class='EditProductButtonProfile'>DONE EDITING</button></li>";
                echo "<li><li>";
                echo "</form>";
                echo'</ul>';
                echo"</td>";
                echo "</tr>";
                echo "</table>";
            }
        }
        echo "</center>";
    }
?>

<?php

    function RemoveProduct($productID, $quantity)
    {
        $pdo = new PDO("mysql:host=localhost; dbname=collegeProject", 'root', '');
        $quantity = (int)$quantity;
        $pdo -> exec("UPDATE products SET Quantity = Quantity - $quantity WHERE ID = $productID");
        $stmt = $pdo -> prepare("SELECT Quantity From products WHERE ID = $productID");
        $stmt -> execute();
        $row = $stmt -> fetch();
        $quantity = (int)$row[0];

        if($quantity <= 0)
        {
            $pdo -> exec("DELETE FROM products WHERE ID = $productID");
        }
        echo "<script>window.location='UserProfile.php';</script>";
    }

    if(isset($_POST['DoneEditingProductProfile']))
    {
        $pdo = new PDO("mysql:host=localhost; dbname=collegeProject", 'root', '');
        $productID = $_POST['DoneEditingProductProfile'];
        $quantity = $_POST['EditProductQuantity'];
        $name = $_POST['EditProductName'];
        $price = $_POST['EditProductPrice'];
        $picture = $_POST['EditProductPicture'];
        $description = $_POST['EditProductDescription'];
        $pdo -> exec("UPDATE products SET Name = '$name', Quantity = $quantity, Price = $price, ProductPicture = '$picture', Description = '$description' WHERE ID = $productID");
        echo "<script>window.location='UserProfile.php'</script>";
    }
?>
