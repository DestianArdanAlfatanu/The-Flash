<?php
    session_start();
    include_once('koneksi.php');
    include_once('dash-process.php');

    $user = '';
    if(isset($_SESSION['id'])){
        $user = strtoupper($_SESSION['username']);
    }

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $edit_state_movie = true;

        $result = mysqli_query($koneksi,"SELECT * FROM `film` WHERE id_film=$id");
        $data = mysqli_fetch_array($result);
        $nama = $data["nama_film"];
        $info = $data["info"];
        $sinopsis = $data['sinopsis'];
        $poster = $data['poster'];
        $banner = $data['banner'];
        $link = $data['link'];  
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin-dash.css">
    <title>Dashboard-Movies</title>
</head>
<body>
    <div class="sidebar">
        <span class="info">THE FLASH</span>
        <ul class="menu">
            <li>
                <a href="info-movie.php">
                    <span>Movie</span>
                </a>
            </li>
            <li>
                <a href="info-comic.php">
                    <span>Comic</span>
                </a>
            </li>
            <li>
                <a href="dash-users.php">
                    <span>User</span>
                </a>
            </li>
            <li class="logout">
                <a href="logout.php">
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="main">
        <h1>Welcome, Admin <?=$user;?></h1><br><br>
        <div class="input">
            <h2>Input/Update Movie</h2>
            <form action="dash-process.php" method="POST" enctype="multipart/form-data">
            <div class="leftside">
                <input type="hidden" name="id" value="<?=$id;?>">
                <input type="hidden" name="from_page" value='movie'>
                <label for="nama_film">Movie Name</label>
                <input type="text" name="nama_film" value="<?=$nama;?>">
                <label for="info">Info</label>
                <input type="text" name="info" value="<?=$info;?>">
                <label for="sinopsis">Synopsis</label>
                <textarea name="sinopsis" id="sinopsis" cols="30" rows="10"><?=$sinopsis;?></textarea>
                <label for="link">Link</label>
                <input type="url" name="link" value="<?=$link;?>">
            </div>
            <div class="rightside">
                <label for="poster">Poster</label>
                <input type="file" name="poster" id="poster" accept=".jpg, .png">
                <label for="banner">Banner</label>
                <input type="file" name="banner" id="banner" accept=".jpg, .png">
                <?php if ($edit_state_movie == false): ?>
                    <button type="submit" name="save" >Save</button>
                <?php else: ?>
                    <button type="submit" name="update" >Update</button>
                <?php endif ?>
            </div>
            </form>
            <?php if ($edit_state_movie == true): ?>
                <a href="dash-movies.php"><button>Cancel</button></a>
            <?php endif ?>
        </div>
        <div class="data">
            <h2>Data Movies</h2>
            <table>
                <tr>
                    <th>No</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Info</th>
                    <th>Synopsis</th>
                    <th>Poster</th>
                    <th>Banner</th>
                    <th>Link</th>
                    <th>Action</th>
                </tr>
                <?php
                    $result = mysqli_query($koneksi,"SELECT * FROM film");
                    $n = 1;
                    while ($data = mysqli_fetch_assoc($result)){
                        echo"<tr><td>$n</td>";
                        echo"<td>$data[id_film]</td>";
                        echo"<td>$data[nama_film]</td>";
                        echo"<td>$data[info]</td>";
                        echo"<td>$data[sinopsis]</td>";
                        echo"<td><img src='image/poster/" . $data['poster'] . "' width='100'></td>";
                        echo"<td><img src='image/banner/" . $data['banner'] . "' width='150'></td>";
                        echo"<td>$data[link]</td>";
                        echo "<td><a href='dash-movies.php?edit=$data[id_film]'>Edit</a> | 
                                <a href='dash-process.php?delMovie=$data[id_film]'>Delete</a></td></tr>";
                        $n++;
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>