
<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "blood_donation";
    
    $conn = mysqli_connect($server, $user, $password, $db);

    if (isset($_POST['submit'])) {
        $user_Email=$_POST['User_mail'];
        $user_Name=$_POST['UserName'];
        $msg=$_POST['msg'];
        $rec = "find.blood.donor0@gmail.com";
        mail($rec,$user_Name,$msg." \nUser Email: " .$user_Email);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contact.css">
    <title>Find Blood Donor | Contact </title>
</head>

<body>
    <div id="header">
        <a href="index.php" id="brand">Find Blood Donor</a>
        <p id="tag" style="margin: 0;">We Help you in finding Blood Donors</p>
    </div>
    <div id="form">
        <form class="form" method="POST" action="contact.php">
            <h2>CONTACT US</h2>
            <p type="Name:"><input name="UserName" placeholder="Write your name here.."></input></p>
            <p type="Email:"><input name="User_mail" placeholder="Let us know how to contact you back.."></input></p>
            <p type="Message:"><input name="msg" placeholder="What would you like to tell us.."></input></p>
            <button type="submit" name="submit" >Send Message</button>
            <div id="bottom">
                <!-- <span class="fa fa-phone"></span>001 1023 567 -->
                <span class="fa fa-envelope-o"></span> contact@FindBloodDonor.com
            </div>
        </form>
    </div>
</body>

</html>