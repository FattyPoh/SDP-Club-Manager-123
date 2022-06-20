<?php 
session_start()
?>

</<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- This is the style for the header -->
    <link rel="stylesheet" href="../css/navbar_.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="inner">
            <div class="logo">
                <div>
                <!-- <h1><a style="color:inherit" href="../php/studentHomepage.php">CLUB <span>MANAGER 123</span></a></h1> -->
                    <h5><a>CLUB <span>MANAGER 123</span></a></h5>
                </div>
            </div>

            <nav>
                <li><span><a href="../php/studentHomepage.php">Club</a></span></li>
                <li><span><a href="../php/studentProfile.php">Profile</a></span></li>
                <li><span><a href="../php/feedback.php">Feedback</a></span></li>
                <li><span><a href="../php/logout.php" class="button">Log Out</a></span></li>
            </nav>
        </div>
    </header>
</body>
</html>