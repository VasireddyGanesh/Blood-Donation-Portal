<?php

session_start();

$server = "localhost";
$user = "root";
$password = "";
$db = "blood_donation";

$conn = mysqli_connect($server, $user, $password, $db);

if (isset($_POST['register'])) {
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    $sql_query = "SELECT * from `user` WHERE `email`='$email' ";
    $result = mysqli_query($conn, $sql_query);

    if (mysqli_num_rows($result) == 1) {
        echo '<script>alert("This Email ID is already registered !");</script>';
    } elseif ($password != $cpassword) {
        echo '<script>alert("Passwords Mis-Match");</script>';
    } else {
        $encrypted_passwrd = md5($password);
        $sql = "INSERT INTO `user` (`name`,`email`,`passwrd`) VALUES ('$fname','$email','$encrypted_passwrd')";
        $query = mysqli_query($conn, $sql);
        echo '<script>alert("Success");</script>';
        $_SESSION['sess_user'] = $fname;
        echo "<script type='text/javascript'> document.location = 'account.php'; </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/SignUp.css">
    <title>Find-Blood-Donor | Sign Up</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div id="container">
        <div id="side-bar">
            <img src="https://img.icons8.com/color/48/000000/verified-badge.png" style="width: 3rem;" />
            <p>Account Details</p>
        </div>
        <div id="form-container">
            <div id="header-text">
                <a href="index.php" style="text-decoration: none;">
                    <p id="brand">Find Blood Donor</p>
                    <p id="tag">We Help you in finding Blood Donors</p>
                </a>
            </div>
            <div id="msg">
                <p id="msg-1">Join Our Community!</p>
                <p id="msg-2">Already have an account?<a href="login.php">Login</a></p>
            </div>
            <form action="SignUp.php" method="POST">
                <label for="full-name" class="label">Full Name</label>
                <input type="text" id="full-name" placeholder="Enter Full Name" name="fname" required><br>
                <label for="email-address" class="label">Email address</label>
                <input type="email" name="email" id="email-address" placeholder="Email Address" required><br>
                <label for="passwrd" class="label">Password</label>
                <input type="password" name="password" id="passwrd" placeholder="Create Password" required><br>
                <label for="passwrd" class="label">Confirm Password</label>
                <input type="password" name="cpassword" id="cpasswrd" placeholder="Confirm Password" required>
                <span class="registrationFormAlert" style="color:red;" id="CheckSecPassMatch">
                    <script>
                        function checkSecPassMatch() {
                            var SecPass = $("#passwrd").val();
                            var confirmSecPass = $("#cpasswrd").val();
                            if (SecPass != confirmSecPass)
                                $("#CheckSecPassMatch").html("Confirm Password doesn't match!");
                            else
                                $("#CheckSecPassMatch").html("");
                        }
                        $(document).ready(function() {
                            $("#cpasswrd").keyup(checkSecPassMatch);
                        });
                    </script>
                </span>
                <br>
                <button type="submit" id="submit-btn" name="register">Join Our Community</button>
            </form>
            <p id="terms_privacy_policy">By joining,you agree to the <span style="font-weight: bold;color: black;">Terms</span> and
                <span style="font-weight: bold;color: black;">Privacy Policy</span>
            </p>
        </div>
        <div id="img-container">
            <img src="img/sign-Up.png" alt="Image">
            <p>You don't have to be somebody's family member to donate blood</p>
        </div>
    </div>
</body>

</html>