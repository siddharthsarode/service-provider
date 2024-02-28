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
            <!-- Fetching categories into database and display it on user's dashboard -->
            <?php
            $fetch_cate = "SELECT cate_id, cate_name FROM categories";
            $result = $conn->query($fetch_cate);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo ' <li><a href="#" class="cate-link ">' . $row['cate_name'] . '</a> ';

                    // Fetching services category wise
                    $fetch_service = "SELECT service_id, name FROM services WHERE cate_id = {$row['cate_id']}";
                    $res = $conn->query($fetch_service);
                    echo '<div class="sub-menu">
                    <ul class="service-list">';
                    if ($res) {
                        while ($arr_service = $res->fetch_assoc()) {
                            echo '<li><a href="#">' . $arr_service["name"] . '</a></li>';
                        }
                        echo '</ul>
                            </div>
                        </li>';
                    }
                }
            } else {
                echo "<script>alert('* Poor Network'); </script>";
            }
            ?>
        </ul>
    </nav>
    <!-- Categories navbar bar End Here -->

    <!-- User's Dashboard start here -->
    <div class="user-dashboard pad-x" id="dashboard">
        <div class="user-sidebar">
            <div class="user-operation">
                <div class="user-profile">
                    <img src="img/profile-pic.png" alt="Profile" class="profile">
                </div>
            </div>
        </div>
        <div class="user-content">
            <h1>content</h1>
        </div>
    </div>
    <!-- User's Dashboard End here -->
    <script src="js/app.js"></script>
</body>

</html>