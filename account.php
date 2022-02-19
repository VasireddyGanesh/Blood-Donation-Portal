<?php

session_start();

$server = "localhost";
$user = "root";
$password = "";
$db = "blood_donation";

$conn = mysqli_connect($server, $user, $password, $db);


if (isset($_SESSION["sess_user"])) {
    $active_user = $_SESSION["sess_user"];
} else {
    echo '<script>alert("You Must login First !");</script>';
    echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
}

if (isset($_GET['logout'])) {
    unset($_SESSION['sess_user']);
    session_destroy();
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/account.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Account | Find Blood Donor</title>
</head>

<body>
    <header>
        <div id="header-text">
            <h1 id="brand">Find Blood Donor</h1>
            <p id="tag">We help you in finding Blood Donors</p>
        </div>
        <div id="header-nav">
            <a href="About.php" id="about">About</a>
            <a href="contact.php" id="contact">Contact</a>
        </div>
    </header>
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
        <a href="account.php" class="active">
            <i class="fas fa-qrcode"></i>
            <span>Dashboard</span>
        </a>

        <a href="account.php?logout=true">
            <i class="far fa-question-circle"></i>
            <span>LogOut</span>
        </a>

        <a href="About.php">
            <i class="fas fa-stream"></i>
            <span>About</span>
        </a>

        <a href="contact.php">
            <i class="far fa-envelope"></i>
            <span>Contact</span>
        </a>
    </div>
    <div id="main">
        <div id="Profile">
            <div id="side-bar">
                <img src="img/profile.png" alt="Your Image">
                <p><?php echo $active_user; ?></p>
                <br>
                <form action="account.php" method="get">
                    <input type="submit" value="Logout" name="logout" id="Logout-btn">
                </form>
            </div>
        </div>
        <div id="Right-side">
            <div id="Right-top">
                <div id="Right-top1">
                    <p class="suggestion">In need of Blood ? </p>
                    <br>
                    <a href="requestForm.php" id="search-btn">Blood Request</a><br><br>
                    <p id="pointer">
                        <a href="bloodRequest_status.php" style="text-decoration: underline;">Click here</a> to check the status of blood request
                    </p>
                </div>
                <div id="Right-top2">
                    <p class="suggestion">Ready to Donate Blood ? </p> <br>
                    <a href="Registration.php" id="Register-btn">Register</a><br><br>
                </div>
            </div>
            <div id="Right-bottom">
                <img src="img/Accn_Page-nurse.png" alt="Image">
                <footer>
                    <p>Donate Blood and be a Hero of someone's life</p>
                </footer>
            </div>
        </div>
    </div>
</body>

</html>