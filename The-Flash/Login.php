<?php
    session_start();
    require_once "koneksi.php";

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = mysqli_query($koneksi, "SELECT * FROM `user` WHERE username='$username' AND password='$password'");
        $row = mysqli_fetch_assoc($result);

        if(is_array($row) && !empty($row)){
            $_SESSION['id'] = $row['id_user'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['role'] = $row['role'];
        }else{
            echo "<a href='Login.php' class='alert'><img src='image/logingagal.png' alt='Kembali'></a>";
        }

        if(isset($_SESSION['role'])){
            if($_SESSION['role'] == 'admin'){
                echo "<a href='users.php' class='popup'><img src='image/loginsukses.png' alt='Lanjutkan'></a>";
            }else if($_SESSION['role'] == 'member'){
                echo "<a href='home.php' class='popup'><img src='image/loginsukses.png' alt='Lanjutkan'></a>";
            }else{
                echo "<a href='Login.php' class='alert'><img src='image/logingagal.png' alt='Kembali'></a>";
            }
        }
    }
?>
   

<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <link rel="stylesheet" type="text/css" href="css/Login.css">
</head>
<body>
    <?php
        include 'header.php';
    ?>
<div class="container">
<div class="container1">
 <div class="login-container">
    <form method="POST">
    <img src="image/logo.png">
    <h2>Sign In</h2>
      <input type="text" id="username" name="username" placeholder="Username" required>

      <input type="password" id="password" name="password" placeholder="Password" required>

      <input type="submit" name="submit" value="Sign In">
      <p>Don't have an account? <a href="Logup.php"><b>Sign Up</b></a></p>
    </form>
 </div>
</div>

<div class="container2">
    <img src="image/flashlgn.png">
</div>

</div>
<!-- <script>
const express = require('express');
const app = express();
const bodyParser = require('body-parser');

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// contoh route untuk login
app.post('/login', (req, res) => {
    const username = req.body.username;
    const password = req.body.password;

    // lakukan validasi login di sini, misalnya cek ke database

    res.status(200).json({
        success: true,
        message: 'Login berhasil'
    });
});

// start server
const port = process.env.PORT || 3000;
app.listen(port, () => {
    console.log(`Server is running on port ${port}`);
});
</script> -->
</body>
</html>
