<!DOCTYPE html>
<html>
<head>
    <title>Report</title>
    <style>
        body {
            font-family: Arial;
            text-align: center;
            margin-top: 100px;
            
        }
        h2 {
            color: #080f0d;
        }
        .btn {
            display: inline-block;
            padding: 15px 25px;
            margin: 10px;
            background-color:#1976d2;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 18px;
        }

        .btn:hover {
            background-color: #83aded;
        }
        .report {
            background-color:aqua;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            display: inline-block;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4d5c6c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="report">
    <h2>Report</h2>
    <a href="daily_report.php" class="btn">Daily Report</a>
    <a href="monthly_report.php" class="btn">Monthly Report</a>
    </div>
     <center><a href="admin_dashboard.php" class="btn">Back to Dashboard</a></center>
</body>
</html>