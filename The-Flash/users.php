<?php
    session_start();
    include_once('koneksi.php');

    if(isset($_GET['del'])){
        $del = $_GET['del'];
        mysqli_query($conn,"DELETE FROM user WHERE id=$del");
        header("location:users.php");
    }

    if(isset($_POST['tambah'])){
        $email = $_POST['email'];
        $password = hash('sha256', $_POST['password']);
        $username = $_POST['username'];
        $role = $_POST['role'];

        $result = mysqli_query($koneksi,"INSERT INTO user(email, username, password, role) 
                    VALUES('$email', '$username', '$password','$role')");

        echo "<script>alert('Berhasil!');</script>";
        header("location:users.php");
    }
?>

<html>
    <head>
        <title>Data Users</title>
        <style>
            table,th,td{
                border-collapse: collapse;
                border: 1px solid black;
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <h2>Data Users</h2>
        <table>
            <tr>
                <th>No</th>
                <th>Id</th>
                <th>Email</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
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
                    echo "<td><a href='update.php?id=".$data['id_user']."'>Edit</a> | 
                    <a href='users.php?del=".$data['id_user']."'>Hapus</a></td></tr>";
                    $n++;
                }
            ?>
        </table><br>

        <h3>Tambah User</h3>
        <form action="users.php" method="POST">
            <table>
                <tr>
                    <td>email</td>
                    <td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td>username</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>role</td>
                    <td>
                        <select name="role" required>
                            <option value="admin">Admin</option>
                            <option value="siswa">Member</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="tambah" value="Tambah"></td>
                    <input type="hidden" name="id_user" value="">
                </tr>
            </table>
        </form>

        <a href="logout.php"><button>Log Out</button></a>
    </body>
</html>