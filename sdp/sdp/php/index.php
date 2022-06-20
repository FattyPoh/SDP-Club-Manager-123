<?php
  include '../template/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Index</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<style>
  h1 a{
    position:absolute;
    top:3.5%;
  }
  h2{
    position:absolute;
    left:33%;
    color:rgb(94, 75, 190);
  }
  table{
    border-spacing:100px;
  }
  td a{
    text-decoration:none;
    font-size:15px;
    font-weight:bold;
  }
</style>
<body>
<div class="content">
          <h2>Welcome to ClubManager123</h2>
          <table>
            <td><a href="studentLogin.php"><img src="../images/student.png" width="250" height="250">Student</a></td>
            <td><a href="adminLogin.php"><img src="../images/admin.png" width="250" height="250">Admin</a></td>
            <td><a href="committeeLogin.php"><img src="../images/committee.png" width="250" height="250">Committee</a></td>
          </table>
        </div>
</body>
</html>