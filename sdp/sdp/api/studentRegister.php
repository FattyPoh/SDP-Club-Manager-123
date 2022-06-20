<?php
function studentRegister($con) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sqlQuery = "SELECT * FROM student WHERE student_username = '$username'";
    $result = $con->query($sqlQuery);

    if ($result->num_rows > 0) {
        errorHandler(400, "Username Exist");
    }

    $name = rand() . "student";
    $sqlQuery = "INSERT INTO student (student_ID, student_username, student_password, student_name, enrolled_club) VALUES ('$username', '$name', '$password', 'name', '666')";
    $result = $con->query($sqlQuery);

    if ($con->query($sqlQuery) === TRUE) {
        echo "Successfully registered";
    } else {
        errorHandler(400, "Registration Error: <br> $con->error");
    }
}
?>