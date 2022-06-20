<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Classroom</title>
    <?php include '../template/adminNavbar.php';?>
    <link rel="stylesheet" href="../css/Homepage.css">
 
</head>
<body>
    <section class="container">
        <div class="card">
            <div class="card-image" style="background-image: url(../images/add-class.png)"></div>
            <h2>ADD CLASSROOM</h2>
            <p>Add Available Classroom</p>
            <a href="../php/adminAddLoc.php">ADD</a>
        </div>
        <div class="card">
            <div class="card-image card-9"></div>
            <h2>PENDING BOOKING </h2>
            <p>View Pending Booking</p>
            <a href="../php/adminApproveLoc.php">VIEW</a>
        </div>
    </section>
</body>