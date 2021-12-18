<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "blood_donation";

$conn = mysqli_connect($server, $user, $password, $db);

session_start();

if (isset($_POST['submit'])) {
    $username = $_SESSION['email'];
    $password = $_POST['password'];
    $encrypted_passwrd = md5($password);
    $sql = "UPDATE `user` SET `passwrd` ='$encrypted_passwrd' WHERE `email` = '$username' ";
    $query = mysqli_query($conn, $sql);
    echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/account_confirmation.css">
    <title>Account Confirmation|Find Blood Donor</title>
</head>

<body>
    <div id="header">
        <a href="index.php" id="brand">Find Blood Donor</a>
        <p id="tag">We Help you in finding Blood Donors</p>
    </div>

    <div id="container">

        <!-- <div id="img-container">
      <img src="img/login-Page.png" alt="Image" id="login-img">
    </div> -->

        <div id="form-container">
            <form id="side" method="POST" action="reset_password.php">

                <p id="welcome-msg">Reset Password !</p>
                <p class="msg">Enter new Password</p>

                <div class id="mainframe">

                    <input type="password" name="password" placeholder="New Password" class="inputbx" required>
                    <br>

                    <br>
                    <input type="submit" name="submit" value="Confirm" id="sign_in-btn"><br><br>

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