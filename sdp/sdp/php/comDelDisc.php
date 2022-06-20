<?php
include '../template/comNavbar.php';
include '../api/dbConnection.php';

$sql = "SELECT * FROM discussion_board WHERE club_name = '".$_SESSION["comClubName"]."'";


$result = mysqli_query($_SESSION["conn"], $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Remove Discussion Board </title>
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
  <h2>Existing Discussion Board</h2>      
  <table class="table">
    <thead>
      <tr>
        <th>Board ID</th>
        <th>Board Title</th>
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
        <td><?php echo $row["board_ID"]?></td>
        <td><?php echo $row["board_title"]?></td>
        <td><button id='view-btn' name="<?php echo $row["board_ID"]?>" class="btn btn-danger">Delete</button></td>
      </tr>
      
      <?php
  }
} else {
  echo "0 results";
}

?>

</tbody>
  </table>
</div>

<script>
    $(document).ready(function(){
        $('button').click(function(){
        b_id = $(this).attr('name')
          $.ajax({
          url: "comDeleteBoard.php", 
          method:'post',
          data:{board_id:b_id},
          success: function(result){
            alert("Board Deleted!")
            window.location = "comDelDisc.php";
  }});
})
  })
</script>    

</body>
</html>