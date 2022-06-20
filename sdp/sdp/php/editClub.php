<?php
    session_start();
    include '../api/dbConnection.php';

    if (isset($_POST['desc'])) {
        
        $changeClubQuery = "UPDATE club SET club_desc = '".$_POST['desc']."' WHERE club_id = '".$_SESSION['committeeClubID']."'";
        $change = mysqli_query($_SESSION["conn"],$changeClubQuery);
        if ($change === false){
            echo "Error: " . $changeClubQuery . ":-" . mysqli_error($_SESSION['conn']);
        };
    };
?>
