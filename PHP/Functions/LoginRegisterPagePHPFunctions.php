<?php
    //To Check Whether or not the inputs fields are empty
    function checkLogInInputs()
    {
        $LoginInputed = true;
        //if the User Didn't Enter A Password
        if($_POST['PasswordLog'] == "")
        {
            echo"<script> forgotPasswordLog() </script>";
            $LoginInputed = false;
        }

        //if the User Didn't Enter A UserName
        if($_POST['EmailLog'] == "")
        {
            echo"<script> forgotUserNameLog() </script>";
            $LoginInputed = false;
        }
        return $LoginInputed;
    }

    function LoginUser()
    {
        //Check Whether or not the Login Inputs Fields Are Empty
        if(checkLogInInputs() != true)
            return;
        $emailr = $_POST['EmailLog'];
        $passwordr = $_POST['PasswordLog'];
        $pdo = new PDO("mysql:host=localhost; dbname=collegeProject", 'root', '');
        $ID;
        $stmt = $pdo -> prepare("SELECT * FROM users");
        $stmt -> execute();
        $row = $stmt -> fetch();
        do
        {
            $email = $row[4];
            $password = $row[3];
            if($email == $emailr and $password == $passwordr)
            {
                $userInfo = $row[0];
                return $userInfo;
                break;
            }
        } while ($row = $stmt->fetch());

        return 'false';
    }

    function CheckRegisterInputsFields()
    {
        $isNotRegistered = true;
        $emailr = $_POST['emailReg'];
        $phonenumberr = $_POST['phonenumberReg'];
        $pdo = new PDO("mysql:host=localhost; dbname=collegeProject", 'root', '');
        $stmt = $pdo -> prepare("SELECT * FROM users");
        $stmt -> execute();
        $row = $stmt -> fetch();
        do
        {
            $email = $row[4];
            $phonenumber = $row[5];
            if($email == $emailr)
            {
                echo "<script> EmailExist() </script>";
                $isNotRegistered = false;
            }

            if($phonenumber == $phonenumberr and $phonenumber != "")
            {
                echo "<script> PhoneExist() </script>";
                $isNotRegistered = false;
            }

            if(!$isNotRegistered)
                break;

        } while ($row = $stmt -> fetch());

        return $isNotRegistered;
    }

    function checkRegisterInputs()
    {
        $RegisterInputed = true;
        if($_POST['PasswordReg'] == "")
        {
            echo"<script> forgotPasswordReg() </script>";
            $RegisterInputed = false;
        }

        if($_POST['FirstNameReg'] == "")
        {
            echo"<script> forgotFirstNameReg() </script>";
            $RegisterInputed = false;
        }

        if($_POST['LastNameReg'] == "")
        {
            echo"<script> forgotLastNameReg() </script>";
            $RegisterInputed = false;
        }


        if($_POST['emailReg'] == "")
        {
            echo"<script> forgotemailReg() </script>";
            $RegisterInputed = false;
        }

        if($_POST['phonenumberReg'] != "" and strlen($_POST['phonenumberReg']) != 11)
        {
            echo "<script>WrongPhoneNumber()</script>";
        }

        return $RegisterInputed;
    }

    function RegisterUser()
    {
        $pdo = new PDO('mysql:host=localhost; dbname=collegeProject','root', '');
        $firstName = $_POST['FirstNameReg'];
        $lastName = $_POST['LastNameReg'];
        $email = $_POST['emailReg'];
        $password = $_POST['PasswordReg'];

        $sql = "SELECT COUNT(*) FROM  users";
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute();
        $row = $stmt -> fetch();
        $phonenumber = $_POST['phonenumberReg'];
        $ID = (int)$row[0];

        $stmt = $pdo -> prepare("SELECT ID from users WHERE ID = '$ID'");
        $stmt -> execute();
        $row = $stmt -> fetch();
        $ID2 = (int)$row[0];

        while($ID == $ID2)
        {
            $ID++;
            $stmt = $pdo -> prepare("SELECT ID from users WHERE ID = '$ID'");
            $stmt -> execute();
            $row = $stmt -> fetch();
            $ID2 = (int)$row[0];
        }
        try
        {
            //$pdo -> exec("CREATE USER '$name'@'localhost' IDENTIFIED BY '$password'");
            $profilePictureUrl = "../Images/no-profile-photo.jpg";
            $stmt = $pdo -> prepare("SELECT COUNT(*) FROM Notfications");
            $stmt -> execute();
            $row = $stmt -> fetch();
            $count = (int)$row[0];
            $notficationMessage = "Welcome To Our Store (".$firstName.") You Can Now Start Buying and Selling.";

            $pdo -> exec("INSERT INTO Users (ID, FirstName, LastName, Password, Email, PhoneNumber, profilePicture) VALUES ('$ID', '$firstName', '$lastName', '$password', '$email', '$phonenumber', '$profilePictureUrl')");
            $pdo -> exec("INSERT INTO notfications(ID, NotficationMessage, user_id) VALUES ('$count', '$notficationMessage', '$ID')");

            echo"<script> RegisterUser(); </script>";
        }

        catch (PDOException $e)
        {
            RegistrationFaild();
        }
    }
?>
