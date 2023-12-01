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
        $
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
                <a href="inf">
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
                $result = mysqli_query($koneksi,"SELECT * FROM movie");
                $n = 1;
                while ($data = mysqli_fetch_assoc($result)){
                    echo"<tr><td>$n</td>";
                    echo"<td>$data[id_film]</td>";
                    echo"<td>$data[nama_film]</td>";
                    echo"<td>$data[info]</td>";
                    echo"<td>$data[sinopsis]</td>";
                    echo"<td>$data[poster]</td>";
                    echo"<td>$data[banner]</td>";
                    echo"<td>$data[link]</td>";
                    echo "<td><a href</td></tr>";
                    $n++;
                }
            ?>
        </table>
    </div>
</body>
</html>