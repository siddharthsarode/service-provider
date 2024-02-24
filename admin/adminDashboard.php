<?php
// session_start();

// if (!isset($_SESSION['adminEmail']) || !isset($_SESSION['admin_id'])) {
//     echo "<script> alert('!Unknown User, Please Login'); 
//             location.href = '_adminLogin.php';
//         </script>";
// } else {
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="./js/admin.js" defer></script>
</head>
<body>
    <?php require "_adminNavbar.php"?>
    <div class="dashboard">
    <section id="admin-dashboard">
        <div class="dashboard-heading">
           <img src="../img/icons/dashboard.png" id="dashboard-icon" class="icon" alt=""> <span>Dashboard</span>
        </div>
        <div class="dashboard-search">
            <input type="text" name="search" id="search" placeholder="Search content.."><img src="../img/icons/search-interface-symbol.png" class="icon" alt="">
        </div>
        <div class="dashboard-content">
            <div class="admin-profile">
                <img src="../img/icons/adminDark.png" class="icon" alt=""><span><a href="adminDashboard.php">Profile</a></span>
            </div>
            <div class="employee">
                <img src="../img/icons/employee.png" class="icon" alt=""><span>Employee</span><img src="../img/icons/angle-down-solid.png" class="angle-down" id="angle-down-arrow" alt="">
                <ul>
                    <li><a href="adminDashboard.php?demo=<?php echo"hello this is url";?>">Registration</a></li>
                    <li><a href="">Availability</a></li>
                    <li><a href="">Payroll</a></li>
                    <li><a href="">Job assign</a></li>
                </ul>
            </div>
             <div class="employee">
                <img src="../img/icons/user (2).png" class="icon" alt=""><span>User</span><img src="../img/icons/angle-down-solid.png" class="angle-down" id="angle-down-arrow" alt="">
                 <ul>
                    <li><a href="">Registration</a></li>
                    <li><a href="">Availability</a></li>
                    <li><a href="">Payroll</a></li>
                    <li><a href="">Job assign</a></li>
                </ul>
            </div>
            <div class="employee">
                <img src="../img/icons/employee.png" class="icon" alt=""><span>Categories</span><img src="../img/icons/angle-down-solid.png" class="angle-down" id="angle-down-arrow" alt="">
                 <ul>
                    <li><a href="">Registration</a></li>
                    <li><a href="">Availability</a></li>
                    <li><a href="">Payroll</a></li>
                    <li><a href="">Job assign</a></li>
                </ul>
            </div>
            <div class="employee">
                <img src="../img/icons/employee.png" class="icon" alt=""><span>Service</span><img src="../img/icons/angle-down-solid.png" class="angle-down" id="angle-down-arrow" alt="">
                 <ul>
                    <li><a href="">Registration</a></li>
                    <li><a href="">Availability</a></li>
                    <li><a href="">Payroll</a></li>
                    <li><a href="">Job assign</a></li>
                </ul>
            </div>
             <div class="employee">
                <img src="../img/icons/employee.png" class="icon" alt=""><span>Order</span><img src="../img/icons/angle-down-solid.png" class="angle-down" id="angle-down-arrow" alt="">
                 <ul>
                    <li><a href="">Registration</a></li>
                    <li><a href="">Availability</a></li>
                    <li><a href="">Payroll</a></li>
                    <li><a href="">Job assign</a></li>
                </ul>
            </div>
            <div class="employee">
                <img src="../img/icons/employee.png" class="icon" alt=""><span>Contact details</span><img src="../img/icons/angle-down-solid.png" class="angle-down" id="angle-down-arrow" alt="">
                 <ul>
                    <li><a href="">Registration</a></li>
                    <li><a href="">Availability</a></li>
                    <li><a href="">Payroll</a></li>
                    <li><a href="">Job assign</a></li>
                </ul>
            </div>
             <div class="employee">
                <img src="../img/icons/employee.png" class="icon" alt=""><span>Views</span><img src="../img/icons/angle-down-solid.png" class="angle-down" id="angle-down-arrow" alt="">
                 <ul>
                    <li><a href="">Registration</a></li>
                    <li><a href="">Availability</a></li>
                    <li><a href="">Payroll</a></li>
                    <li><a href="">Job assign</a></li>
                </ul>
            </div>
            <div class="logout">
                <a href="#">
                    <img src="../img/icons/logout.png" class="icon" alt="">
                    <span>Log-out</span>
                </a>
            </div>
        </div>
    </section>
    <section id="main">
        <?php 
        
        if(isset($_GET['demo']))
        {
            require "_employeeRegistration.php";
        }
        
        ?>
    </section>
    </div>
    <!-- footer include here -->
</body>
</html>
   <?php
// }

