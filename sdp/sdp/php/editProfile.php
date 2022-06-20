<?php
    session_start();
    include '../api/dbConnection.php';

    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['username'])) {
        
        $changeProfileQuery = "UPDATE student SET student_name = '".$_POST['name']."', student_email = '".$_POST['email']."', student_username ='".$_POST['username']."' WHERE student_id = '".$_SESSION['studentID']."'";
        $change = mysqli_query($_SESSION["conn"],$changeProfileQuery);
        if ($change === true){
            $studentExistSql = "SELECT * FROM student WHERE student_id ='".$_SESSION['studentID']."'";
            $result = mysqli_query($_SESSION['conn'],$studentExistSql);
            $row = $result -> fetch_assoc();

            $_SESSION["studentUsername"] = $row["student_username"];
            $_SESSION["studentID"] = $row["student_ID"];
            $_SESSION["studentName"] = $row["student_name"];
            $_SESSION["enrolledClub"] =$row["enrolled_club"];
            $_SESSION["email"] =$row["student_email"];
            
        }else{
            echo "Error: " . $changeProfileQuery . ":-" . mysqli_error($_SESSION['conn']);
        }
    }

?>
