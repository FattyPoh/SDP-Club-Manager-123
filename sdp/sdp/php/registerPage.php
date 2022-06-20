<?php
  include '../api/crudHandler.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Club Manager 123</title>
    <link rel="stylesheet" href="../css/loginpage.css">
  </head>
  <body>
    <div class="center" style="top:50%">
      <h1>Sign Up</h1>
      <form method="post" id="form">
      <div class="txt_field">
          <input type="text" name="studentID" required maxlength="8" size="8">
          <span></span>
          <label>Student ID (TP000000)</label>
      </div>
        <div class="txt_field">
          <input type="text" name="name" required>
          <span></span>
          <label>Name</label>
      </div>  
        <div class="txt_field">
          <input type="email" name="email" required >
          <span></span>
          <label>E-mail</label>
      </div>  
      <div class="txt_field">
          <input type="text" name="username" required>
          <span></span>
          <label>Username</label>
      </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
      </div>
        <input type="hidden" name="request-type" value="register">
        <input type="submit" value="Sign Up" id="submit">
        <div class="signup_link">
          Already has an account? <a href="studentLogin.php">Log In</a>
      </div>
      </form>
    </div>

  </body>
  <?php
      if (isset($_POST['studentID']) || isset($_POST['name']) || isset($_POST['username']) || isset($POST['password']) || isset($_POST['email'])) {
      echo studentRegister($_POST['studentID'], $_POST['name'], $_POST['username'], $_POST['password'], $_POST['email']);
      return;
    }
  ?>
</html>
