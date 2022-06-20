<?php
include '../template/adminNavbar.php';
include '../api/dbConnection.php';

$sql = "SELECT * FROM booking WHERE approval = 0";


$result = mysqli_query($_SESSION["conn"], $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Requested Booking</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
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
</style>
<body>
<div class="container">
  <h2>Location Booking Request</h2>      
  <table class="table">
    <thead>
      <tr>
        <th>Booking ID</th>
        <th>Classroom Name</th>
        <th>Classroom Location</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    
<?php
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
      ?>
      <tr>
        <td><?php echo $row["booking_id"]?></td>
        <td><?php echo $row["classroom_name"]?></td>
        <td><?php echo $row["classroom_location"]?></td>
        <td>
            <!-- Set the button id to classroom location for ajax to obtain later -->
            <label class="btn btn-success" id='<?php echo $row["classroom_location"]?>'>Approve</label> 
             <!-- Set the button id to classroom location for ajax to obtain later -->
            <button class="btn btn-danger" id='<?php echo $row["classroom_location"]?>'>Reject</button>
        </td>
      </tr>
      
      <?php
  }
} else {
  echo "No Any Booking Request yet.";
}

?>

</tbody>
  </table>
</div>

</body>
<script> 
$(document).ready(function(){
    //get the value from html label 
    $('label').click(function(){
      //set variable to get the value from the id in label
      c_l = $(this).attr('id')
          $.ajax({
          //passthe variable to adminApprove.php to process the data
          url: "adminApprove.php",
          //use $_POST method to pass variable
          method:'post',
          //assign $_POST['classroomLocation'] to the value got from the label
          data:{classroomLocation:c_l},
          //if success alert message and redirect to another page
          success: function(result){
            alert("Booking Approved!")
            window.location = "adminApproveLoc.php"},
          error: function(result){
            //if error alert message
            alert("Please try again!")
          }
    });

    })
})

$(document).ready(function(){
    //get the value from html button 
    $('button').click(function(){
  c_rl = $(this).attr('id')
        $.ajax({
        url: "adminReject.php",
        method:'post',
        data:{classroomLocation:c_rl},
        success: function(result){
          alert("Booking Rejected")
          window.location = "adminApproveLoc.php"},
        error: function(result){
          alert("Please try again!")
        }
  });

    })
})
</script>
</html>