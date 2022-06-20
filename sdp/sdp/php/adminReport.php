<?php
    include '../api/dbConnection.php';
    $clubSql = "SELECT club_id, club_name, club_member_count FROM club";
    $clubResult = mysqli_query($_SESSION["conn"],$clubSql);

    $bookingSql = "SELECT booking_id, classroom_name, classroom_location, club_name FROM booking WHERE approval != 0";
    $bookingResult = mysqli_query($_SESSION["conn"],$bookingSql);

    $eventSql = "SELECT event_ID, event_name, club_name, start_date, end_date, time FROM events WHERE approval != 0 ";
    $eventResult = mysqli_query($_SESSION["conn"],$eventSql);
?>

<!DOCTYPE html>
<head>
    <title>ClubManager123 Report</title>
    <link rel="stylesheet" href="../css/report.css">
</head>
<body>
    <button class="back-btn" onclick="history.back()">Back</button>
    <div class="content">
    <p><span id='date-time'></span></p><br><br></br>
    <img src="../images/logo.png"  width="170" height="45">
    <div class="title">
    <br><h1>ClubManager123 Report<h1>
    </div>
    <div class="container">
    <table class="table">
        <thead>
        <br><a>Existing Clubs & Society</a><br></br>
        <tr>
            <th>Club ID</th>
            <th>Club Name</th>
            <th>Club Member Count</th>
        </tr>
    </thead>
    
    <tbody>
    <?php 
    if (mysqli_num_rows($clubResult) > 0) {
  // output data of each row
    while($row = mysqli_fetch_assoc($clubResult)) {  
    echo ' 
        <tr>
            <!-- print the value of existing club -->
            <td>'.$row['club_id'].'</td>
            <td>'.$row['club_name'].'</td>
            <td>'.$row['club_member_count'].'</td>
        </tr>';
    }
    }else{
        print "0 result";
    }
    ?>
    </tbody>
    </table>

    <table class="table">
        <thead>
        <br><a>Classroom Booking History</a><br></br>
        <tr>
            <th>Booking ID</th>
            <th>Classroom Name</th>
            <th>Classroom Location</th>
            <th>Booked by</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    if (mysqli_num_rows($bookingResult) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($bookingResult)) {
    echo 
    '
        <tr>
            <!-- print the value of classroom booking history -->
            <td>'.$row['booking_id'].'</td>
            <td>'.$row['classroom_name'].'</td>
            <td>'.$row['classroom_location'].'</td>
            <td>'.$row['club_name'].'</td>
        </tr>';
    }
    }else{
        print "No Result";
    }
    ?>

    </tbody>
    </table>

    <table class="table">
        <thead>
        <br><a>Events Summary</a><br></br>
        <tr>
            <th>Event ID</th>
            <th>Event Name</th>
            <th>Club Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>
    <?php
    if (mysqli_num_rows($eventResult) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($eventResult)) {
    echo 
    '
        <tr>
            <!-- print event summary -->
            <td>'.$row['event_ID'].'</td>
            <td>'.$row['event_name'].'</td>
            <td>'.$row['club_name'].'</td>
            <td>'.$row['start_date'].'</td>
            <td>'.$row['end_date'].'</td>
            <td>'.$row['time'].'</td>
        </tr>';
    }
    }else{
        print "No Result";
    }
    ?>
    </tbody>
    </table>
    <button class="print-btn" onclick="window.print()">Print Report</button>
    </div>   
</div> 
</body>
</html>

<script>
var dt = new Date();
document.getElementById('date-time').innerHTML=dt;
</script>