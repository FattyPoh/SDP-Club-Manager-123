<?php
    include '../api/crudHandler.php';
    if (isset($_POST["cName"])) {
        adminNewClub($_POST["cName"], $_POST["cDesc"], $_POST["cCName"], $_POST["cCPassword"]);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Create New Club</title>
        <?php include '../template/adminNavbar.php';?>
        <link rel="stylesheet" href="../css/form.css">
    </head>
    <body>
        <form method="post">
        <div class="box" style="height:680px">
            <div class="content">
                <h2>Create New Club</h2>
                <div class="field">
                <h3>PLEASE COMPLETE THE FORM TO CREATE A NEW CLUB.</h3><br>
                <hr><br>
                <h3>Club Name</h3>
                <input name="cName" type="text" id=""></input><br></br>
                <h3>Club Description</h3>
                <textarea name="cDesc"rows="5" cols="124" id=""></textarea><br></br>
                <h3>Committee Username</h3>
                <input name="cCName" type="text" id=""></input><br></br>
                <h3>Password</h3>
                <input name="cCPassword" type="password" id=""></input>
                <input type="submit" class="send-btn" value="CREATE"></input>
                </div>
            </div>
        </div>
        </form>
    </body>
</html>


