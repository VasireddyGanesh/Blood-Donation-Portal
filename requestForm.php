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

if (isset($_POST['confirm'])) {
    $blood_group = $_POST['blood_group'];
    $location = $_POST['location'];
    $sql = "SELECT `email` FROM `donor` WHERE `blood_group` = '$blood_group'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        $sub = "Blood Request [Important]";
        // $row = mysqli_fetch_assoc($query);
        while ($row = mysqli_fetch_assoc($query)){
            $mail =$row['email'];
            $msg = "Someone is in need of " . $blood_group . " Blood group . 
            Location : ".$location. "\nClick here to accept or reject " . "http://localhost/TestEmail/response.php?receiver_email=".$mail."&sender_email=". $_SESSION['email'];
            mail($mail, $sub, $msg);
            echo "$mail";
        }
        echo '<script>alert("Donors with requested Blood Group are Notified");</script>';
        echo "<script type='text/javascript'> document.location = 'account.php'; </script>";
    }else{
        echo '<script>alert("No Donors with requested Blood Group");</script>';
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/requestForm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Blood Request|Find Blood Donor</title>
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
            <div class="form-container">
                <form action="requestForm.php" method="post">
                    <p id="form-header">Blood Request</p>
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
                        <p style="padding-left: 3px;">
                            Enter the location where Blood needed
                        </p>
                        <input type="text" id="location" name="location" placeholder="location" required>
                    </div>
                    <input type="submit" name="confirm" value="Confirm" id="Logout-btn">
                </form>
            </div>
        </div>
    </div>
</body>

</html>