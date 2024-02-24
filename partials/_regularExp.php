<?php

define("emailPattern", "/^([a-zA-Z\.]{3,}+[0-9\.]*[a-zA-Z\.]*@.[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/");
define("passwordPattern", "/^[a-zA-Z0-9]{5,10}+$/");
define("userNamePattern", "/^[a-zA-Z\s]{3,}$/");
define("mobilePattern", "/^[0-9]{10}$/");
define("pinCodePattern", "/^[0-9]{6}$/");
define("cityPattern", "/^[a-zA-Z\s]+$/");
define("pricePattern", "/^[1-9]+[0-9]{2,}$/");
// define("durationPattern", "/^[1-9-]+[a-zA-Z\s]{3,}$/");

$userNameError = "";
$userEmailError = "";
$mobileError = "";
$passwordError = "";
$ConPasswordError = "";
$pinCodeError = "";
$cityError = "";
$contactErrorMsg = "";
$descError = "";
$priceError = "";
$durationError = "";
