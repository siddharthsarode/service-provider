<?php
session_start();

include_once "partials/_dbConnect.php";

if (!isset($_SESSION['userEmail'])) {
    echo "<script>alert('!Please Login First');
        location.href = '_userLogin.php'
        </script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Booking</title>
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- Favicon added -->
    <link rel="shortcut icon" href="img/original_logo.png" type="image/x-icon">
</head>

<body>

    <!-- Included User Dashboard navbar as it is -->
    <?php include_once "_userDashNavbar.php"; ?>

    <div class="service-order-container">
        <section class="order-service pad-x">
            <div class="order-wrapper">
                <div class="service-img">
                    <img src="img/services/01_c_Residential Cleaning.jpg" alt="PipeInstallation">
                    <div class="order-btn-container">
                        <a href="#" class="other-btn button">Other Service</a>
                        <a href="#" class="booking-btn button">Book Now</a>
                    </div>
                </div>
                <div class="order-service-info">
                    <div class="about-service">
                        <h1 class="heading">Residential Cleaning</h1>
                        <div class="desc">
                            <p class="service-desc">Thorough cleaning of residential properties including homes,
                                apartments,
                                and condos. Services
                                may include dusting, vacuuming, mopping, bathroom and kitchen cleaning, and tidying up
                                living spaces.
                            </p>
                        </div>
                        <div class="service-tags">
                            <p class="tag">Min Price <span>100</span></p>
                            <p class="tag">Rating <span>5 Star</span></p>
                            <p class="tag">Avg Time <span>1-2 Hours</span></p>
                            <p class="tag">Avg Time <span>1-2 Hours</span></p>
                            <p class="tag">Available Time <span>9 AM to 5 PM</span></p>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- included footer -->
    <?php include_once "_footer.php";?>

</body>

</html>