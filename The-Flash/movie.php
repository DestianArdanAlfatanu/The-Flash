<?php
    session_start();
    require_once 'koneksi.php';

    $query = "SELECT * from `film`";
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
        <?php while($data = mysqli_fetch_assoc($result)): ?>
            <div class="judul">
                <h1><b><?= $data['nama_film'] ;?></b></h1>
                <h5><?= $data['info'] ;?></h5>
            </div>
            <div class="content">
                <div class="thumbnail">
                    <img src="image/poster/<?= $data['poster'] ;?>" alt="Poster">
                </div>
                <div class="film">
                <a href="<?= $data['link'] ;?>"><img src="image/banner/<?= $data['banner'] ;?>" alt="Thumbnail"></a>
                    <p><?= $data['sinopsis'] ;?></p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
