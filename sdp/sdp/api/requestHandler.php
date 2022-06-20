<?php

header("Access-Control-Allow-Origin: http://localhost");
header("Access-Control-Allow-Credentials: true");

$includePhp = array(
    "dbConnection.php",
    "studentLogin.php",
    "studentRegister.php",
);

foreach ($includePhp as $php) {
    include_once($php);
}

function errorHandler($httpStatusCode, $errorMessage){
    http_response_code($httpStatusCode);
    echo $errorMessage;
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['request-type'] == "login")
    studentLogin($username,$pwd);

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['request-type'] == "register")
    studentRegister($con);
?>
