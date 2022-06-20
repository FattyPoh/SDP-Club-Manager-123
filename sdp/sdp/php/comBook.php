<?php 
    session_start();
    include "../api/dbConnection.php";

    if (isset($_POST['classroomName'])){
        $classSql = "SELECT * FROM available_room WHERE classroom_name = '".$_POST['classroomName']."'";
        $classResult = mysqli_query($_SESSION['conn'],$classSql);
        $row = $classResult -> fetch_assoc();

        $classroomLocation = $row['classroom_location'];

        $sql = "INSERT INTO booking (`classroom_name`, `classroom_location`, `committee_id`, `club_id`, `club_name`, `approval`) 
        VALUES('".$_POST['classroomName']."','$classroomLocation','".$_SESSION['committeeID']."','".$_SESSION['committeeClubID']."','".$_SESSION['comClubName']."',0)";
        $result = mysqli_query($_SESSION["conn"],$sql);
        
        if($result === true){
            $updateSql = "UPDATE available_room SET pending = 1 WHERE classroom_name = '".$_POST['classroomName']."'";
            $updateResult = mysqli_query($_SESSION['conn'],$updateSql);
        }

    }
?>