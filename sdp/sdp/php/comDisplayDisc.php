<?php


if(isset($_POST["board_id"]))  
{
    $output = '';
    $output2 = '';

    $connect = mysqli_connect("localhost", "root", "", "club_managing_system");  
    $query = "SELECT * FROM discussion_board WHERE board_ID = '".$_POST["board_id"]."'";  
    $result = mysqli_query($connect, $query);  


    $output .= '  
    <div class="table-responsive">  
         <table class="table table-bordered">';  
    while($row = mysqli_fetch_array($result))  
    {  
         $output .= '  
              <tr>  
                   <th width="30%"><label>Board Title</label></th>  
                   <th width="70%" style = "text-align:center">'.$row["board_title"].'</th>  
              </tr>  
              ';  
    }  
    $output .= "</table></div>";  
    echo $output;  
    
    $query2 = "SELECT * FROM discussion_replies WHERE board_ID = '".$_POST["board_id"]."'";  
    $result2 = mysqli_query($connect, $query2);  


    $output2 .= '  
    <div class="table-responsive">  
         <table class="table table-bordered">';  
    while($row = mysqli_fetch_array($result2))  
    {  
         $output2 .= ' 
              <tr></tr> 
              <tr>   
                   <th width="auto">'.$row['student_name'].":"." ".$row['text'].'</th>  
              </tr>  
              ';  
    }  
    $output2 .= "</table></div>";  
    echo $output2;  
}