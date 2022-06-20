<?php 
session_start();
include '../api/dbConnection.php';

if (isset($_POST["club_name"]))
{
    $clubName = $_POST["club_name"];
    $studentID = $_SESSION['studentID'];

    $enrolledClubSql = "UPDATE student SET enrolled_club = '$clubName' WHERE student_ID ='$studentID'";
    $result = $_SESSION['conn']->query($enrolledClubSql);
    
    if ($result === true){
        $_SESSION['enrolledClub'] = $clubName;
        $addMembersql = "UPDATE club SET club_member_count = club_member_count + 1 WHERE club_name = '$clubName'";
        $memberResult = $_SESSION['conn']->query($addMembersql);
        if($memberResult === true){ 
        
        }else{
            echo "Error: " . $addMembersql . ":-" . mysqli_error($_SESSION['conn']);
        }
    }else{
        echo "Error: " . $enrolledClubSql . ":-" . mysqli_error($_SESSION['conn']);
    }
}
?>