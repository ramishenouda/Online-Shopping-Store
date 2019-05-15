<script>
    function forgotPasswordLog()
    {
        document.getElementById('passwordLogSpan').innerHTML = "Password Requird : ";
    }

    function forgotUserNameLog()
    {
        document.getElementById('EmailLogSpan').innerHTML = "UserName Requird : ";
    }
</script>

<script>
    function forgotFirstNameReg()
    {
        document.getElementById('firstNameRegSpan').innerHTML = "FirstName Requird : ";
    }

    function forgotLastNameReg()
    {
        document.getElementById('lastNameRegSpan').innerHTML = "LastName Requird : ";
    }

    function forgotPasswordReg()
    {
        document.getElementById('passwordRegSpan').innerHTML = "Password Requird : ";
    }

    function forgotemailReg()
    {
        document.getElementById('emailRegSpan').innerHTML = "Email Requird : ";
    }

    function WrongPhoneNumber()
    {
        document.getElementById('phonenumberRegSpan').innerHTML = "Wrong Number : ";
    }

    function RegisterUser()
    {
        alert("Account Registration Done Successfully");
        window.location = "LoginRegister.php";
    }

    function RegistrationFaild()
    {
        window.location = "ErrorSites/faildToRegisterPage.php";
    }

    function EmailExist()
    {
        document.getElementById('emailRegSpan').innerHTML = "This Email Already Exist : ";
    }

    function PhoneExist()
    {
        document.getElementById('phonenumberRegSpan').innerHTML = "PhoneNumber Already Exist : ";
    }

</script>
