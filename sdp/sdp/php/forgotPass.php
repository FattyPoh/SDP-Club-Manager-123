<?php
  include '../api/crudHandler.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>forgot password page</title>
    <link rel="stylesheet" href="../css/loginpage.css">
  </head>
  <body>
    <div class="center" style="top:50%">
      <h1>Forgot Password</h1>
      <form method="post">
      <div>
        <a style="font-size:12px">Please insert your email to reset the password</a>
        </div> 

        <div class="txt_field">
          <input type="email" name="email" id="email" required>
          <span></span>
          <label>Email</label>
        </div> 

        <div class="txt_field">
          <input type="password" name="new_password" id="new_password" required>
          <span></span>
          <label>New Password</label>
        </div>  
    
        <div class="txt_field">
          <input type="password" name="confirm_password" id="confirm_password" required>
          <span></span>
          <label>Confirm Password</label>
        </div>  

        <input type="submit" value="Submit" name="reset-password">
        <div class="signup_link">
          Still remember your password? <a href="studentLogin.php">Log In</a>
        </div>
      </form>
    </div>

  </body>
<?php
  if (isset($_POST['email']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
    echo studentChangeCred($_POST['email'], $_POST['new_password'],$_POST['confirm_password']);
    return;
  }
?>
</html>





