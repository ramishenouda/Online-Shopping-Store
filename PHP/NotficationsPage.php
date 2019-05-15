<html>
    <head>
        <link rel="stylesheet" href="../CSS/NotficationsPageStyle.css">
        <title>Notfications</title>
            <?php
                require_once "FORMS/NavBarFORM.php";
             ?>
    </head>
    <?php
    //this is a 2D Array to store the user's Products in It
    $notfications = array(array());
    $numberOfNotfications = 0;
    $pdo = new PDO("mysql:host=localhost; dbname=collegeProject", 'root', '');
    $user_ID = $_COOKIE['user'];
    $stmt = $pdo -> prepare("SELECT * FROM notfications WHERE user_id = $user_ID");
    $stmt -> execute();
    $row = $stmt -> fetch();
    do
    {
        $notfication = array();
        $notfication[] = $row[0];
        $notfication[] = $row[1];
        $notfication[] = $row[2];

        $notfications[$numberOfNotfications] = $notfication;
        $numberOfNotfications++;
    }
    while($row = $stmt -> fetch());
    ?>
</html>

<?php
    if($notfications[0][1]  == "")
    {
        return;
    }
    echo "<div class='divNotficationPage'>";
    for ($i = 0; $i < $numberOfNotfications; $i++)
    {
        $ID = $notfications[$i][0];
        $notficationMessage = $notfications[$i][1];
        $user_id = $notfications[$i][2];

        echo "<center>";
        if($i != 0)
            echo "---------------------------------";
        echo "<table class='NotficationsPageTable'>";
        echo "<tr>";
        echo "<td>";
        echo'<ul class="UlNotficationsPage">';
        echo "<form method='post'>";
        echo'<li class="LiNotficationsPage">'.$notficationMessage."<button type='submit' value='$ID' name='RemoveNotficationButton' class='DeleteNotficationButton'>Remove</button></li>";
        echo "</form>";
        echo'</ul>';
        echo"</td>";
        echo "</tr>";
        echo "</table>";
        echo "</center>";
    }
    echo "</div>";

    if (isset($_POST['RemoveNotficationButton']))
    {
        $ID = $_POST['RemoveNotficationButton'];
        DeleteNotfication($ID);
    }

    function DeleteNotfication($notficationID)
    {
        $pdo = new PDO("mysql:host=localhost; dbname=collegeProject", 'root', '');
        $pdo -> exec("DELETE FROM notfications WHERE ID = '$notficationID'");
        echo"<script> window.location='NotficationsPage.php';</script>";
    }
?>
