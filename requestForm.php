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
    <link rel="stylesheet" href="css/requestForm.css">
    <title>Find Blood Donor | Blood Request</title>
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
            <!-- <div id="Right-top">
                <div id="Right-top1">
                    <form action="Search_Results.php" method="post">
                        <select id="Blood-group-selection" name="blood_group">
                        <option>Blood Group</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        </select>
                        <button type="submit" id="search-btn" name="search" value="search">Search</button>
                    </form>
                </div>
                <div id="Right-top2">
                    <span>
                        <input type="text" id="location" placeholder="Location" style=" padding: 1rem; border-radius: 1.5rem; border: 0.15rem solid #45B4D0;">
                        <button type="submit" id="filter-btn" name="filter">Filter</button>
                    </span>
                </div>
            </div> -->

            <!-- <div id="Right-bottom">
               
            </div> -->
            <div class="form-container">
                <form action="" method="post">
                    <p>Your Request ID is 1234567789</p>
                    <div>
                        <select id="Blood-group-selection" name="blood_group" required>
                            <option>Blood Group</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                    <div>
                        <!-- <label for="location" class="label">Enter the location where Blood needed</label> -->
                        <p>
                        Enter the location where Blood needed  
                        </p>
                        <input type="text" id="location" name="location" required>
                    </div>
                    <input type="submit" value="Confirm" id="Logout-btn">
                </form>
            </div>
        </div>
    </div>
</body>

</html>