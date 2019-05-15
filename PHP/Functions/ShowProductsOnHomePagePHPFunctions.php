<head>
    <script type="text/javascript">
        function BuyingComplete()
        {
            alert('Item Bought Successfully');
            window.location = 'Index.php';
        }
    </script>
    <link rel="stylesheet" href="../CSS/HomePageStyle.css">
    <?php
    //this is a 2D Array to store the user's Products in It
    $products = array(array());
    $numberOfProducts = 0;
    $pdo = new PDO("mysql:host=localhost; dbname=collegeProject", 'root', '');
    $stmt = $pdo -> prepare("SELECT * FROM products");
    $stmt -> execute();
    $confirmDeleteMessage = "return confirm('Are You Sure You Want To Buy This?')";
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
    if($products[0][1]  == "")
    {
        return;
    }
    for ($i = 0; $i < $numberOfProducts; $i++)
    {
        $ID = $products[$i][0];
        $name = $products[$i][1];
        $Description = $products[$i][2];
        $quantity = $products[$i][3];
        $price = $products[$i][4];
        $picture = $products[$i][5];
        $user_id = $products[$i][6];
        //$FavouriteButtonName = "$ID"."FavouriteButton";
        echo "<center>";
        if($i != 0)
            echo "---------------------------------";
        echo "<table class='HomePageProductsTable'>";
        echo "<tr>";
        echo'<td><img src='.$picture.'></td>';
        echo "<td>";
        echo'<ul class="UlHomePage">';
        echo'<li class="LiHomePage">'."<span style='color:red'>".$quantity."</span>".' In Stock'.'</li>';
        echo'<li class="LiHomePageProductName">'.$name.'</li>';
        echo'<li class="LiHomePage">'.$price.'LE</li>';
        echo'<li class="LiHomePage"> '.$Description.'</li>';
        echo "<form method='post'>";
        if((isset($_COOKIE['user']) and $user_id != $_COOKIE['user']))
            echo "<li><button type='submit' value=".$ID." name='BuyProductButton' class='BuyButtonHomePage'>BUY NOW</button></li>";
        else if((isset($_COOKIE['user']) and $user_id == $_COOKIE['user']))
            echo"<li class='ThisIsYourProductLI'> THIS IS YOUR PRODUCT </li>";
        else
            echo"<li class='ThisIsYourProductLI'> LOGIN TO START BUYING </li>";
        echo "</form>";
        echo'</ul>';
        echo"</td>";
        echo "</tr>";
        echo "</table>";
        echo "</center>";
    }

    if (isset($_POST['BuyProductButton']))
    {
        $user_ID = $_COOKIE['user'];
        $ID = $_POST['BuyProductButton'];

        $pdo = new PDO("mysql:host=localhost; dbname=collegeProject", 'root', '');
        $pdo -> exec("UPDATE products SET Quantity = Quantity - 1 WHERE ID = $ID");

        $stmt = $pdo -> prepare("SELECT FirstName, LastName FROM users WHERE ID = $user_ID");
        $stmt -> execute();
        $row = $stmt -> fetch();
        $BuyerName = $row[0] .' '.$row[1];

        $stmt = $pdo -> prepare("SELECT * FROM products WHERE ID = $ID");
        $stmt -> execute();
        $row = $stmt -> fetch();
        $productOwerID = $row[6];
        $productQuantity = (int)$row[3];
        $boughtProductName = $row[1];
        $stmt = $pdo -> prepare("SELECT COUNT(*) FROM Notfications");
        $stmt -> execute();
        $row = $stmt -> fetch();
        $count = (int)$row[0];

        $notficationMessage = "The User (".$BuyerName.") Bought From You ".$boughtProductName.".";
        $pdo -> exec("INSERT INTO notfications(ID, NotficationMessage, user_id) VALUES ('$count', '$notficationMessage', '$productOwerID')");
        if($productQuantity <= 0)
        {
            $notficationMessage = "The Last Stock of (".$boughtProductName.") has been sold.";
            $pdo -> exec("INSERT INTO notfications(ID, NotficationMessage, user_id) VALUES ('$count', '$notficationMessage', '$productOwerID')");
            $pdo -> exec("DELETE FROM products WHERE ID = $ID");
        }
        echo "<script>BuyingComplete();</script>";
    }
?>
