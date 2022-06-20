<!DOCTYPE html>
<html>
    <head>
        <title>Student Home Page</title>
        <?php include '../template/navbar.php';?>
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/index.css">
    </head>
    <body>
      
        <div class="content">
          <table>
            <th><h5 class="clubName"><?php echo $_SESSION['enrolledClub'] ?></h5></th>
            <td><a href="studentAnnouncement.php"><img src="../images/announcement.png" width="250" height="250">Announcement</a></td>
            <td><a href="studentEvent.php"><img src="../images/events.png" width="250" height="250">Events</a></td>
            <td><a href="studentDiscussion.php"><img src="../images/discussion.png" width="250" height="250">Discussion</a></td>
          </table>
        </div>
</body>
</html>


