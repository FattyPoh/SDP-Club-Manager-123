<?php 
   include '../api/crudHandler.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Student Profile</title>
        <?php include '../template/navbar.php';?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/studentProfile.css">
    </head>

    <body>
    <?php 

    echo '
    <form method="post">
    <div class="profile">
        <div class="leftbox">
              <img src="../images/student.png"  width="170" height="170">
        </div>
            <div class="form">
               <h1 class="h1">Profile Details</h1>
               <h2>Student ID</h2>
            <div class="fixed" name="studentID">
               '.$_SESSION['studentID'].'
            </div>
               <h2>Email</h2>
            <div class="change"><input type = "text" name="email" id="email" value = 
               "'.$_SESSION['email'].'">
            </div>
                <h2>Enrolled Club</h2>
            <div class="fixed" name="club_enrolled" id="club_enrolled">
               '.$_SESSION['enrolledClub'].'
            </div>
               <h2>Username</h2>
            <div class="change"><input type = "text" name="username" id="username" value = 
               "'.$_SESSION['studentUsername'].'">
            </div>
               <h2>Name</h2>
            <div class="change"><input type = "text" name="name" id="name" value = 
               "'.$_SESSION['studentName'].'">
            </div>
               <button type ="button" class="edit" id="save-btn">Save Changes</button>
    </div>
    </form>'
    ?>
    </body>

      <script>
         $('button').click(function(){
         Oname = document.getElementById("name").value;
         Ousername = document.getElementById("username").value;
         Oemail = document.getElementById("email").value; 
         $.ajax({
            url: "editProfile.php",
            method: "POST",
            data: { name: Oname, email: Oemail, username: Ousername },
            success: function (result) {
               alert("Profile Changed")
               window.location = 'studentProfile.php';
            }
         })
      });
      </script>  
     
</html>




