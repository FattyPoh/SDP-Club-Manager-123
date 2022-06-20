<?php
    include("dbConnection.php");

//alert
function jsAlert($msg) {
    echo '<script type="text/javascript">
        alert("'.$msg.'");
    </script>';
};

// student login data
function studentLogin($username,$pwd){
    $studentCredSql = "SELECT * FROM student WHERE student_username = '$username'AND student_password = '$pwd'";
    $result = mysqli_query($_SESSION['conn'],$studentCredSql);

    $row = $result -> fetch_assoc();
    if($username ==='' || $pwd ==='') {
        echo '<script type="text/javascript">

            alert("Please enter username and password!");
            
        </script>';

        header('Refresh:0.1 ; URL=studentLogin.php');
    }else if($result->num_rows >0 === TRUE){
        if(is_null($row["enrolled_club"])){
            $_SESSION["studentUsername"] = $username;
            $_SESSION["studentPassword"] = $pwd;
            $_SESSION["studentID"] = $row["student_ID"];
            $_SESSION["studentName"] = $row["student_name"];
            $_SESSION["email"] =$row["student_email"];
    
            echo '<script type="text/javascript">
                
                alert("Welcome to Club Manager 123!");
                
            </script>';  
            
            header('Refresh:0.01 URL=enrollClub.php');
        }else{
            $_SESSION["studentUsername"] = $username;
            $_SESSION["studentPassword"] = $pwd;
            $_SESSION["studentID"] = $row["student_ID"];
            $_SESSION["studentName"] = $row["student_name"];
            $_SESSION["enrolledClub"] =$row["enrolled_club"];
            $_SESSION["email"] =$row["student_email"];

            echo '<script type="text/javascript">
                
                alert("Login Succesfully!");
                
            </script>';  
            
            header('Refresh:0.01 URL=studentHomepage.php');
        }
    }else{
        $msg = 'User does not exist!\nPlease try again or register an account!';
        jsAlert($msg);
    }
}; 

function studentLogout() {
    $session = array(
        $_SESSION["studentUsername"],
        $_SESSION["studentPassword"],
        $_SESSION["studentID"],
        $_SESSION["studentName"],
        $_SESSION["enrolledClub"],
        $_SESSION["email"],
    );

    foreach ($session as $ss) {
        unset($ss);
    }
};

function studentRegister($ID,$studentName,$username,$pwd,$email){
    //to check the current student data we have in database
    $studentExistSql = "SELECT * FROM student";
    $result = $_SESSION["conn"]->query($studentExistSql);
    $_SESSION['exist'] = false;
    if (!empty($result) && $result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            if($row["student_username"]=== $username && $row["student_email"] === $email){
                $_SESSION['exist'] = true;
                break;
                
            }else{
                $_SESSION['exist'] = false;
            }
        }
    }else{
        $_SESSION['exist'] = false;
    }
    // insert new value
    $studentRegisterSql = "INSERT INTO student (student_ID, student_username, student_password, student_name, student_email) 
    VALUES ('$ID','$username','$pwd','$studentName','$email')";
    if ($_SESSION['exist']){
        echo '<script type="text/javascript">

        alert("Username Existed!");

        </script>';
        
    }else if ($ID ==='' || $studentName === '' || $username === '' || $pwd ==='' || $email ===''){
        echo '<script type="text/javascript">

        alert("Please enter your information");

        </script>';
    }else if($_SESSION["conn"]->query($studentRegisterSql) === TRUE) {
        echo '<script type="text/javascript">

        alert("Account Registered Successfully");

        </script>';
        header('Refresh:0.1 ; URL=studentLogin.php');
    }else{
        echo "Error: " . $studentRegisterSql . ":-" . mysqli_error($_SESSION['conn']);
    }
}

