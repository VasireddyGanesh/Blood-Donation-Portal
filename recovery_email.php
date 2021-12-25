<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "blood_donation";

$conn = mysqli_connect($server, $user, $password, $db);

session_start();

$error = '';
$msg = '';
if (isset($_POST['submit'])) {
    $username = $_POST['email'];
    $sql = "SELECT * FROM `user` WHERE `email` = '$username' ";
    $query = mysqli_query($conn, $sql);
    $email_count = mysqli_num_rows($query);
    if ($email_count) {
        $row = mysqli_fetch_array($query);
        $fname = $row['name'];
        $subject = "PASSWORD RECOVERY [IMPORTANT]";
        $code=rand(999999, 111111);
        $_SESSION['name']=$fname;
        $_SESSION['email']=$username;
        $body = "Hi ". $fname. " ,\nHere is the confirmation code to reset your password ".$code;
        // $sender_email = "find.blood.donor0@gmail.com";
        if (mail($username, $subject, $body)) {
            $_SESSION['msg'] = "Check your mail !";
            $_SESSION['activation_code']=$code;
            header('location:verify_email.php');
        } else {
            echo "Email Sending Failed";
        }
    } else {
        echo "No email Found !";
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/recovery_email.css">
    <title>Account Login</title>
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
            <form id="side" method="POST" action="recovery_email.php">

                <p id="welcome-msg">Account Recovery !</p>
                <p class="msg">Enter valid email Id</p>

                <div class id="mainframe">

                    <input type="email" name="email" placeholder="Email Address" class="inputbx" required>
                    <br>

                    <br>
                    <input type="submit" name="submit" value="Send Mail" id="sign_in-btn"><br><br>

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