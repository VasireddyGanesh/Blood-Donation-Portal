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
    <link rel="stylesheet" href="css/Search_Results.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Find Blood Donor | Search </title>
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
        <!-- <header>Menu</header> -->
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
            <div id="search-heading">
                <h3>
                    List of Donors Accepted your Blood Request
                </h3>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $server = "localhost";
                    $user = "root";
                    $password = "";
                    $db = "blood_donation";
                    $conn = mysqli_connect($server, $user, $password, $db);

                    $email = $_SESSION['email'];
                    $query = "SELECT `donor_email` FROM `blood_requests` WHERE `recipient_email`='$email' ";
                    if ($result = mysqli_query($conn, $query)) {
                        if (mysqli_num_rows($result) >= 1) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $mail = $row['donor_email'];
                                $query1 = "SELECT * FROM `donor` WHERE `email`='$mail' ";
                                $result1 = mysqli_query($conn, $query1);
                                $row1 = mysqli_fetch_assoc($result1);
                                $field1name = $row1["name"];
                                $field2name = $row1["ph_no"];
                                $field3name = $row1["address"];
                                echo '<tr> 
                                                          <td>' . $field1name . '</td> 
                                                          <td>' . $field2name . '</td> 
                                                          <td>' . $field3name . '</td>  
                                                      </tr>';
                            }
                            $result->free();
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>