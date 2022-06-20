<?php 
    include "../api/dbConnection.php";

    if(isset($_POST['classroomLocation'])){
        $dltSql = "DELETE FROM booking WHERE classroom_location = '".$_POST['classroomLocation']."'";
        $dltResult = mysqli_query($_SESSION['conn'],$dltSql);

        if($dltResult === true){
            $sql = "UPDATE available_room SET pending = 0 WHERE classroom_location = '".$_POST['classroomLocation']."'";
            $result = mysqli_query($_SESSION['conn'],$sql);
        }
    }else if(isset($_POST['eventID'])){
        $eventDltsql = mysqli_query($_SESSION['conn'],"DELETE FROM events WHERE event_ID = '".$_POST['eventID']."'");   
    }else{
        echo mysqli_error($eventDltsql);
        echo mysqli_error($dltSql);
    }

?>