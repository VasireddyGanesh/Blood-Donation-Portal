<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "blood_donation";
    
    $conn = mysqli_connect($server, $user, $password, $db);
    
    session_start();
    
    if (isset($_POST['register'])){
        $fname=$_SESSION["sess_user"];
        $blood_group=$_POST['bg'];
        $date_of_birth=date('Y-m-d',strtotime($_POST['dob']));
        $gender=$_POST['gender'];
        $phone_no= $_POST['ph_no'];
        $adress= $_POST['address'];
        $sql = "INSERT INTO `donor` (`name`,`blood_group`,`dob`,`gender`,`ph_no`,`address`) VALUES ('$fname','$blood_group','$date_of_birth','$gender','$phone_no','$adress')";
        $query = mysqli_query($conn, $sql);

        if (isset($query)) {
            echo '<script>alert("Success");</script>';
            echo "<script type='text/javascript'> document.location = 'account.php'; </script>";
        }else{
            echo "Registration Failed ! Please Try Again" ;
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
    <link rel="stylesheet" href="css/Registration.css">
    <title>Registration</title>
</head>

<body>
    <div id="container">
        <div id="side-bar">
            <img src="https://img.icons8.com/color/48/000000/verified-badge.png" alt="tick mark Image" style="width: 3rem;">
            <p>Account Details</p>
        </div>
        <div id="form-container">
            <!-- <div id="header-text">
                    <h1>Find Blood Donor</h1>
                    <h5>We Help you in finding Blood Donors</h5>
                </div> -->
            <div id="header-text">
                <a href="index.php" style="text-decoration: none;">
                    <p id="brand">Find Blood Donor</p>
                    <p id="tag">We Help you in finding Blood Donors</p>
                </a>
            </div>

            <!-- <p>Blood group</p> -->
            <form action="Registration.php" method="post">
                <div id="msg">
                    <p>Registration Form !</p>
                </div>
                <div>
                    <label for="Blood-selection">Blood group</label><br>
                    <select id="Blood-selection" name="bg" required>
                        <option>Blood Group</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select><br>
                </div>
                <!-- <h4>Date of Birth</h4> -->
                <div>
                    <label for="DOB">Date of Birth</label><br>
                    <input type="date" name="dob" id="DOB" class="date-of-birth" required>
                </div>
                <!-- <h4>Gender</h4> -->
                <div>
                    <label for="gender">Gender</label><br>
                    <input id="male" type="radio" name="gender" value="Male" required>
                    <label  for="male">Male</label>
                    <input id="female" type="radio" name="gender" value="Female" required>
                    <label for="female">Female</label>
                    <br>
                </div>
                <!-- <h4>Phone Number</h4> -->
                <div>
                    <label for="phone-no">Phone Number</label><br>
                    <input type="text" placeholder="Enter valid phone number" name="ph_no" id="phone-no" required ><br>
                </div>
                <!-- <h4>Address</h4> -->
                <div>
                    <label for="address">City</label><br>
                    <textarea id="address" rows="6" cols="30" name="address" required>
                    </textarea>
                    <br>
                </div>
                <button type="submit" id="registration-btn" name="register">Register</button>
            </form>
            <p id="terms_privacy_policy">By Registering,you agree to the <span
                    style="font-weight: bold;color: black;">Terms</span> and
                <span style="font-weight: bold;color: black;">Privacy Policy</span>
            </p>
        </div>
        <div id="img-container">
            <img src="img/registration.png" alt="Image">
            <p>You don't have to be somebody's family member to donate blood</p>
        </div>
    </div>
</body>

</html>