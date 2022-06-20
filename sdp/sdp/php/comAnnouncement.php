<!DOCTYPE html>
<html>
    <head>
        <title>Add Announcement</title>
        <?php include '../template/comNavbar.php';?>
        <link rel="stylesheet" href="../css/form.css">
    </head>
    <body>
        <form method="post">
        <div class="box" style="height:500px">
            <div class="content">
                <h2>Add Announcement</h2>
                <div class="field">
                <h3>PLEASE COMPLETE THE FORM TO PUBLISH ANNOUNCEMENT.</h3><br>
                <hr><br>
                <h3>Announcement Title</h3>
                <input name="AnncName" type="text" id=""></input><br></br>
                <h3>Announcement Details</h3>
                <textarea name="AnncDesc" type="text" id="" rows="5" cols="125"></textarea><br></br>
                <input type="submit" class="send-btn" value="Publish"></input>
            </div>
        </div>
        </form>
    </body>
</html>
<?php

    include '../api/crudHandler.php';
    if (isset($_POST['AnncName']) && $_POST['AnncDesc']) {
        echo comCreateAnnc($_POST['AnncName'], $_POST['AnncDesc']);
    };

?>