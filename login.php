<?php

session_start();

$server = "localhost";
$user = "root";
$password = "";
$db = "blood_donation";

$conn = mysqli_connect($server, $user, $password, $db);

if (isset($_POST['submit'])) {
  $username = mysqli_real_escape_string($conn , $_POST['email']);
  $password = mysqli_real_escape_string($conn , $_POST['password']);
  
  $password = md5($password);

  $sql = "SELECT * FROM `user` WHERE `email` = '$username' AND `passwrd` = '$password' ";
  $query = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($query)==1) {
    $row = mysqli_fetch_assoc($query);
    $_SESSION['sess_user'] = $row['name'];
    $_SESSION['email'] = $username;
    // echo "<script type='text/javascript'> document.location = 'account.php'; </script>";
    echo "<script>location.replace('account.php');</script>";
  } else {
    // echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    // echo "<script>location.replace('login.php');</script>";
    echo '<script>alert("UserName Or Password Incorrect");</script>';
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <title>Account Login</title>
</head>

<body>
  <div id="header">
    <a href="index.php" id="brand">Find Blood Donor</a>
    <p id="tag">We Help you in finding Blood Donors</p>
  </div>

  <div id="container">

    <div id="img-container">
      <img src="img/login-Page.png" alt="Image" id="login-img">
    </div>

    <div id="form-container">
      <form id="side" method="POST" action="login.php">

        <p id="welcome-msg">Welcome Back!</p>
        <p class="msg">Login to continue</p>

        <div class id="mainframe">

          <input type="email" name="email"  placeholder="Email Address" class="inputbx" required>
          <br>
          <input type="password" name="password" placeholder="Password" class="inputbx" required>
          <br>

          <a href="recovery_email.php" id="forgetPassword-msg">Forgot password?</a>

          <br>
          <input type="submit" name="submit" value="Sign In" id="sign_in-btn"><br><br>

          <p style="font-size: 1.3rem; font-family: 'Raleway', sans-serif;">
            New User ?<a href="SignUp.php" id="signUp">Sign up</a></p>
        </div>

      </form>

    </div>

  </div>

  <footer>
    <div id="footer">
      Copyright &copy;2021 <a href="#"> | Terms and Conditions | Privacy Policy</a>
    </div>
  </footer>


</body>

</html>