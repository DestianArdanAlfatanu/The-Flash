<?php
    session_start();
    require_once "koneksi.php";

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = mysqli_query($koneksi, "SELECT * FROM `user` WHERE username='$username';");
        $row = mysqli_fetch_assoc($result);

        if(is_array($row) && !empty($row)){
            if(password_verify($password, $row['password'])){
                $_SESSION['id'] = $row['id_user'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['role'] = $row['role'];
            }else{
                echo "<a href='Login.php' class='alert'><img src='image/logingagal.png' alt='Kembali'></a>";
            }
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
    <form method="POST" onsubmit="return validateForm()">
    <img src="image/logo.png">
    <h2>Sign In</h2>
      <input type="text" id="username" name="username" placeholder="Username" required oninput="validateUsernameInput()">

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

<script>
    function validateUsernameInput() {
            var usernameInput = document.getElementById('username');
            var inputValue = usernameInput.value;

            // Regular expression to check if the input contains only letters
            var lettersOnlyRegex = /^[a-zA-Z]+$/;

            if (!lettersOnlyRegex.test(inputValue)) {
                alert("Username hanya boleh berupa huruf");
                // Remove non-letter characters from the input
                usernameInput.value = inputValue.replace(/[^a-zA-Z]/g, '');
            }
        }
</script>
    
</body>
</html>
