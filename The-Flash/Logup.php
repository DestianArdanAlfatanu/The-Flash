<?php
  require_once "koneksi.php";
  if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek_email = mysqli_query($koneksi, "SELECT * FROM `user` WHERE email = '$email'");
    $cek_username = mysqli_query($koneksi, "SELECT * FROM `user` WHERE username = '$username'");
    if(mysqli_num_rows($cek_email) != 0 || mysqli_num_rows($cek_username) != 0){
      echo "<a href='Logup.php' class='popup'><img src='image/regisgagal.png' alt='Kembali'></a>";
    } else {
      mysqli_query($koneksi,"INSERT INTO `user`(email, username, password, role) 
                  VALUES ('$email','$username','$password','member')");
      echo "<a href='Login.php' class='popup'><img src='image/regissukses.png' alt='Lanjutkan'></a>";
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <link rel="stylesheet" type="text/css" href="css/Logup.css">
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
      <h2>Sign Up</h2>
        <input type="text" id="email" name="email"  placeholder="Email" autocomplete="off" required>
  
        <input type="text" id="username" name="username" placeholder="Username" autocomplete="off" required>
  
        <input type="password" id="password" name="password" placeholder="Password" autocomplete="off" required>

        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" autocomplete="off" required>
  
        <input type="submit" name="submit" value="Sign Up">
        <p>Do you have an account? <a href="Login.php"><b>Sign In</b></a></p>
      </form>
  
   </div>
  </div>
  
  <div class="container2">
      <img src="image/flashlgn.png">
  </div>
  
  </div>
 

</body>
</html>
