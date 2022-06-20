<?php
     include "../api/dbConnection.php";
     include "../api/crudHandler.php";
     include "../template/navbar.php";
     global $con;
     
     $boardid = $_GET['boardID'];
     $query = "SELECT * FROM discussion_board WHERE board_ID = '$boardid'";  
     $result = mysqli_query($con, $query);  
     $row = $result -> fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <title>Student Add Discussion</title>
     <link rel="stylesheet" href="../css/form.css">
</head>
<body>
     <?php echo'
     <div>
          <form method="post" id="form">
          <div class="box" style="height:350px">
            <div class="content">
                <h2>Adding Discussion</h2>
                <div class="field">
                <h3>PLEASE INSERT YOUR COMMENT TO ADD INTO DISCUSSION.</h3><br>
                <hr><br>
                <h3>Your Comment</h3>
               <input type="text" name="text"></input>
                </div>
                <input type="submit" class="send-btn" id="submit" value="ADD DISCUSSION"></input>
            </div>
        </div>
          </form>
     </div>';
     ?>
</body>
<?php 
    if(isset($_POST["text"]) && (isset($_GET['boardID']))){
        echo studentAddDiscussion($_POST["text"],$_GET['boardID']);
        return;
    }
?>
</html>
