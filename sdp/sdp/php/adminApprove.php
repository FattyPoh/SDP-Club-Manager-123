<?php 
    include "../api/dbConnection.php";

    if(isset($_POST['classroomLocation'])){
        $sql = "UPDATE booking SET approval = 1 WHERE classroom_location = '".$_POST['classroomLocation']."'";
        $result = mysqli_query($_SESSION['conn'],$sql);
        
        if($result === true){
            $dltSql = "DELETE FROM avaialble_room WHERE classroom_location = '".$_POST['classroomLocation']."'";
            $dltResult = mysqli_query($_SESSION['conn'],$dltSql);
        }
    }else if(isset($_POST['eventID'])){
        $eventAsql = mysqli_query($_SESSION['conn'],"UPDATE events SET approval = 1 WHERE event_ID = '".$_POST['eventID']."'");   
    }else{
        echo mysqli_error($eventAsql);
        echo mysqli_error($sql);
    }

?>