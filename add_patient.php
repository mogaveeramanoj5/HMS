<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Management System</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body class="page-body">

    <div class="registration-card">
        <div class="card-header">
            <h2 class="header-title">Add Patient</h2>
        </div>

        <form class="registration-form" method="POST" action="">
            
            <div class="form-group">
                <label class="field-label">Patient ID</label>
                <input type="text"  name="pid" reuired class="input-field">
            </div>

            <div class="form-group">
                <label class="field-label">Full Name</label>
                <input type="text" maxlength="50" name="pname" required class="input-field">
            </div>

            <div class="form-group">
                <label class="field-label">Password</label>
                <input type="password" maxlength="50" name="ppass" required class="input-field">
            </div>

            <div class="form-group">
                <label class="field-label">Phone Number</label>
                <input type="tel" pattern="[0-9]{10}" required name="phone" class="input-field" >
            </div>

            <div class="form-group">
                <label class="field-label">Email Address</label>
                <input type="email" maxlength="50" name="email" required class="input-field">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="field-label">Age</label>
                    <input type="number" max="150" name="age" required class="input-field">
                </div>
                <div class="form-group">
                    <label class="field-label">Gender</label>
                    <select name="gender" required class="select-field">
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <div class="form-group full-width">
                <label class="field-label">Residential Address</label>
                <textarea maxlength="100" rows="2" required name="address" class="textarea-field"></textarea>
            </div>

            <div class="form-group full-width actions">
                <button type="submit" class="submit-button">
                    Add Patient
                </button>
            </div>
        </form>
    </div>

</body>
</html>


<?php
// 1. Database Connection
$host = "localhost";
$user = "root";
$pass = ""; 
$db   = "hms";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Get Data from Form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $ppass = $_POST['ppass']; // Encrypt password
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
   

    // 3. Check if pid already exists
    $checkpid = "SELECT * FROM patient WHERE Patient_id = '$pid'";
    $result = $conn->query($checkpid);

    if ($result->num_rows > 0) {
        // User exists -> Redirect to Login
        echo "<script>
                alert('Record already exists! Please login.');
                window.location.href='patient_login.php';
              </script>";
    } else {
        // User does not exist -> Register them
        $sql = "INSERT INTO patient (Patient_id,pname, ppass, phone, email, age, gender, address) 
                VALUES ('$pid', '$pname', '$ppass', '$phone', '$email', '$age', '$gender','$address')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    alert('Patient added successfully Patient ID: ".$pid."');
                    window.location.href='admin_dashboard.php';
                  </script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$conn->close();
?>