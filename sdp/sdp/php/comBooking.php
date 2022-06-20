<?php
include '../template/comNavbar.php';
include '../api/dbConnection.php';

$sql = "SELECT * FROM available_room WHERE pending = 0";
$result = mysqli_query($_SESSION["conn"], $sql);

$bookingStatusSql = "SELECT * FROM booking WHERE club_name = '".$_SESSION['comClubName']."'";
$bookingResult = mysqli_query($_SESSION['conn'],$bookingStatusSql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Committee Location Booking</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
    background-color: rgb(165, 153, 223);
}
</style>
<body>
<div class="container">
  <h2>Available Room </h2>      
  <table class="table">
    <thead>
      <tr>
        <th>Classroom Name</th>
        <th>Classroom Location</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    
<?php
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
      ?>
      <tr>
        <td><?php echo $row["classroom_name"]?></td>
        <td><?php echo $row["classroom_location"]?></td>
        <td><button id='<?php echo $row["classroom_name"]?>' class="btn btn-primary">Book</button></td>
      </tr>
      
      <?php
  }
} else {
  echo "No Available Classroom yet.";
}

?>

</tbody>
  </table>
  <hr>
  <h2>Booking Status </h2>      
  <table class="table">
    <thead>
      <tr>
        <th>Classroom Name</th>
        <th>Classroom Location</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
    
<?php
if (mysqli_num_rows($bookingResult) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($bookingResult)) {
      $status=$row['approval'];
      
      if ($row['approval'] == 0){
        $status = "Not Approve (Yet)";
      }else if($row['approval'] != 0){
        $status ="Approved";
      }
      ?>
      <tr>
        <td><?php echo $row["classroom_name"]?></td>
        <td><?php echo $row["classroom_location"]?></td>
        <td><?php echo $status?></td>
      </tr>
      
      <?php
  }
} else {
  echo "No Pending yet.";
}

?>

</tbody>
  </table>
  </tbody>
  </table>
</div>

<script>
$(document).ready(function(){
    $('button').click(function(){
  c_name = $(this).attr('id')
        $.ajax({
        url: "comBook.php",
        method:'post',
        data:{classroomName:c_name},
        success: function(result){
          alert("All done, wait patiently for admin to approve :)")
          window.location = "comBooking.php"},
        error: function(result){
          alert("Please try again!")
        }
  });

    })
})
</script>    

</body>
</html>