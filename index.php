<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">
    <title>Blood Donation Portal</title>
</head>

<body>
    <div>
        <header class="header">
            <nav class="navbar">
                <a href="index.php" class="nav-logo">
                    <p>Find Blood Donor</p>
                </a>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="About.php" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link">Contact</a>
                    </li>
                </ul>
            </nav>
        </header>
    </div>
    <div id="box-container">
        <div id="box">
            <img src="img/home-page.png" alt="Home Page" id="Home_Page_image">

            <div id="MainFrame">
                <div id="quote-container">
                    <p id="qoute">
                        do you feel you don't have much to offer ?<br>
                        you have the most precious resource of all,<br>
                        the ability to save a life by donating blood !<br>
                        help share this invaluable gift with someone in need.
                    </p>
                </div>
                <div>
                    <br>
                    <p class="question">Ready To Donate Blood ?</p>
                    <br>
                    <p id="or">OR</p>
                    <br>
                    <p class="question">In Need Of Blood ?</p>
                    <br><br>
                    <a href="SignUp.php" id="signup-btn">Sign Up</a>
                    <br><br>
                </div>
            </div>
        </div>
        <footer>
            <p id="qoute-2">We Help You in finding Blood Donors</p>
        </footer>
    </div>
</body>
<script src="main.js"></script>

</html>