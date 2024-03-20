<?php
session_start();

if (!isset($_SESSION['userEmail'])) {
    echo '<script>alert("*Please Login first");
    location.href = "_userLogin.php";
    </script>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- Favicon added -->
    <link rel="shortcut icon" href="img/original_logo.png" type="image/x-icon">
</head>

<body>

    <!-- payment navbar -->
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

            <a href="_userDashboard.php" class="link button account">
                <img src="img/icons/user.png" class="user-icon" alt="">
                <span>My Profile</span>
            </a>
        </div>
    </header>
    <div class="container" id="payment">
        <div class="grid-container">
            <div class="payment-section">
                <div class="payment-form">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                        <h2>Service Address</h2>
                        <div class="form-element">
                            <label class="form-label" for="name">Username</label>
                            <input class="form-input" type="text" name="name" id="name" value="<?php if (isset($_POST['login'])) echo $user_email; ?>" required />
                        </div>
                        <div class="form-element">
                            <label class="form-label" for="addr">Street address</label>
                            <input class="form-input" type="text" name="addr" id="addr" value="<?php if (isset($_POST['login'])) echo ""; ?>" required />
                        </div>
                        <div class="form-input-group">
                            <div class="form-element">
                                <label class="form-label" for="city">City</label>
                                <input class="form-input" type="text" name="city" id="city" value="<?php if (isset($_POST['login'])) echo ""; ?>" required />
                            </div>
                            <div class="form-element">
                                <label class="form-label" for="phone">Phone number</label>
                                <input class="form-input" type="number" name="phone" id="phone" value="<?php if (isset($_POST['login'])) echo ""; ?>" required />
                            </div>
                        </div>

                        <h2>Payment Information</h2>
                        <div class="form-element">
                            <label class="form-label" for="card_num">Credit Card Number</label>
                            <input class="form-input" type="text" name="card_num" id="card_num" value="<?php if (isset($_POST['login'])) echo ""; ?>" required />
                        </div>
                        <div class="form-input-group">
                            <div class="form-element">
                                <label class="form-label" for="card_num">Expiration</label>
                                <input class="form-input" type="text" name="card_num" id="card_num" placeholder="MM/YY" value="<?php if (isset($_POST['login'])) echo ""; ?>" required />
                            </div>
                            <div class="form-element">
                                <label class="form-label" for="card_num">Security Code</label>
                                <input class="form-input" type="text" name="card_num" id="card_num" placeholder="CVC" value="<?php if (isset($_POST['login'])) echo ""; ?>" required />
                            </div>
                        </div>
                        <div class="form-element">
                            <input class="form-input button submit-btn" type="submit" value="Book Now" name="booking" id="booking-btn">
                        </div>
                    </form>
                </div>
            </div>
            <div class="aside">
                <div class="price-details">
                    <h2>Service Information</h2>
                    <div class="info">
                        <p>Plumbing Service</p>
                        <p>Min 100₹ booking charges, don't worry this amount will reduce in final pay amount.</p>
                        <p>You can book another service you wants</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- included footer -->
    <?php include_once "_footer.php"; ?>
</body>

</html>