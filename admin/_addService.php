<?php
require "../partials/_dbConnect.php";
require "../partials/_regularExp.php";

if (isset($_POST['add_service'])) {
    $name = trim($_POST['serviceName']);
    $desc = trim($_POST['desc']);
    $price = trim($_POST['servicePrice']);
    $duration = trim($_POST['serviceDuration']);
    $desc_len = strlen($desc);
    $cate_id = trim($_POST['cate_id']);
    $img_name = $_FILES['file']['name'];
    $path = "img/services/" . $img_name;



    if (!preg_match(userNamePattern, $name)) {
        $userNameError = "* Invalid Service Name";
    }
    if (!preg_match(pricePattern, $price)) {
        $priceError = "Min price must be 100 and don't start with zero";
    }


    if ($desc_len < 15)
        $descError = "Description must have 15 character";

    if ($desc_len > 500)
        $descError = "Description must be less than 500 character";



    if (empty($userNameError) && empty($priceError) && empty($descError) && empty($durationError)) {

        $sql_add = "INSERT INTO `services` (`service_id`,`name`, `description`, `price`, `avg_duration`, `availability`, `created_at`, `image_path`, `cate_id`) 
        VALUES (null,'$name', '$desc', '$price', '$duration', 'yes', current_timestamp(), '$path', '$cate_id')";

        $result = $conn->query($sql_add);
        if ($result) {
            // File handling code (move_uploaded_file) should be inside this block
            if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
                echo "<script>alert('Image cannot be uploaded')</script>";
            } else {
                $f_name = $_FILES['file']['name'];
                $f_temp_name = $_FILES['file']['tmp_name'];

                $res = move_uploaded_file($f_temp_name, "../img/services/" . $f_name);

                if (!$res) {
                    echo "<script>alert('Image Cannot be uploaded')</script>";
                }
            }
            echo "<script>alert('Service Added Successfully')</script>";
        } else {
            echo "<script>alert('Service Cannot add')</script>";
        }
    } else {
        echo "<script>alert('* Something missing')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Service</title>
    <!-- Favicon added -->
    <link rel="shortcut icon" href="../img/original_logo.png" type="image/x-icon">
    <!-- custom css for admin -->
    <link rel="stylesheet" href="css/admin.css">

</head>

<body>
    <div class="add-service-container form-container" id="add-service">
        <div class="service-box">
            <div class="form-box">
                <div class="form-heading">
                    <!-- <img src="../img/icons/adminDark.png" alt="Admin-img" class="admin-img"> -->
                    <h2 class="heading">Add Service</h2>
                </div>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="add-service-form" enctype="multipart/form-data">
                    <div class="form-element">
                        <label class="form-label" for="serviceName">Service Name</label>
                        <input class="form-input" type="text" name="serviceName" id="serviceName" placeholder="Service Name" value="<?php if (isset($_POST['add_service'])) echo $name; ?>" required />
                        <small class="err-msg">
                            <?php echo $userNameError; ?>
                        </small>
                    </div>

                    <div class="form-element">
                        <label class="form-label" for="serviceDesc">Description</label>
                        <textarea class="form-input text-area" type="text" name="desc" id="desc" required><?php if (isset($_POST['add_service'])) echo $desc; ?></textarea>
                        <small class="err-msg">
                            <?php echo $descError; ?>
                        </small>
                    </div>

                    <!-- two input tag side by side container -->
                    <div class="form-input-group">

                        <div class="form-element">
                            <label class="form-label" for="servicePrice">Price</label>
                            <input class="form-input" type="number" name="servicePrice" id="servicePrice" placeholder="Price in Rs" value="<?php if (isset($_POST['add_service'])) echo $price; ?>" required />
                            <small class="err-msg">
                                <?php echo $priceError; ?>
                            </small>
                        </div>

                        <div class="form-element">
                            <label class="form-label" for="serviceDuration">Duration</label>
                            <select name="serviceDuration" class="form-input" id="serviceDuration">
                                <option value="">Select service duration</option>
                                <?php
                                $sql = "SELECT * FROM duration";
                                $res = $conn->query($sql);
                                if ($res) {
                                    if ($res->num_rows > 0) {
                                        while ($row = $res->fetch_assoc()) {
                                            echo '<option value="' . $row["duration_avg_time"] . '">' . $row["duration_avg_time"] . '</option>';
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-input-group">
                        <div class="form-element">
                            <label class="form-label" for="cate_id">Service Category</label>
                            <select name="cate_id" class="form-input" id="category">
                                <option value="">Select Service Category</option>
                                <?php
                                $sql = "SELECT * FROM categories";
                                $res = $conn->query($sql);
                                if ($res) {
                                    if ($res->num_rows > 0) {
                                        while ($row = $res->fetch_assoc()) {
                                            echo '<option value="' . $row["cate_id"] . '">' . $row["cate_name"] . '</option>';
                                        }
                                    }
                                }
                                ?>
                            </select>

                        </div>

                        <div class="form-element">
                            <label class="form-label" for="serviceImage">Upload Service Image </label>
                            <input class="input-file" type="file" accept="image/*" name="file" id="serviceImage" placeholder="Service Duration" value="Upload file" required />
                        </div>
                    </div>

                    <div class="form-element">
                        <input class="form-input button submit-btn" type="submit" value="Add Now" name="add_service">
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>