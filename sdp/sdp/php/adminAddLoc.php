<!DOCTYPE html>
<html>
    <head>
        <title>Add Available Classroom</title>
        <?php include '../template/adminNavbar.php';?>
        <link rel="stylesheet" href="../css/form.css">
    </head>
    <body>
        <form method="post">
        <div class="box" style="height:500px">
            <div class="content">
                <h2>Adding Available Classroom</h2>
                <div class="field">
                <h3>PLEASE COMPLETE THE FORM TO ADD NEW AVAILABLE CLASSROOM.</h3><br>
                <hr><br>
                <h3>Classroom Name</h3>
                <input name="cName" type="text" id=""></input><br><br>
                <h3>Classroom Location</h3>
                <input name="cLoc" type="text" id=""></input><br><br>
                <input type="submit" class="send-btn" value="Add"></input>
            </div>
        </div>
        </form>
    </body>
</html>
<?php
    include '../api/crudHandler.php';
    if (isset($_POST["cName"]) && (isset($_POST["cLoc"]))) {
        echo adminAddClassroom($_POST["cName"], $_POST["cLoc"]);
        return;
    }
?>
