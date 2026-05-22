<div class="ac">
    <h2>Patient Login</h2>
    <form id="loginForm" method="POST" action="">
        <div class="ig">
            <label>Patient ID</label>
            <input type="text" placeholder="Enter your patient ID" name="pid" required>
        </div>
        <div class="ig">
            <label>Password</label>
            <input type="password" placeholder="Enter password" name="password" required>
        </div>
        <button type="submit" class="bp" name="lbtn">Sign In</button>
    </form>
    <p class="st">
        New patient? <a href="patient_register.php">Create an account here</a>
    </p>
</div>
<style>
    body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-image:url(patientlog.jpeg);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.ac {
    background:#6f88882b;
    padding: 2.5rem;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    width: 300px;
    height: 300px;
    max-width: 350px;
}

h2 {
    color: #2c3e50;
    margin-bottom: 1.5rem;
    text-align: center;
}

.ig {
    margin-bottom: 1.2rem;
}

.ir {
    display: flex;
    gap: 10px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-size: 0.9rem;
    color: #666;
}

input {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 6px;
    box-sizing: border-box; /* Critical for layout */
}

.bp {
    width: 100%;
    padding: 12px;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 1rem;
    font-weight: bold;
    transition: background 0.3s;
}
.bp:hover {
    background-color: #2980b9;
}

.st {
    text-align: center;
    margin-top: 1.5rem;
    font-size: 0.85rem;
    color: #7f8c8d;
}

.st a {
    color: #3498db;
    text-decoration: none;
}
</style>

<?php
session_start();
if(isset($_POST['lbtn'])){
    $pid = $_POST['pid'];
    $password = $_POST['password'];
    $_SESSION['pid']=$pid;
    $_SESSION['password']=$password;

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'hms');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check credentials
    $sql = "SELECT * FROM patient WHERE Patient_id='$pid' AND ppass='$password'";
    $result = $conn->query($sql);

    if (isset($_SESSION['pid']) && isset($_SESSION['password']) && $result->num_rows > 0) {
        $_SESSION['pid'] = $pid;
        echo "<script>
                alert('Login Successful!');
                window.location.href='patient_dashboard.php';
              </script>";
    } else {
        echo "<script>
                alert('Invalid id or password. Please try again.');
                window.location.href='patient_login.php';
              </script>";
    }

    $conn->close();
}
?>
    

