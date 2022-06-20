<?php


if(isset($_POST["event_id"]))  
{
    $output = '';

    $connect = mysqli_connect("localhost", "root", "", "club_managing_system", "3306");  
    $query = "SELECT * FROM events WHERE event_ID = '".$_POST["event_id"]."'";  
    $result = mysqli_query($connect, $query);  


    $output .= '  
    <div class="table-responsive">  
         <table class="table table-bordered">';  
    while($row = mysqli_fetch_array($result))  
    {  
         $output .= '  
              <tr>  
                   <td width="30%"><label>Event ID</td>  
                   <td width="70%">'.$row["event_ID"].'</td>  
              </tr>   
              <tr>  
                   <td width="30%"><label>Event Name</label></td>  
                   <td width="70%">'.$row["event_name"].'</td>  
              </tr>  
              <tr>  
                   <td width="30%"><label>Event Details</label></td>  
                   <td width="70%">'.$row["event_details"].'</td>  
              </tr>  
              ';  
    }  
    $output .= "</table></div>";  
    echo $output;  








}