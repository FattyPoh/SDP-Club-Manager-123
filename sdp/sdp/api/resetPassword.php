<?php
    include_once("dbConnection.php");

    session_start();

/*
  Accept email of user whose password is to be reset
  Send email to user to reset their password
*/
if (isset($_POST['reset-password'])) {
  $email = mysqli_real_escape_string($con, $_POST['email']);
  // ensure that the user exists on our system
  $query = "SELECT student_email FROM student WHERE student_email ='$email'";
  $results = mysqli_query($con, $query);

  if (empty($email)) {
    echo '<script type="text/javascript">

    alert("Please enter your email!");

    </script>';
    
  }else if(mysqli_num_rows($results) <= 0) {
    echo '<script type="text/javascript">

    alert("This email is not registered, please try again!");

    </script>';
  }

  
    // generate a unique random token of length 100
    $token = bin2hex(random_bytes(50));

    // store token in the password-reset database table against the user's email
    $sql = "INSERT INTO password_resets(student_email, student_token) VALUES ('$email', '$token')";
    $results = mysqli_query($con, $sql);

    // Send email to user with the token in a link they can click on
    $to = $email;
    $subject = "Reset your password on Club Manager 123";
    $msg = "Hi there, click on this <a href=\"localhost/sdp/sdp/php/newPassword.php?token=" . $token . "\">Open Link</a> to reset your password on our site";
    $msg = wordwrap($msg,70);
    $headers = "From: Club Manager 123";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html; charset=UTF-8" . "\r\n";
    $headers .= 'From: <'.$from.'>' . "\r\n";
    mail($to, $subject, $msg, $headers);
    header('location: pending.php?email=' . $email);
  
}

// ENTER A NEW PASSWORD
if (isset($_POST['new-password'])) {
    $new_pass = mysqli_real_escape_string($con, $_POST['new_password']);
    $new_pass_c = mysqli_real_escape_string($con, $_POST['confirm_password']);

    // Grab to token that came from the email link
    $token = $_SESSION['token'];
  
  
    // select email address of user from the password_reset table 
    $sql = "SELECT student_email FROM password_resets WHERE token='$token' LIMIT 1";
    $results = mysqli_query($con, $sql);
    $email = mysqli_fetch_assoc($results)['email'];

    if ($email) {
        $new_pass = md5($new_pass);
        $sql = "UPDATE student SET student_password='$new_pass' WHERE student_email='$email'";
        $results = mysqli_query($con, $sql);
        header('location: loginPage.php');
    }
  
}

// function check_email_exist($email){
//     $sql = "SELECT * FROM student WHERE student_email = '$email";
//     $result = mysqli_query($_SESSION['conn'],$sql);
//     $num = mysqli_num_rows($result);
//     $rec = mysqli_fetch_array($result);
//     return $rec;
// }

// function getNewPassword($pwd,$ID){
//     $pwd = $_POST['password'];
//     $ID = $_POST['student_id'];
//     $sql = "UPDATE student SET 'student_password' = '$pwd' WHERE 'student_id'='$ID'";
//     $result = mysqli_query($_SESSION['conn'],$sql);
//     return $pwd;
// }
// function send_email($to,$from,$subject,$msg){
    
//     $msg = wordwrap($msg,70);

//     $headers = "MIME-Version: 1.0" . "\r\n";
//     $headers .= "Content-type:text/html; charset=UTF-8" . "\r\n";
//     $headers .= 'From: <'.$from.'>' . "\r\n";
//     $x = mail($to,$subject,$msg,$headers);
// }

// function send_forgot_password($data){
//     $is_email = check_email_exist($data['email']);
//     if($is_email){
//         $new_pwd = update_password($is_email['ID']);
//         $email_msg = 'New Password: '.$new_pwd;
//         send_email($to=$is_email['email'], $from='Club Manager 123', $subject='Notification: Pasword Reset',$email_msg);
//         echo '<script "type = text/javacsript> 
        
//         alert("New password has been sent to yout email!")

//         </script>';
//     }else{
//         echo '<script type="text/javascript">

//         alert("This email is not registered, please try again!");
    
//         </script>';
//     }
// }
?>