<?php
define("emailPattern", "/^([a-zA-Z\.]{7,}+[0-9\.]*[a-zA-Z\.]*@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/");
define("passwordPattern", "/^[a-zA-Z0-9]{5,10}+$/");
define("userNamePattern", "/^[a-zA-Z\s]+$/");
define("mobilePattern", "/^[0-9]{10}$/");
define("pinCodePattern", "/^[0-9]{6}$/");



/*user Registration form validation start here*/
if (isset($_POST['sign_up'])) {

    $user_name = trim($_POST['userName']);
    $user_email = trim($_POST['userEmail']);
    $user_pass = trim($_POST['userPassword']);
    $user_con_pass = trim($_POST['userConPassword']);
    $user_mobile = trim($_POST['userMobile']);
    $pin_code = trim($_POST['pin-code']);

    if (!preg_match(userNamePattern, $user_name)) {
        $userNameError = "* Invalid User Name";
    }
    if (!preg_match(emailPattern, $user_email)) {
        $userEmailError = "* Invalid Email Id";
    }
    if (!preg_match(mobilePattern, $user_mobile)) {
        $mobileError = "* Invalid Mobile Number";
    }
    if (!preg_match(passwordPattern, $user_pass)) {
        $passwordError = "* Password must have min 5 char and max 10 char ";
    }
    if (strcmp($userPassword, $user_con_pass) != 0) {
        $ConPasswordError = "* Confirm password does not matched";
    }
    if (!preg_match(pinCodePattern, $pin_code)) {
        $pinCodeError = "* Invalid pin code";
    }
}

/*user registration form validation ends here*/

// /*user login validation start here*/
// if (isset($_POST['login'])) {
//     error_reporting(0);
//     $loginEmail = trim($_POST['email']);
//     $loginPassword = trim($_POST['password']);

//     if (!preg_match(emailPattern, $loginEmail) ) {
//         $emailError = "*please! Enter valid email*";
//     } else if (!preg_match(passwordPattern, $loginPassword) ) {
//         $passwordError = "*password length must have 5 to 10 numbers or characters*";
//     } else {
//         header("location:index.php");
//     }
// }
// /*user login validation ends here*/

// /*user forget password validation*/
// if (isset($_POST['forget'])) {
//     error_reporting(0);

//     $emailForget = trim($_POST['userEmail']);
//     $passwordForget = trim($_POST['newPassword']);

//     if (!preg_match(emailPattern, $emailForget) ) {
//         $emailForgetError = "*Please! Enter valid email*";
//     } else if (!preg_match(passwordPattern, $passwordForget) ) {
//         $passwordForgetError = "*Please! Enter valid password number*";
//     } else {
//         header("location:_userLogin.php");
//     }
// }
// /*user forget password validation ends here*/

// /*user contact form validation start here */
// if (isset($_POST['contact-form'])) {
//     $contactUser = trim($_POST['user-name']);
//     $contactEmail = trim($_POST['email']);
//     $contactMessage = trim($_POST['msg']);

//     if (!preg_match(userNamePattern, $contactUser) ) {
//         $contactUserNameError = "**Please! Enter valid user name**";
//     } else if (!preg_match(emailPattern, $contactEmail) ) {
//         $contactEmailError = "**Please! Enter valid Email address**";
//     } else if (strlen($contactMessage) < 50 || strlen($contactMessage) > 200 ) {
//         $contactMessageError = "**Message length should in between 50 to 200**";
//     } else {
//         echo "<script>alert('Message Submitted!');</>";
//     }
// }
// /*Contact form validation ends here*/