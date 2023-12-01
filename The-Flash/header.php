<?php
    require_once 'koneksi.php';
    function inOrOut(){
        if(isset($_SESSION['id'])){
            echo "<li><a href='logout.php' class='home-nav'>LOG OUT</a></li>";
        }else{
            echo "<li><a href='Login.php' class='home-nav'>SIGN IN</a></li>
            <p class='home-nav'> | </p>
            <li><a href='Logup.php' class='home-nav'>SIGN UP</a></li>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <title>Header</title>
</head>
<body>
    <nav>
        <ul class="navbar">
            <li><a href="home.php">HOME</a></li>
            <li><a href="comic.php">COMICS</a></li>
            <li><a href="movie.php">MOVIE</a></li>
            <li><a href="about.php">ABOUT</a></li>
        </ul>
        <ul class="navsign">
            <?= inOrOut(); ?>
        </ul>
    </nav>
</body>
</html>