<?php


if(isset($_POST["ann_id"]))  
{
    $output = '';

    $connect = mysqli_connect("localhost", "root", "", "club_managing_system", "3306");  
    $query = "SELECT * FROM announcement WHERE announcement_ID = '".$_POST["ann_id"]."'";  
    $result = mysqli_query($connect, $query);  


    $output .= '  
    <div class="table-responsive">  
         <table class="table table-bordered">';  
    while($row = mysqli_fetch_array($result))  
    {  
         $output .= '  
              <tr>  
                   <td width="30%"><label>Announcement Name</label></td>  
                   <td width="70%">'.$row["announcement_name"].'</td>  
              </tr>  
              <tr>  
                   <td width="30%"><label>Details</label></td>  
                   <td width="70%">'.$row["announcement_details"].'</td>  
              </tr>  
              ';  
    }  
    $output .= "</table></div>";  
    echo $output;  








}