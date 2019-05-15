<script>
    function notLogged()
    {
        document.getElementById('LoginStatItem').innerHTML = "<a href='../PHP/LoginRegister.php'>Login | Register</a>";
    }

    function logged(userFirstName, numberOfNotfications)
    {
        document.getElementById('LoginStatItem').innerHTML = "<a href='../PHP/UserProfile.php'>" + userFirstName + "</a>";
        document.getElementById("navbaritemLogOut").innerHTML = "<a href='LogOut.php'> SignOut </a>";
        document.getElementById("navbaritemNotfications").innerHTML = "<a href='../PHP/NotficationsPage.php'>Notfications (" + numberOfNotfications + ") </a>";
    }

    function ShowManagePageButton()
    {
        document.getElementById('navbaritemPageManagement').innerHTML = "<a href='../PHP/ManagePage.php'>" + 'ManageSite' + "</a>";
    }
</script>
