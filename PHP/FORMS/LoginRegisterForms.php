<!DOCTYPE html>
<html>
    <head>
         <link rel="stylesheet" href="../CSS/LoginRegisterStyle.css">
    </head>

    <body>
        <ul class="login_register_list">
            <li class="login_register_list_item">
                <div class="divlogin">
                    <span style="font-size:20px; color:blue">REGISTER</span>
                    <form method="post">
                        <ul class="list">
                            <li class = "list"><span id="firstNameRegSpan" style="color:red"></span><input class="divTexts" type="text" name="FirstNameReg" placeholder="Enter Your First Name"> </li>
                            <li class = "list"><span id="lastNameRegSpan" style="color:red"></span><input class="divTexts" type="text" name="LastNameReg" placeholder="Enter Your Last Name"> </li>
                            <li class = "list"><span id="passwordRegSpan" style="color:red"></span><input class="divTexts" type="password" name="PasswordReg" placeholder="Enter Your Password"> </li>
                            <li class = "list"><span id="emailRegSpan" style="color:red"></span><input class="divTexts" type="text" name="emailReg" placeholder="Enter Your E-MAIL"> </li>
                            <li class = "list"><span id="phonenumberRegSpan" style="color:red"></span><input class="divTexts" type="text" name="phonenumberReg" placeholder="PhoneNumber (Optional)"> </li>
                            <li> <input class="divRegisterButton" type="submit" name="Register" value="Create New Account"> </li>
                        </ul>
                    </form>
                </div>
            </li>
            <li class="login_register_list_item">
            </li>
            <li class="login_register_list_item">
                <div class="divLogin">
                    <span style="font-size:20px; color:blue">LOG IN</span>
                    <form method="post">
                        <ul class="list">
                            <li class = "list"><span id="EmailLogSpan" style="color:red"></span><input class="divTexts" type="text" name="EmailLog" placeholder="Enter Your Email"> </li>
                            <li class = "list"><span id="passwordLogSpan" style="color:red"></span><input class="divTexts" type="password" name="PasswordLog" placeholder="Enter Your Password"> </li>
                            <li> <input class="divLoginButton" type="submit" name="Login" value="Login"> </li>
                            <li> <span id="LoginStat" style="color:red"></span> </li>
                        </ul>
                    </form>
                </div>
            </li>
        </ul>
    </body>
</html>
