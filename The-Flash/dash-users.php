<?php
    session_start();
    include_once('koneksi.php');

    $user = '';
    if(isset($_SESSION['id'])){
        $user = strtoupper($_SESSION['username']);
    }

    if(isset($_GET['del'])){
        $del = $_GET['del'];
        mysqli_query($conn,"DELETE FROM `user` WHERE id_user=$del");
        header("location:users.php");
    }

    function adminCheck($id, $role){
        if ($role == 'admin'){
            echo "<td>-</td></tr>";
        } else if ($role == 'member'){
            echo "<td><a href='dash-users.php?del=".$id."'>Delete</a></td></tr>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin-dash.css">
    <title>Dashboard-Users</title>
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
    <h2>Data Users</h2>
        <table>
            <tr>
                <th>No</th>
                <th>Id</th>
                <th>Email</th>
                <th>Username</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            <?php
                $result = mysqli_query($koneksi,"SELECT * FROM user");
                $n = 1;
                while ($data = mysqli_fetch_assoc($result)){
                    echo"<tr><td>$n</td>";
                    echo"<td>$data[id_user]</td>";
                    echo"<td>$data[email]</td>";
                    echo"<td>$data[username]</td>";
                    echo"<td>$data[role]</td>";
                    adminCheck($data['id_user'], $data['role']);
                    $n++;
                }
            ?>
        </table>
    </div>
</body>
</html>