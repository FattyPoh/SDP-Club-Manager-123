<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discussion Board Page</title>
    <?php include '../template/comNavbar.php';?>
    <link rel="stylesheet" href="../css/Homepage.css">
 
</head>

<body>
    <section class="container">
        <div class="card">
            <div class="card-image card-6"></div>
            <h2>ADD NEW DISCUSSION BOARD</h2>
            <p>Adding New Discussion Board</p>
            <a href="../php/comAddDisc.php">ADD</a>
        </div>
        <div class="card">
            <div class="card-image card-7"></div>
            <h2>CURRENT DISCUSSION BOARD</h2>
            <p>Delete Discussion Board</p>
            <a href="../php/comDelDisc.php">UPDATE</a>
        </div>
        <div class="card">
            <div class="card-image card-8"></div>
            <h2>VIEW DISCUSSION BOARD</h2>
            <p>View Student's Discussion</p>
            <a href="../php/comViewDisc.php">VIEW</a>
        </div>
        </div>    
    </section>
</body>