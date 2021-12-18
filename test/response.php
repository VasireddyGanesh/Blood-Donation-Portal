<?php

session_start();
$server = "localhost";
$user = "root";
$password = "";
$db = "blood_donation";

$conn = mysqli_connect($server, $user, $password, $db);

// if (!(isset($_POST['accept'])) && !(isset($_POST['reject']))) {
//     $_SESSION['s_email'] = $_GET['sender_email'];
//     $_SESSION['r_email'] = $_GET['receiver_email'];
// }else{
//     $sender_email=$_SESSION['s_email'];
//     $receiver_email=$_SESSION['r_email'];
//     $sql = "INSERT INTO `blood_requests` (`recipient_email`,`donor_email`) VALUES ('$sender_email','$receiver_email')";
//     $query = mysqli_query($conn, $sql);
// }

if (isset($_POST['submit'])) {
    $sender_email=$_SESSION['s_email'];
    $receiver_email=$_SESSION['r_email'];
    $sql = "INSERT INTO `blood_requests` (`recipient_email`,`donor_email`) VALUES ('$sender_email','$receiver_email')";
    $query = mysqli_query($conn, $sql);
    echo "submitted";
    echo '<script>alert("valid ! ");</script>';
}else{
    // $_SESSION['s_email'] = $_GET['sender_email'];
    // $_SESSION['r_email'] = $_GET['receiver_email'];
    echo '<script>alert("Invalid Confirmation Code ! ");</script>';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="response.css">
    <title>Document</title>
</head>

<body>

    <body>

        <div class="glassmorphism">

            <div id="header">
                <a href="index.php" id="brand">Find Blood Donor</a>
                <p id="tag">We Help you in finding Blood Donors</p>
            </div>
            <h3 style="text-align: center;margin: 3rem;font-size: 1.8rem;">Please Respond !</h3>
            <div id="outer-container">
                <form id="button-container" method="POST" action="response.php">

                    <!-- <button type="submit" id="accept-btn" name="submit">Accept</button> -->
                    <input type="submit" name="submit" value="Accept">

                </form>
            </div>

        </div>

    </body>

</html>