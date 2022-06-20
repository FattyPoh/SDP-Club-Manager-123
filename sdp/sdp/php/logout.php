<?php 
    session_start();
    session_destroy();

    header('Refresh:0.1 ; URL="../php/index.php"');
?>