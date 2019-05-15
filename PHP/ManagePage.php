<html>
    <head>
        <link rel="stylesheet" href="../CSS/ManagePageStyle.css">
        <title>MANAGE PAGE</title>
        <?php
            require_once "FORMS/NavBarFORM.php";
         ?>

         <script type="text/javascript">
             document.getElementById('SearchBox').innerHTML = "";
         </script>
         <br><br>
    </head>
    <div class="divManageSiteButtons">
        <form method="post">
            <button type="Submit" name="ShowUsersButton" class="ManageUsersButton">Manage Users</button>
            <button type="Submit" name="ShowProductsButton" class="ManageProductsButton">Manage Products</button>
        </form>
    </div>
</html>

<?php
    if(isset($_POST['ShowUsersButton']))
    {
        showUsers();
    }

    if(isset($_POST['ShowProductsButton']))
    {
        showProducts();
    }

    if(isset($_POST['EditUser']))
    {
        $id = (int)$_POST['EditUser'];
        showUsers($id);
    }

    if(isset($_POST['EditProduct']))
    {
        $id = (int)$_POST['EditProduct'];
        showProducts($id);
    }

    function showProducts($productid = -1)
    {
        $pdo = new PDO("mysql:host=localhost; dbname=collegeProject", 'root', '');
        $stmt = $pdo -> prepare("SELECT * FROM products");
        $stmt -> execute();

        echo "<form method='post'>";
        echo "<center>";
        echo "<table class='ManagePageTable'>";
        echo"<tr>";
        echo"<td class='LiManagePage'>ID</td>";
        echo"<td class='LiManagePage'>Name</td>";
        echo"<td class='LiManagePage'>Quantity</td>";
        echo"<td class='LiManagePage'>Price</td>";
        echo"<td class='LiManagePage'>PictureURL</td>";
        echo"<td class='LiManagePage'>user_id</td>";
        echo "</tr>";
        while($row = $stmt -> fetch())
        {
            if($row[0] != $productid)
            {
                echo"<tr>";
                echo"<td class='LiManagePage'>".$row[0]."</td>";
                echo"<td class='LiManagePage'>".$row[1]."</td>";
                echo"<td class='LiManagePage'>".$row[3]."</td>";
                echo"<td class='LiManagePage'>".$row[4]."</td>";
                echo"<td class='LiManagePage'>".$row[5]."</td>";
                echo"<td class='LiManagePage'>".$row[6]."</td>";
                echo"<td class='LiManagePage'>"."<button type='submit' name='EditProduct' value=".$row[0]." class='EditUserButton'>EDIT</button>"."</td>";
                echo "</tr>";
            }

            else
            {
                echo"<tr>";
                echo"<td class='LiManagePage'>"."<input type='number' value=".$row[0]." name='EditProductID'>"."</td>";
                echo"<td class='LiManagePage'>"."<input type='text' value="."$row[1]"." name='EditProductName'>"."</td>";
                echo"<td class='LiManagePage'>"."<input type='text' value=".$row[3]." name='EditProductQuantity'>"."</td>";
                echo"<td class='LiManagePage'>"."<input type='text' value=".$row[4]." name='EditProductPrice'>"."</td>";
                echo"<td class='LiManagePage'>"."<input type='text' value=".$row[5]." name='EditProductPicture'>"."</td>";

                echo"<td class='LiManagePage'>"."<button type='submit' name='DeleteProduct' value=".$row[0]." class='EditUserButton'>DELETE</button>"."</td>";
                echo"<td class='LiManagePage'>"."<button type='submit' name='EditingProduct' value=".$row[0]." class='EditUserButton'>DONE</button>"."</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
        echo "</center>";
        echo "</form>";
    }

    function showUsers($userid = -1)
    {
        $pdo = new PDO("mysql:host=localhost; dbname=collegeProject", 'root', '');
        $stmt = $pdo -> prepare("SELECT * FROM users");
        $stmt -> execute();
        echo "<form method='post'>";
        echo "<center>";
        echo "<table class='ManagePageTable'>";
        echo"<tr>";
        echo"<td class='LiManagePage'>ID</td>";
        echo"<td class='LiManagePage'>FirstName</td>";
        echo"<td class='LiManagePage'>LastName</td>";
        echo"<td class='LiManagePage'>Password</td>";
        echo"<td class='LiManagePage'>Email</td>";
        echo"<td class='LiManagePage'>PhoneNumber</td>";
        echo"<td class='LiManagePage'>PictureURL</td>";
        echo "</tr>";
        while($row = $stmt -> fetch())
        {
            if((int)$row[0] != $userid)
            {
                echo"<tr>";
                echo"<td class='LiManagePage'>".$row[0]."</td>";
                echo"<td class='LiManagePage'>".$row[1]."</td>";
                echo"<td class='LiManagePage'>".$row[2]."</td>";
                echo"<td class='LiManagePage'>".$row[3]."</td>";
                echo"<td class='LiManagePage'>".$row[4]."</td>";
                echo"<td class='LiManagePage'>".$row[5]."</td>";
                echo"<td class='LiManagePage'>".$row[6]."</td>";
                echo"<td class='LiManagePage'>"."<button type='Submit' name='EditUser' value=".$row[0]." class='EditUserButton'>EDIT USER</button>"."</td>";
                echo "</tr>";
            }

            else
            {
                echo"<tr>";
                echo"<td class='LiManagePage'>"."<input type='number' value=".$row[0]." name='EditUserID'>"."</td>";
                echo"<td class='LiManagePage'>"."<input type='text' value=".$row[1]." name='EditUserFirstName'>"."</td>";
                echo"<td class='LiManagePage'>"."<input type='text' value=".$row[2]." name='EditUserLastName'>"."</td>";
                echo"<td class='LiManagePage'>"."<input type='text' value=".$row[3]." name='EditUserPassword'>"."</td>";
                echo"<td class='LiManagePage'>"."<input type='text' value=".$row[4]." name='EditUserEmail'>"."</td>";
                if($row[5] != '')
                {
                    echo"<td class='LiManagePage'>"."<input type='text' value=".$row[5]." name='EditUserPhoneNumber'>"."</td>";
                }
                else
                    echo"<td class='LiManagePage'>"."<input type='text' name='EditUserPhoneNumber'>"."</td>";
                echo"<td class='LiManagePage'>"."<input type='text' value=".$row[6]." name='EditUserPictureURL'>"."</td>";
                echo"<td class='LiManagePage'>"."<button type='submit' name='DeleteUser' value=".$row[0]." class='EditUserButton'>DELETE</button>"."</td>";
                echo"<td class='LiManagePage'>"."<button type='submit' name='EditingUser' value=".$row[0]." class='EditUserButton'>DONE</button>"."</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
        echo "</center>";
        echo "</form>";
    }

    if(isset($_POST['EditingUser']))
    {
        $pdo = new PDO("mysql:host=localhost; dbname=collegeProject", 'root', '');
        $id = $_POST['EditingUser'];
        $FirstName = $_POST['EditUserFirstName'];
        $LastName = $_POST['EditUserLastName'];
        $Password = $_POST['EditUserPassword'];
        $email = $_POST['EditUserEmail'];
        $phonenumber = $_POST['EditUserPhoneNumber'];
        $pictureURL = $_POST['EditUserPictureURL'];
        $pdo -> exec("UPDATE users SET ID = '$id', FirstName = '$FirstName', LastName = '$LastName', Password = '$Password', Email= '$email', PhoneNumber= '$phonenumber', profilePicture = '$pictureURL' WHERE ID = '$id'");
        echo "<script> window.location = 'ManagePage.php'; </script>";
    }

    if(isset($_POST['EditingProduct']))
    {
        $pdo = new PDO("mysql:host=localhost; dbname=collegeProject", 'root', '');
        $id = $_POST['EditProductID'];
        $name = $_POST['EditProductName'];
        $quantity = $_POST['EditProductQuantity'];
        $price = $_POST['EditProductPrice'];
        $picture = $_POST['EditProductPicture'];
        $pdo -> exec("UPDATE products SET ID = '$id', Name = '$name', Quantity = '$quantity', Price = '$price', ProductPicture = '$picture' WHERE ID = '$id'");
        //echo "<script> window.location = 'ManagePage.php'; </script>";
    }

    if(isset($_POST['DeleteProduct']))
    {
        $ID = $_POST['DeleteProduct'];
        $pdo = new PDO("mysql:host=localhost; dbname=collegeProject", 'root', '');
        $pdo -> exec("DELETE FROM products WHERE ID = $ID");
    }


    if(isset($_POST['DeleteUser']))
    {
        $ID = $_POST['DeleteUser'];
        $pdo = new PDO("mysql:host=localhost; dbname=collegeProject", 'root', '');
        $pdo -> exec("DELETE FROM users WHERE ID = $ID");
    }
?>
