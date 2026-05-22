<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Dashboard</title>

    <style>
        body {
            margin: 0;
            height: 100vh;
            font-family: Arial;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            height: 103vh;
            background: #10431e;
            color: white;
            padding-top: 20px;
        }

        .sidebar h2 {
            text-align: center;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 15px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: #107c6a;
        }

        /* Content */
        .content {
            flex: 1;
            padding: 20px;
            height: 100vh;
             background:center no-repeat url('pdash.jpeg');
             background-size:cover;
        }

        .card {
            background: white;
            padding: 20px;
            margin: 15px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px gray;
            display: inline-block;
            width: 200px;
            text-align: center;
        }
        .cad{
            display: flex;
            justify-content: space-evenly;
        }
        .cad p{
            font-size: 24px;
            color: #333;
        }
    </style>

    <script>
        function loadPage(page) {
            document.getElementById("frame").src = page;
        }
    </script>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar">
    <h2>Patient Panel</h2>
    <a href="book-appointment.php" onclick="loadPage('book-appointment.php')">Book Appointment</a>
    <a href="view-prescription.php" onclick="loadPage('view-prescription.php')">View Prescription</a>
    <a href="index.html">Logout</a>
</div>

<!-- Main Content -->
<div class="content">
<div class="con">
    <!-- Welcome -->
    <h1>Welcome Patient 👋</h1>
    <p>Manage your patient records and appointments easily from here.</p>
</div>
<div class="cad">
    <!-- Cards -->
    <?php
    $conn = mysqli_connect("localhost", "root","", "hms");

    $doc = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM doctor"));
    $pat = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM patient"));
    ?>

    <div class="card">
        <h3>Total Doctors</h3>
        <p><?php echo $doc; ?></p>
    </div>

    <div class="card">
        <h3>Total Patients</h3>
        <p><?php echo $pat; ?></p>
    </div>

    <div class="card">
        <h3>System Status</h3>
        <p>Active</p>
    </div>
    </div>

</div>

</body>
</html>