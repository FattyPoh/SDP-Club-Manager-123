<?php
     include "../api/dbConnection.php";

if(isset($_POST["feedback_id"]))
{
    $output = '';
    $output2 = '';

    $query = "SELECT * FROM feedback WHERE feedback_ID = '".$_POST["feedback_id"]."'";
    $result = mysqli_query($_SESSION['conn'], $query);


    $output .= '
    <div class="table-responsive">
         <table class="table table-bordered">';
    while($row = mysqli_fetch_array($result))
    {
         $output .= '
              <tr>
                   <td width="30%"><label>Feedback</label></td>
                   <td width="70%">'.$row["feedback_text"].'</td>
              </tr>
              ';
    }
    $output .= "</table></div>";
    echo $output;

    $query2 = "SELECT * FROM feedback WHERE feedback_ID = '".$_POST["feedback_id"]."'";
    $result2 = mysqli_query($_SESSION['conn'], $query2);


    $output2 .= '
    <div class="table-responsive">
         <table class="table table-bordered">';
    while($row = mysqli_fetch_array($result2))
    {
         $output2 .= ' 
              <tr></tr>
              <tr>
              <td width="30%"><label>Admin Reply</label></td>
              <td width="70%">'.$row["admin_replies"].'</td>
         </tr> 
              <tr>
                   <td width="30%"><label>Committee Reply</label></td>
                   <td width="70%">'.$row["committee_replies"].'</td>
              </tr>
              ';
    }
    $output2 .= "</table></div>";
    echo $output2;










}
