<?php 
$_SESSION['conn']=mysqli_connect("localhost","root","","club_managing_system","3306");

$con=mysqli_connect("localhost","root","","club_managing_system","3306");



//Check connection
if(mysqli_connect_errno())
{
    echo "Failed to connect to database:".mysqli_connect_error();
}
return 
?>

