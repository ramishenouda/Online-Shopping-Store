<head>
    <title>LOGIN|REGISTER</title>
    <?php
        ob_start();
        if(isset($_COOKIE['user']))
        {
            echo"<script>window.location = 'UserProfile.php'</script>";
        }
        include "FORMS/NavBarFORM.php";
        require_once "FORMS/LoginRegisterForms.php";
        require_once "../JAVASCRIPT/LoginRegisterPageJSFunctions.js";
        require_once "Functions/LoginRegisterPagePHPFunctions.php";
    ?>
    <script type="text/javascript">
        document.getElementById("SearchBox").innerHTML = "";
    </script>
</head>

<?php
    LoginCheck();
    SignUpCheck();

    function LoginCheck()
    {
        if(isset($_POST['Login']))
        {
            if(checkLogInInputs())
            {
                $userInfo = LoginUser();
                if($userInfo == 'false')
                {
                    echo "<script> alert('Check your Email And Password'); </script>";
                    return;
                }
                setcookie('user', $userInfo, time() + (86400 * 30));
                header('Location: Index.php');
                ob_end_flush();
            }
            //echo"<script> window.location = 'Index.php'; </script>";
        }
    }

    function SignUpCheck()
    {
        if(isset($_POST['Register']))
        {
            if(checkRegisterInputs() == true)
            {
                if(CheckRegisterInputsFields() == true)
                    RegisterUser();
            }
        }
    }
?>
