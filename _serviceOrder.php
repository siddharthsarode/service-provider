<?php
session_start();

include_once "partials/_dbConnect.php";

// if (!isset($_SESSION['userEmail'])) {
//     echo "<script>alert('!Please Login First');
//         location.href = '_userLogin.php'
//         </script>";
//     exit;
// }
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

    <?php
    if (isset($_GET['sid'])) {
        $sid = $_GET['sid'];
        $fetch_service = "SELECT * FROM services WHERE service_id = {$sid}";
        $result = $conn->query($fetch_service);
        if ($result->num_rows == 1) {
            $ser_row = $result->fetch_assoc();
        } else {
            echo "<script>
            alert('! Services cannot fetch');
            location.href = 'index.php' </script>";
        }
    }
    ?>
    <div class="service-order-container">
        <section class="order-service pad-x">
            <div class="order-wrapper">
                <div class="service-img">
                    <img src="<?php if (isset($_GET['sid'])) echo $ser_row['image_path']; ?>" alt="PipeInstallation">
                    <div class="order-btn-container">
                        <a href="#" class="other-btn button">Other Service</a>
                        <a href="_paymentPage.php?sid<?php echo $sid; ?>" class="booking-btn button">Book Now</a>
                    </div>
                </div>
                <div class="order-service-info">
                    <div class="about-service">
                        <h1 class="heading"><?php if (isset($_GET['sid']))
                                                echo $ser_row['name'];
                                            ?></h1>
                        <div class="desc">
                            <p class="service-desc">
                                <?php if (isset($_GET['sid']))
                                    echo $ser_row['description'];
                                ?>
                            </p>
                        </div>
                        <div class="service-tags">
                            <p class="tag">Min Price:
                                <span><?php if (isset($_GET['sid']))
                                            echo $ser_row['price'];
                                        ?>
                                    Rs
                                </span>
                            </p>
                            <p class="tag">Rating: <span>5 Star</span></p>
                            <p class="tag">Avg Time:
                                <span><?php if (isset($_GET['sid']))
                                            echo $ser_row['avg_duration'];
                                        ?>
                                </span>
                            </p>

                            <p class="tag">Available Time: <span>9 AM to 5 PM</span></p>
                            <p>You can book service for Free</p>
                        </div>
                    </div>

                    <div class="question-container">
                        <div class="que-wrapper">
                            <p>Have doubts regarding this service?</p>
                            <button class="button post-btn" id="post-btn">Post your question</button>
                        </div>
                        <div class="que-form">
                            <p class="heading">Post Your Question</p>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                                <div class="form-element">
                                    <textarea name="question" id="question" class="form-input text-area" placeholder="Type your question here..." required></textarea>
                                </div>
                                <div class="form-element">
                                    <input class="form-input button submit-btn" type="submit" value="Submit" name="que_submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- included footer -->
    <?php include_once "_footer.php"; ?>


    <!-- js files -->
    <script src="js/serviceOrder.js"></script>
</body>

</html>