<?php
  session_start();
  include '../api/crudHandler.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student Login Page</title>
    <link rel="stylesheet" href="../css/loginpage.css">
    <style>
      .pic{
      width:200px;
      text-align:center;
      position: absolute;
      margin-top:20px;
      left:43%;
      }
    </style>
  </head>
  <body>
    <div class="pic"><img src="../images/student.png"  width="170" height="170"></div>
    <div class="center">
      <h1>Login</h1>
      <form method="post">
        <div class="txt_field">
          <input type="text" name="username" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="pwd" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass"> <a href="forgotPass.php">Forgot Password?</a></div>
        <input type="submit" value="Login">
        <div class="signup_link">
          Not a member? <a href="registerPage.php">Signup</a>
        </div>
      </form>
    </div>

  </body>
    <?php
      if (isset($_POST['username']) && isset($_POST['pwd'])) {
      echo studentLogin($_POST['username'], $_POST['pwd'],);
      return;
      }
    ?>
</html>
