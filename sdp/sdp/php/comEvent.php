<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Page</title>
    <?php include '../template/comNavbar.php';?>
    <link rel="stylesheet" href="../css/Homepage.css">
 
</head>

<body>
    <section class="container">
        <div class="card">
            <div class="card-image card-9"></div>
            <h2>REQUEST STATUS</h2>
            <p>View Event Request Status</p>
            <a href="../php/comPendingEvent.php">VIEW</a>
        </div>
        <div class="card">
            <div class="card-image" style="background-image: url(../images/add-event.png)"></div>
            <h2>ORGANISE EVENT</h2>
            <p>Organise New Club Event</p>
            <a href="../php/comEventForm.php">ORGANISE</a>
        </div>  
    </section>
</body>