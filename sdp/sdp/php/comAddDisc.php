<?php 
    include "../api/crudHandler.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Discussion Board</title>
        <?php include '../template/comNavbar.php';?>
        <link rel="stylesheet" href="../css/form.css">
    </head>
    <body>
        <form method="post">
        <div class="box" style="height:400px">
            <div class="content">
                <h2>Create New Discussion Board</h2>
                <div class="field">
                <h3>PLEASE ENTER THE BOARD TITLE TO CREATE NEW DISCUSSION BOARD.</h3><br>
                <hr><br>
                <h3>Board Title</h3>
                <input type="text" name="boardTitle"></input><br></br>
                <input type="submit" class="send-btn" value="Create"></input>
            </div>
        </div>
        </form>
    </body>
</html>
<?php 
    if(isset($_POST["boardTitle"])){
        echo comCreateDiscussionBoard($_POST["boardTitle"]);
    }
?>

