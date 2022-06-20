<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Committee Homepage</title>
    <?php include '../template/comNavbar.php';?>
    <link rel="stylesheet" href="../css/Homepage.css">
 
</head>
<body>
    <section class="container">
        <div class="card">
            <div class="card-image card-1"></div>
            <h2>CLASSROOM BOOKING</h2>
            <p>Display Available Classrom</p>
            <a href="../php/comBooking.php">BOOK</a>
        </div>
        <div class="card">
            <div class="card-image card-2"></div>
            <h2>UPDATE CLUB</h2>
            <p>Update Club Details</p>
            <a href="../php/comClub.php">UPDATE</a>
        </div>
        <div class="card">
            <div class="card-image card-3"></div>
            <h2>EVENT</h2>
            <p>Organising New Event</p>
            <a href="../php/comEvent.php">ORGANISE</a>
        </div>
        <div class="card">
            <div class="card-image card-4"></div>
            <h2>ANNOUNCEMENT</h2>
            <p>Publish Announcement</p>
            <a href="../php/comAnnouncement.php">PUBLISH</a>
        </div>
        <div class="card">
            <div class="card-image card-5"></div>
            <h2>FEEDBACK</h2>
            <p>Reply Student's Feedback</p>
            <a href="../php/comFeedback.php">REPLY</a>
        </div>    
    </section>
</body>