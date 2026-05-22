<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial;
            background-image:url(adminlog.jpeg);
            background-size: cover;
             /* background-position: center; */
             /* background-attachment: fixed; */
        }
        .login-box {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            background: rgba(230, 225, 225, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px gray;
        }
        input {
            width: 93%;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
        }
        button {
            width: 100%;
            border-radius: 5px;
            padding: 10px;
            background: #1976d2;
            color: white;
            border: none;
        }
    </style>
</head>
<body>

<div class="login-box">
    <center><h2>Admin Login</h2></center>
    <form method="POST">
        <input type="text" name="username" placeholder="Enter Username" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit" name="login">Login</button>
    </form>
</div>
<?php
 $conn = new mysqli('localhost', 'root', '', 'hms');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Login Successful'); window.location='admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('Invalid Username or Password');window.location='admin_login.php';</script>";
    }
}
?>
</body>
</html>