<!DOCTYPE html>
<html>
    <head>
        <title>Event Form</title>
        <?php include '../template/comNavbar.php';?>
        <link rel="stylesheet" href="../css/form.css">
    </head>
    <body>
        <form method="post">
        <div class="box" style="height:800px">
            <div class="content">
                <h2>Organise Event</h2>
                <div class="field">
                <h3>PLEASE COMPLETE THE FORM AND WAIT FOR APPROVAL FROM ADMIN.</h3><br>
                <hr><br>
                <h3>Event Name</h3>
                <input name="eName" type="text" id=""></input><br><br>
                <h3>Event Details</h3>
                <input name="eDetail" type="text" id=""></input><br><br>
                <h3>Start Date</h3>
                <input name="eSDate" type="date" id=""></input><br><br>
                <h3>End Date</h3>
                <input name="eEDate" type="date" id=""></input><br><br>
                <h3>Event Starting Time</h3>
                <input name="eTime" type="time" id=""></input>
                <input type="submit" class="send-btn" value="Send"></input>
            </div>
        </div>
        </form>
    </body>
</html>
<?php
    include '../api/crudHandler.php';
    if (isset($_POST["eName"])) {
        echo comCreateEvent($_POST["eName"], $_POST["eDetail"], $_POST["eSDate"], $_POST["eEDate"], $_POST["eTime"]);
    }
?>
