<?php
include '../template/comNavbar.php';
include '../api/dbConnection.php';

$noReplySql = "SELECT * FROM feedback WHERE committee_replies IS NULL AND club_name = '".$_SESSION['comClubName']."'";
$result = mysqli_query($_SESSION["conn"], $noReplySql);

$repliedSql = "SELECT * FROM feedback WHERE committee_replies IS NOT NULL AND club_name = '".$_SESSION['comClubName']."'";
$results = mysqli_query($_SESSION["conn"], $repliedSql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Committee Feedback Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
  *{
      font-family:'Poppins';
  }
  html{
    overflow:scroll;
  }
  header{
    position:absolute;
  }
  h1 a{
    position:absolute;
    margin-top:1.6%;
  }
  body{
    background-color:rgb(94, 75, 190);
  }
  .container{
    position:absolute;
    left:13%;
    top:18%;
    background-color:white;
    border-radius: 10px;
    padding:30px;
  }
  h2{
    color:rgb(94, 75, 190);
    font-family:'Poppins';
    font-size: 40px;
  }
  h5{
      font-size:35px;
      font-weight:bold;
      margin-top:9.7px;
  }
  #admin_reply{
      width:100%;
      border:none;
      outline:none;
      border-bottom:1px solid rgb(94, 75, 190);
  }
  #admin_reply:hover{
    border-bottom:2px solid rgb(94, 75, 190);
    transform: translateY(2px);
    transition: transform 250ms;
}
hr{
    height:1px;
    background-color:  rgb(165, 153, 223);
}
#reply-btn{
  display:none;
}

</style>
<body>
<div class="container">
  <h2>Student's Feedback</h2>      
  <table class="table">
    <thead>
      <tr>
        <th>Feedback ID</th>
        <th>Student Name</th>
        <th>Feedback</th>
        <th>Admin Replies</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    
    <?php
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        $replies = $row['admin_replies'];
        if ($row['admin_replies'] === null){
          $replies = "-";
        }else{
          $replies = $row['admin_replies'];
        }
          ?>
          <tr>
            <td><?php echo $row["feedback_ID"]?></td>
            <td><?php echo $row["student_name"]?></td>
            <td><?php echo $row["feedback_text"]?></td>
            <td><?php echo $replies?></td>
            <td><a href="comReplyFeedback.php?feedbackID=<?php echo $row["feedback_ID"]?>" class="btn btn-primary">Reply</a></td>
          </tr>
          
          <?php
      }
    } else {
      echo "No Any Feedback yet.";
    }

?>

</tbody>
  </table>
  <hr>
  <h2>Replied Feedback</h2>  
  <table class="table">
    <thead>
      <tr>
        <th>Feedback ID</th>
        <th>Student Name</th>
        <th>Feedback</th>
        <th>Committee Replies</th>
        <th>Admin Replies</th>
      </tr>
    </thead>
    <tbody>
    
<?php
if (mysqli_num_rows($results) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($results)) {
    $replies = $row['admin_replies'];
    if ($row['admin_replies'] === null){
      $replies = "-";
    }else{
      $replies = $row['admin_replies'];
    }
      ?>
        <tr>
          <td><?php echo $row["feedback_ID"]?></td>
          <td><?php echo $row["student_name"]?></td>
          <td><?php echo $row["feedback_text"]?></td>
          <td><?php echo $row["committee_replies"]?></td>
          <td><?php echo $replies?></td>
        </tr>
      <?php
  }
} else {
  echo "No Any Feedback yet.";
}

?>

</tbody>
  </table>
</div>

</body>
</html>