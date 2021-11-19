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
    <title>Account</title>
</head>

<body>
    <header>
        <div id="header-text">
            <h1 id="brand">Find Blood Donor</h1>
            <p id="tag">We help you in finding Blood Donors</p>
        </div>
        <div id="header-nav">
            <a href="#About" id="about">About</a>
            <a href="#Contact" id="contact">Contact</a>
        </div>
    </header>
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
        <!-- <header>Menu</header> -->
        <a href="account.php" class="active">
            <i class="fas fa-qrcode"></i>
            <span>Dashboard</span>
        </a>

        <a href="account.php?logout=true">
            <i class="far fa-question-circle"></i>
            <span>LogOut</span>
        </a>

        <a href="#">
            <i class="fas fa-stream"></i>
            <span>About</span>
        </a>

        <a href="#">
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
                <!-- <a href="index.php" id="Logout-btn">Logout</a> -->
                <form action="account.php" method="get">
                    <input type="submit" value="Logout" name="logout" id="Logout-btn">
                </form>
            </div>
        </div>
        <div id="Right-side">
            <div id="Right-top">
                <div id="Right-top1">
                    <p>In need of Blood ? </p>
                    <br>
                    <a href="Search_Results.php" id="search-btn">Search Blood Group</a><br><br>
                </div>
                <div id="Right-top2">
                    <p>Ready to Donate Blood ? </p> <br>
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