function studentChangeCred($email,$pwd,$pwdC){
    $studentDataSql = "SELECT student_email FROM student WHERE student_email= '$email'";
    $result = ($_SESSION["conn"]->query($studentDataSql));
    $_SESSION['email'] = false;
    if (!empty($result) && $result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            if($row["student_email"] === $email){
                $_SESSION['email'] = true;
                break;
                
            }else{
                $_SESSION['email'] = false;
            }
        }
    }else{
        $_SESSION['email'] = false;
    }

    $studentChangeCredSql = "UPDATE student SET student_password = '$pwd' WHERE student_email = '$email'";
    if(!($_SESSION['email'])) {
        echo '<script type="text/javascript">

        alert("This email is not registered, please try again!");
    
        </script>';
    }else if ($pwd === $pwdC){
        if($_SESSION["conn"]->query($studentChangeCredSql) === TRUE){
            echo '<script type="text/javascript">
    
            alert("Password changed successfully! Directing to login page!");
    
            </script>';
            header('Refresh:0.1 URL=studentLogin.php');
        }else{
            echo "Error: " . $studentChangeCredSql . ":-" . mysqli_error($_SESSION['conn']);
        }
        
    }else if ($pwd === "" || $pwdC ===""){
        echo '<script type="text/javascript">

        alert("Please enter your password!");

        </script>';
    }else{
        echo '<script type="text/javascript">

        alert("Password entered are not the same!");

        </script>';
    }
};

function adminLogin($username,$pwd){
    $sqlQuery = "SELECT * FROM admin WHERE admin_username = '$username'AND admin_password = '$pwd'";
    $result = mysqli_query($_SESSION['conn'],$sqlQuery);

    $row = $result -> fetch_assoc();
    if($username ==='' || $pwd ==='') {
        jsAlert("Please enter username and password!");
            
        header('Refresh:0.1 ; URL=adminLogin.php');
        return;
    }
    
    if($result->num_rows >0 === TRUE){
        $_SESSION["adminUsername"] = $username;
        $_SESSION["adminID"] = $row["admin_ID"];

        jsAlert('Login Success!');
        
        header('Refresh:0.01 URL=../php/adminHomepage.php');
        return;
    }

    $msg = 'User does not exist!\nPlease try again!';
    jsAlert($msg);
};

function comLogin($username, $pwd) {
    $sqlQuery = "SELECT * FROM committee WHERE committee_username = '$username'AND committee_password = '$pwd'";
    $result = mysqli_query($_SESSION['conn'],$sqlQuery);

    $row = $result -> fetch_assoc();
    if($username ==='' || $pwd ==='') {
        jsAlert("Please enter username and password!");
            
        header('Refresh:0.1 ; URL=committeeLogin.php');
        return;
    }
    
    if($result->num_rows >0 === TRUE){
        $_SESSION["committeeUsername"] = $username;
        $_SESSION["committeeID"] = $row["committee_ID"];
        $_SESSION["committeeClubID"] = $row["club_ID"];
        $_SESSION["comClubName"] = $row["club_name"];

        jsAlert('Login Success!');
        
        header('Refresh:0.01 URL=committeeHomepage.php');
        return;
    }

    $msg = 'User does not exist!\nPlease try again!';
    jsAlert($msg);
};


function studentFeedback($text) {
    global $con;
    $Text = mysqli_real_escape_string($con,$text);
    $name = $_SESSION["studentName"];
    $clubName = $_SESSION["enrolledClub"];
    $sqlQuery = "INSERT INTO feedback(club_name, student_name, feedback_text, admin_replies, committee_replies) VALUES 
    ('$clubName','$name','$Text',null,null);";

    if($text === '') {
        echo '<script type="text/javascript">

        alert("Empty feedback is not allowed!");

        </script>';

    }else if($con->query($sqlQuery) === TRUE) {
        echo '<script type="text/javascript">
        
        alert("Feedback Posted!")
        
        </script>';
        header("Location:feedback.php");
    }else{
        echo "Error: " . $sqlQuery . ":-" . mysqli_error($con);
    }

};

function comCreateDiscussionBoard($boardTitle) {
    global $con;
    $sqlQuery = "INSERT INTO discussion_board (board_title,club_name) VALUES  ('$boardTitle','".$_SESSION['comClubName']."')";
    if($boardTitle !== null){
        if($con->query($sqlQuery) === TRUE) {
            $succ = "Board Created!";
            jsAlert($succ);
            header("Refresh:0.01 URL=committeeHomepage.php");
        }else{
            echo "Error: " . $sqlQuery . ":-" . mysqli_error($con);
        }
    }else{
        $msg = 'Please enter board title to create board!';
        jsAlert($msg);
        header("Location: comAddDisc.php");
    }
};

