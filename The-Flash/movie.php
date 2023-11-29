<?php
    session_start();
    require_once 'koneksi.php';

    $query = "SELECT * from film";
    $result = mysqli_query($koneksi, $query);

    include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/movie.css">
    <title>Movie</title>
</head>
<body>
    <div class="container">
        <div class="judul">
            <h1><b>THE FLASH</b></h1>
            <h5>TV series | 2014-2023 | 13+ | 43m</h5>
        </div>
        <div class="content">
            <div class="thumbnail">
                <img src="image/thumbnail.png">
            </div>
            <div class="film">
               <a href="#"><img src="image/SS.png"></a>
                <p>After being struck by lightning, Barry Allen wakes up from his coma 
                    to discover <br> he's been given the power of super speed, becoming the Flash, 
                    and fighting crime <br> in Central City.</p>
            </div>
        </div>
    </div>
</body>
</html>