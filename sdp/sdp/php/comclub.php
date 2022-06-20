<?php
include '../template/comNavbar.php';
include '../api/dbConnection.php';

$sql = "SELECT * FROM club WHERE club_id ='".$_SESSION['committeeClubID']."'";
$result = mysqli_query($_SESSION["conn"], $sql);

$row = $result -> fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Manage Club</title>
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
    background-color:white;
  }
  .left-panel{
    height:590px;
    width:200px;
    background-color:rgb(94, 75, 190);
    position:absolute;
    left:23%;
    top:16%;
    border-radius:10px; 
    z-index:10;
    box-shadow: 3px 3px 10px
      rgba(119,119,119,.5);
}
  .container{
    position:absolute;
    left:35%;
    top:20%;
    height:560px;
    background-color:white;
    border-radius: 10px;
    padding:30px;
    width:40%;
    box-shadow: 3px 3px 10px
    rgba(119,119,119,.5);
  }
  h2{
    color:rgb(94, 75, 190);
    font-family:'Poppins';
    font-size: 35px;
    font-weight:bold;
  }
  h5{
    font-size:35px;
    font-weight:bold;
    margin-top:9.7px;
  }
  .field{
    color: grey;
    font-size:20px;
    font-weight:bold;
    margin-top:20px;
    text-transform: uppercase;
  }
  input{
    margin-left:10px;
    margin-top:10px;
    height:30px;
    width:90%;
    border:none;
    border-bottom: 2px solid rgb(165, 153, 223);
    margin-top:30px;
    background-color: transparent;
    font-size: 20px;
    resize: none;
    outline: none;   
  }
  input:hover{
    border-bottom:2px solid rgb(94, 75, 190);
    transform: translateY(2px);
    transition: transform 250ms;
  }
  button{
    float:right;
    padding: 7px 10px;
    background-color:rgb(94, 75, 190);
    color:white;
    font-family:'Poppins';
    border:none;
    border-radius:10px;
  }
  button:hover{
    background-color:white;
    color:rgb(94, 75, 190);
    transform: scale(1.05);
    transition: all 1s ease;
    border:1px solid rgb(94, 75, 190);
  }
  .img{
    margin-top:10px;
  }
table,th,td{
  width:100%;
  padding:5px;
  font-family:"Robotto",sans-serif;
}
.fixed{
  border-bottom: 1px solid  rgb(94, 75, 190);
  font-size: 22px;
}
.input{
  font-size:18px;
  width:100%;
  margin:0 auto;
  font-family:'Poppins';
  resize:none;
}
</style>
<?php 

echo'
<body>
  <div class="left-panel">
    <div class="img">
    <img src="../images/club.png"  width="200" height="200">
    </div>
  </div>
  <div class="container">
    <h2>'.$row['club_name'].'</h2>
    <table class="field">
    <tbody>
      <tr>
      <th>Club Id</th>
      </tr>
      <tr>
      <th class="fixed">'.$row['club_ID'].'</th> 
      </tr>
      <tr>
      <th>Club Name</th>
      </tr>
      <tr>
      <th class="fixed">'.$row['club_name'].'</th>
      </tr>
      </tr>
      <tr>
      <th>Club Member</th>
      </tr>
      <tr>
      <th class="fixed">'.$row['club_member_count'].'</th>
      </tr>
      <tr>
      <th>Club Description</th>
      </tr>
      <tr>
      <td><textarea class="input" id="desc" rows="4" cols="52">'.$row['club_desc'].'</textarea></td>
      </tr>
    <tbody>
    </table>
    <button type="button">UPDATE</button>
  </div>'
  ?>
</body>

<script>
    $('button').click(function(){
    c_desc = document.getElementById("desc").value;
    $.ajax({
      url: "editClub.php",
      method: "POST",
      data: { desc: c_desc },
      success: function (result) {
          alert("Description Changed")
          window.location = 'comClub.php';
      }
    })
});
</script>  
</html>