function comCreateEvent($eventName, $eventDetails, $eventStartDate, $eventEndDate, $eventStartTime) {
    global $con;
    $para = array($eventName, $eventDetails, $eventStartDate, $eventEndDate, $eventStartTime);
    foreach ($para as $pa) {
        if (!isset($pa)) {
            $msg = 'Please fill in all the required information!';
            jsAlert($msg);
            return;
        }
    }

    if ($eventStartDate > $eventEndDate) {
        jsAlert('Invalid date, end date is before start date!');
        return;
    }

    $clubID = $_SESSION['committeeClubID'];
    
    $sqlQuery = "SELECT club_name from club WHERE club_ID = $clubID";
    $result = mysqli_query($con , $sqlQuery);
    $row = $result->fetch_assoc();
    $clubName = $row["club_name"];

    //insert event
    $values = "'$clubID', '$clubName', '$eventName', '$eventDetails', '$eventStartDate', '$eventEndDate', '$eventStartTime', 0";
    $sqlQuery = "
    INSERT INTO events (club_ID, club_name, event_name, event_details, start_date, end_date, time, approval)
    VALUES ($values);
    ";
    
    jsAlert($sqlQuery);

    if ($con ->query($sqlQuery) === FALSE) {
        $msg = 'An error occurred when publishing event';
        jsAlert($msg);
        return;
    }

    jsAlert("Event proposal sent to admin!");
    header("Refresh:0.1 ; URL=comEvent.php");
};

function comCreateAnnc($anncName, $anncDetail) {
    global $con;
    $para = array($anncName, $anncDetail);
    foreach ($para as $pa) {
        if (!isset($pa)) {
            $msg = 'Please fill in all the required information!';
            jsAlert($msg);
            return;
        }
    }

    $clubID = $_SESSION["committeeClubID"];

    $sqlQuery = "SELECT club_name from club WHERE club_ID = $clubID";
    $result = mysqli_query($con , $sqlQuery);
    $row = $result->fetch_assoc();
    $clubName = $row["club_name"];

    //insert annc
    $values = "'$clubID', '$clubName', '$anncName', '$anncDetail'";
    $sqlQuery = "INSERT INTO announcement (club_ID, club_name, announcement_name, announcement_details)
    VALUES ($values);
    ";
    
    if ($con -> query($sqlQuery) == FALSE) {
        $msg = 'An error occurred when publishing announcement!';
        jsAlert($msg);
        return;
    }

    jsAlert("Annoucement published successfully!");
    header("Refresh:0.1 ; URL=comAnnouncement.php");
};

function adminNewClub($cName, $cDesc, $cCName, $cCPassword) {
    global $con;
    $parameter = array(
        $cName,
        $cDesc,
        $cCName,
        $cCPassword,
    );
    foreach ($parameter as $para) {
        if ($para === null) {
            jsAlert("Please enter all the required details!");
            header("Refresh:0.1 ; URL=createClub.php");
        }
    }

    //check committee availability
    $sqlQuery = "SELECT * FROM committee WHERE committee_username = '$parameter[2]'";
    $result = mysqli_query($con , $sqlQuery);
    if($result -> num_rows > 0 === TRUE) {
        jsAlert("Username exist, try another!");
        header("Refresh:0.1 ; URL=createClub.php");
    }

    //check clubname availability
    $sqlQuery = "SELECT * FROM club WHERE club_name = '$parameter[0]'";
    $result = mysqli_query($con , $sqlQuery);
    if($result -> num_rows > 0 === TRUE) {
        jsAlert("Club name exist, try another!");
        header("Refresh:0.1 ; URL=createClub.php");
    }

    //create club
    $sqlQuery = "INSERT INTO club (club_name, club_desc, club_member_count) 
    VALUES ('$parameter[0]', '$parameter[1]', 0)
    ";

    if($con ->query($sqlQuery) === FALSE) {
        jsAlert("An error occured when creating club!");
        header("Refresh:0.1 ; URL=createClub.php");
    }

    //get clubID
    $sqlQuery = "SELECT club_ID from club WHERE club_name = '$parameter[0]'";
    $result = mysqli_query($con , $sqlQuery);
    $row = $result->fetch_assoc();
    $clubID = $row["club_ID"];

    //create committee
    $sqlQuery = "INSERT INTO committee (committee_username, committee_password, club_name, club_ID) 
    VALUES ('$parameter[2]', '$parameter[3]', '$parameter[0]', $clubID)
    ";

    if($con ->query($sqlQuery) == FALSE) {
        jsAlert("An error occured when creating committee!");
        header("Refresh:0.1 ; URL=createClub.php");
    }

    jsAlert("Successfully create club and committee!");
    header("Refresh:0.1 ; URL=createClub.php");
}

