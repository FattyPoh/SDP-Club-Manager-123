<?php
include '../template/navbar.php';
include '../api/dbConnection.php';

$sql = "SELECT * FROM events WHERE approval = 1 AND club_name = '".$_SESSION['enrolledClub']."'";
$result = mysqli_query($_SESSION["conn"], $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Events  </title>
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
  <h2>Events</h2>      
  <table class="table">
    <thead>
      <tr>
        <th>Event ID</th>
        <th>Event Name</th>
        <th>Details</th>
      </tr>
    </thead>
    <tbody>
    
<?php
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
      ?>
      <tr>
        <td><?php echo $row["event_ID"]?></td>
        <td><?php echo $row["event_name"]?></td>
        <td><button id='<?php echo $row["event_ID"]?>' class="btn btn-primary">Show</button></td>
      </tr>
      
      <?php
  }
} else {
  echo "0 results";
}

mysqli_close($_SESSION["conn"]);
?>

</tbody>
  </table>
</div>

<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Event Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <td></td>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
    $('button').click(function(){
  id_event = $(this).attr('id')
        $.ajax({url: "display_Event.php",
        method:'post',
        data:{event_id:id_event},
         success: function(result){
    $(".modal-body").html(result);
  }});


        $('#myModal').modal("show");
    })
})
</script>    

</body>
</html>