<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Appointment</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body class="page-body">

    <div class="registration-card">
        <div class="card-header" style="background-color: #0369a1;">
            <h2 class="header-title">📅 Schedule Appointment</h2>
            <p class="header-subtitle">Fill in the details to reserve your time slot.</p>
        </div>

        <form action="" method="POST" class="registration-form">
            
            <div class="form-group">
                <label class="field-label">Patient ID</label>
                <input type="number" name="patient_id" required class="input-field" placeholder="Enter your ID">
            </div>

            <div class="form-group">
                <label class="field-label">Doctor ID</label>
                <input type="number" name="doctor_id" required class="input-field" placeholder="Enter Doctor's ID">
            </div>

            <div class="form-group full-width">
                <label class="field-label">Appointment Date & Time</label>
                <input type="datetime-local" name="appointment_date" required class="input-field">
            </div>

            <div class="form-group full-width">
                <label class="field-label">Reason for Appointment</label>
                <textarea name="reason" maxlength="100" rows="3" required class="textarea-field" placeholder="Briefly describe your symptoms..."></textarea>
            </div>

            <div class="form-group full-width">
                <button type="submit" class="submit-button" style="background-color: #0369a1;">
                    Book Appointment
                </button>
            </div>
        </form>
    </div>

</body>
</html>

<?php
$conn = new mysqli("localhost", "root", "", "hms");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $p_id = $_POST['patient_id'];
    $d_id = $_POST['doctor_id'];
    $datetime = $_POST['appointment_date'];
    $reason = $_POST['reason'];

    // 🔍 Check Patient exists
    $check_patient = "SELECT * FROM patient WHERE Patient_ID='$p_id'";
    $result_patient = $conn->query($check_patient);
    $check_doctor = "SELECT * FROM doctor WHERE doctor_id='$d_id'";
    $result_doctor = $conn->query($check_doctor);

    if($result_patient->num_rows == 0 || $result_doctor->num_rows == 0){
        echo "<script>alert('Patient or Doctor do not exist');</script>";
        exit();
    }
    else{
    $insert = "INSERT INTO appointment (Patient_ID, doctor_id, appointment_date, reason)
               VALUES ('$p_id', '$d_id', '$datetime', '$reason')";

    if ($conn->query($insert) === TRUE) {
        echo "<script>alert('Appointment booked successfully');</script>";
        echo "<script>window.location.href = 'patient_dashboard.php';</script>";
    } 
    else {
        echo "Error: " . $conn->error;
    }
    }
}

$conn->close();
?>