function adminEventApprove($eventID) {
    $sqlQuery = "UPDATE event SET approval = 1 WHERE event_ID = '$eventID'";

    if($_SESSION['conn'] ->query($sqlQuery) == FALSE) {
        jsAlert("An error occured when approving an event!");
        return;
    }

    jsAlert("Successfully approved an event!");
    header("Refresh:0.1 ; URL=");
}

function studentAddDiscussion($text,$boardID){
    global $con;
    $sql = "INSERT INTO discussion_replies (board_id, student_id, student_name, text) 
    VALUES ('$boardID','".$_SESSION['studentID']."','".$_SESSION['studentName']."','$text')";
    $result = mysqli_query($con,$sql);

    if($result === true){
        $msg = "Discussion Added";
        jsAlert($msg);
        header("Refresh:0.01 url=studentDiscussion.php");
    }else{
        echo "Error: " . $sql . ":-" . mysqli_error($con);
    }

}
function adminReplyFeedback($text,$feedbackID){
    global $con;
    $sql = "UPDATE feedback SET admin_replies = '$text' WHERE feedback_ID = '$feedbackID'";
    $result = mysqli_query($con,$sql);

    if($result === true){
        $msg = "Reply Added";
        jsAlert($msg);
        header("Refresh:0.01 url=adminFeedback.php");
    }else{
        echo "Error: " . $sql . ":-" . mysqli_error($con);
    }
}

function comReplyFeedback($text,$feedbackID){
    global $con;
    $sql = "UPDATE feedback SET committee_replies = '$text' WHERE feedback_ID = '$feedbackID'";
    $result = mysqli_query($con,$sql);

    if($result === true){
        $msg = "Reply Added";
        jsAlert($msg);
        header("Refresh:0.01 url=comFeedback.php");
    }else{
        echo "Error: " . $sql . ":-" . mysqli_error($con);
    }
}

function adminAddClassroom($name,$location){
    $existSql = "SELECT * FROM available_room";
    $existResult = mysqli_query($_SESSION['conn'],$existSql);
    $_SESSION['roomExist'] = false;
    if(!empty($existResult) && $existResult->num_rows > 0){
        while($row = $existResult->fetch_assoc()){
            if($row["classroom_name"] === $name || $row["classroom_location"] === $location){
                $_SESSION['roomExist'] = true;
                break;
            }else{
                $_SESSION['roomExist'] = false;
            }
        }
    }else{
        $_SESSION['roomExist'] = false;
    }

    $sql = "INSERT INTO available_room (classroom_name, classroom_location, pending) VALUES ('$name','$location',0)";

    if($_SESSION['roomExist']){
        $msg = "Classroom Existed!";
        jsAlert($msg);
        header("Refresh:0.01 URL=adminAddLoc.php");
    }
    if($name ==='' || $location ===''){
        $msg = "Please enter classroom details!";
        jsAlert($msg);
        header("Refresh:0.01 URL=adminHomepage.php");
    }else if ($_SESSION["conn"]->query($sql) === TRUE){
        $msg = "Classroom Added!";
        jsAlert($msg);
        header("Refresh:0.01 URL=adminHomepage.php");
    }else{

    }
    

}
?>