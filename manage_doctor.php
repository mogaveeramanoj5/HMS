<!DOCTYPE html>
<html>
<head>
    <title>Manage Doctor</title>
    <style>
        body {
            font-family: Arial;
            text-align: center;
            margin-top: 100px;
        }

        .btn {
            display: inline-block;
            padding: 15px 25px;
            margin: 10px;
            background-color: #1976d2;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 18px;
        }

        .btn:hover {
            background-color: #0d47a1;
        }
        .doc{
            background-color:aqua;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            display: inline-block;
        }
    </style>
</head>
<body>
<div class="doc">
    <h2>Manage Doctor</h2>

    <a href="add_doctor.php" class="btn">Add Doctor</a>
    <a href="delete_doctor.php" class="btn">Delete Doctor</a>
    <a href="update_doctor.php" class="btn">Update Doctor</a>
</div>
<center><a href="admin_dashboard.php" class="btn">Back to Dashboard</a></center>
</body>
</html>