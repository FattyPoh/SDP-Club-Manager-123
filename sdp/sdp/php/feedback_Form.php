<?php 
    include '../api/crudHandler.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Feedback Form Page</title>
        <?php include '../template/navbar.php';?>
        <link rel="stylesheet" href="../css/form.css">
    </head>
    <body>
        <form method="post">
        <div class="box">
            <div class="content">
                <h2>Feedback Form</h2>
                <div class="field">
                <h3>PLEASE INSERT YOUR FEEDBACK INTO THE BELOW FIELD.</h3>
                <textarea rows="5" cols="124" name="text" id="feedback_field"></textarea>
                </div>
                <input type="submit" class="send-btn" id="submit" value="SEND FEEDBACK"></input>
            </div>
        </div>
        </form>
    </body>
</html>
<?php 
    if (isset($_POST['text'])){
        echo studentFeedback($_POST['text']);
        return;
    }
?>


