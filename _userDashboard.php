<?php
session_start();
include_once "partials/_dbConnect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- Favicon added -->
    <link rel="shortcut icon" href="img/original_logo.png" type="image/x-icon">
</head>

<body>
    <header class="pad-x user-dash header" id="user-dashboard-header">
        <div class="logo-section">
            <a href="index.php">
                <img src="img/original_logo.png" alt="mayIHelpYou" class="my-logo">
            </a>
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="index.php" class="navbar-link active-link">Home</a></li>
                <!-- <li><a href="index.php#services" class="navbar-link">Services</a></li> -->
                <!-- <li><a href="index.php#contact" class="navbar-link">Contacts</a></li> -->
                <li><a href="#" class="navbar-link">Privacy & Policy</a></li>
                <li><a href="#" class="navbar-link">Help</a></li>
            </ul>
        </nav>
        <div class="login-section">
            <?php if (!isset($_SESSION['userEmail'])) : ?>
            <a href="./_userLogin.php" class="user-login">
                <img src="img/default_profile.png" class="icon user-icon" alt="">
                <span class="login-text">Sign-up / Login</span>
            </a>
            <?php else : ?>
            <a href="_userDashboard.php" class="link button account">
                <img src="img/icons/user.png" class="user-icon" alt="">
                <span>My Profile</span>
            </a>
            <a href="_logout.php" class="button" id="user-logout">Log out</a>
            <?php endif; ?>
        </div>
    </header>

    <!-- Categories navbar bar Start Here -->
    <nav class="navbar" id="cate-navbar">
        <ul class="category-list">
            <?php
            $fetch_cate = "SELECT cate_id, cate_name FROM categories";
            $result = $conn->query($fetch_cate);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo ' <li><a href="#" class="cate-link ">' . $row['cate_name'] . '</a>
                <div class="sub-menu">
                    <ul class="service-list">
                        <li><a href="#">Pipe repair</a></li>
                        <li><a href="#">Wiring repair</a></li>
                        <li><a href="#">Car repair</a></li>
                        <li><a href="#">Pen repair</a></li>
                        <li><a href="#">Hello repair</a></li>
                    </ul>
                </div>
            </li>';
                }
            } else {
                echo "No";
            }
            ?>

            <!-- <li><a href="#" class="cate-link ">Cleaning</a></li>
            <li><a href="#" class="cate-link ">Electrical</a></li>
            <li><a href="#" class="cate-link ">Carpentry</a></li>
            <li><a href="#" class="cate-link ">Services</a></li>
            <li><a href="#" class="cate-link ">Home</a></li>
            <li><a href="#" class="cate-link ">About</a></li>
            <li><a href="#" class="cate-link ">Contact</a></li> -->

        </ul>
    </nav>
    <!-- Categories navbar bar End Here -->

    <div class="user-container">
    </div>

    <script src="js/app.js"></script>
</body>

</html>