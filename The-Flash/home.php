<?php
    session_start();

    $user = '';
    $link = 'Login.php';
    if(isset($_SESSION['id'])){
        $user = ', ' . strtoupper($_SESSION["username"]);
        $link = 'movie.php';
    }
    include "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>Home Page</title>
</head>
<body>
    <div class="hero-section">
        <div class="hero-content">
            <div class="left">
                <div class="heading">
                    <div class="item">
                        <span>WELCOME TO OUR WEBSITE <?=$user?></span>
                        <h1>WATCH NEW <br><em>THE FLASH</em><br>ONLINE</h1>
                        <br><a href=<?=$link;?>>Play Now</a>
                    </div>
                </div>
                <div class="opacity-left"></div>
            </div>
            <div class="right">
                <div class="heading">
                    <div class="item">
                        <img src="image/flash.jpg.png">
                    </div>
                </div>
                <div class="opacity-right">
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
