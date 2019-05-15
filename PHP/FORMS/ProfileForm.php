<html>
    <head>
        <link rel="stylesheet" href="../CSS/ProfileStyle.css">
        <script type="text/javascript">
            document.getElementById("LoginStatItem").innerHTML = "";
        </script>
        <?php
            $userInfos = GetUserInfromationProfile();
            function GetUserInfromationProfile()
            {
                $pdo = new PDO("mysql:host=localhost; dbname=collegeProject", 'root', '');
                $ID = $_COOKIE['user'];
                $stmt = "SELECT * FROM users WHERE ID = $ID";
                $stmt = $pdo -> prepare($stmt);
                $stmt -> execute();

                $row = $stmt -> fetch();
                $userInfo = array();
                $userInfo[] = $row[1];
                $userInfo[] = $row[2];
                $userInfo[] = $row[3];
                $userInfo[] = $row[4];
                $userInfo[] = $row[5];
                $userInfo[] = $row[6];
                return $userInfo;
            }
        ?>
    </head>
    <body>
        <center>
        <div class = "divProfile">
            <ul>
                <li class="userInfoItem"> <img src="<?php echo $userInfos[5];?>"/> </li>
                <li>
                    <li>
                        <li class="userInfoItem">
                            <?php echo $userInfos[0]." ".$userInfos[1];?>
                        </li>

                        <li class="userInfoItem">
                            <?php echo $userInfos[3];?>
                        </li

                        <li class="userInfoItem">
                            <?php echo $userInfos[4] ?>
                        </li>
                    </li>
                </li>
            </ul>
        </div>
        <hr>
        <div class="AddProductDiv">
            <form class="SubmitProductForm" method="post">
                <table class="AddProductTable">
                    <tr>
                        <td class="AddProductDivItem"><span style="font-size:22px; font-family:monospace;">Add Product</span></td>
                    </tr>
                    <tr>
                        <td class="AddProductDivItem"> <span id="ProductNameSpan" style="color:red"> </span><input type="text" name="ProductName" placeholder="Product Name" class="inputType"> </td>
                        <td class="AddProductDivItem"> <span id="ProductQuantitySpan" style="color:red"> </span><input type="number" name="ProductQuantity" placeholder="Product Quantity" class="inputType"> </td>
                        <td class="AddProductDivItem"> <span id="ProductPriceSpan" style="color:red"> </span><input type="number" name="ProductPrice" placeholder="Product Price" class="inputType"> </td>
                    </tr>
                    <tr>
                        <td> <span id="ProductPictureSpan" style="color:red"> </span><input type="text" name="ProductPicture" placeholder="Product Picture (URL)" class="ProductPictureClass"> </td>
                    </tr>
                    <tr>
                        <td> <textarea class="ProductDescription" name="ProductDescription" rows="8" cols="80" placeholder="Product Description (Optional)"></textarea> </td>
                    </tr>
                    <tr>
                        <td> <input type="submit" class="SubmitProductButton" name="SubmitProduct" value="ADD PRODUCT"> </td>
                    </tr>
                </table>
            </form>
        </div>
    </center>
    </body>
</html>
