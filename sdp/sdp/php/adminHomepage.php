<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Homepage</title>
    <?php include '../template/adminNavbar.php';?>
    <link rel="stylesheet" href="../css/Homepage.css">
 
</head>
<body>
    <section class="container">
        <div class="card">
            <div class="card-image card-1"></div>
            <h2>MANAGE CLASSROOM</h2>
            <p>Manage Classroom Status</p>
            <a href="../php/adminLocation.php">MANAGE</a>
        </div>
        <div class="card">
            <div class="card-image card-3"></div>
            <h2>EVENTS REQUEST</h2>
            <p>View Pending Events</p>
            <a href="../php/adminEvent.php">VIEW</a>
        </div>
        <div class="card">
            <div class="card-image card-5"></div>
            <h2>FEEDBACK</h2>
            <p>Reply Student's Feedback</p>
            <a href="../php/adminFeedback.php">REPLY</a>
        </div>
        <div class="card">
            <div class="card-image card-10"></div>
            <h2>REPORT</h2>
            <p>Generate Report</p>
            <a href="../php/adminReport.php">GENERATE</a>
        </div>   
    </section>
</body>