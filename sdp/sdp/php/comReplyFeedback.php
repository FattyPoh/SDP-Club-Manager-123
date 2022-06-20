<?php
     include "../api/dbConnection.php";
     include "../api/crudHandler.php";
     include "../template/comNavbar.php";
     global $con;

     $feedbackid = $_GET['feedbackID'];
     $query = "SELECT * FROM feedback WHERE feedback_ID = '$feedbackid'";  
     $result = mysqli_query($con, $query);  
     $row = $result -> fetch_assoc();

     $feedID = $row['feedback_ID'];
     $studentName = $row['student_name'];
     $text = $row['feedback_text'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <title>Committee Reply Feedback</title>
     <link rel="stylesheet" href="../css/fixedForm.css">
</head>
<body>
     <?php echo'
     <div>
          <form method="post" id="form">
          <div class="box" style="height:680px">
            <div class="content">
                <h2>Feedback Form</h2>
                <div class="field">
                <h3>PLEASE COMPLETE THE FORM BEFORE SUBMIT THE FEEDBACK.</h3><br>
                <hr><br>
                <h3>Feedback ID</h3>
                <div class="fixed" name="feedbackID" >'.$feedID.'</div><br>
                <h3>Student Name</h3>
                <div class="fixed" name="feedbackID" >'.$studentName.'</div><br>
                <h3>Feedback Text</h3>
                <div class="fixed" name="feedbackID" >'.$text.'</div><br>
                <h3>Your Reply</h3>
               <input type="text" name="comText"></input>
                </div>
                <input type="submit" class="send-btn" id="submit" value="SEND FEEDBACK"></input>
            </div>
        </div>
          </form>
     </div>';
     ?>
</body>
<?php 
    if(isset($_POST["comText"]) && (isset($_GET['feedbackID']))){
        echo comReplyFeedback($_POST["comText"],$_GET['feedbackID']);
        return;
    }
?>
</html>
