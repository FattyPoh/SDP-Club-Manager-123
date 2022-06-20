<?php 
    include "../api/dbConnection.php";

    if(isset($_POST['board_id'])){

        $deleteSql = "DELETE FROM discussion_board WHERE board_ID = '".$_POST['board_id']."'";
        $result = mysqli_query($_SESSION['conn'],$deleteSql);
    }
?>