
<!DOCTYPE html>
<html>
<head>
<title>Patient Prescription</title>

<style>
body {
    margin: 0;
    font-family: Arial;
    background: #eef2f7;
}

/* Header */
.header {
    background: #1e293b;
    color: white;
    padding: 15px;
    text-align: center;
}

/* Container */
.container {
    width: 95%;
    margin: 20px auto;
}

/* Search */
.search-box {
    margin-bottom: 20px;
}

input[type="date"]{
    padding: 10px;
    margin-right: 10px;
}

/* Table */
table {
    width:70%;
    border-collapse: collapse;
    background: white;
    margin-left:200px;
    margin-right:10px;
}

th {
    background: #2563eb;
    color: white;
}

th, td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: center;
    
}

tr:hover {
    background: #f1f1f1;
}
.btn {
            display: inline-block;
            padding: 7px 10px;
            margin: 15px;
            background-color:#3498db;
            color: white;
            text-decoration: none;
}
</style>
</head>

<body>

<div class="header">
    <h2>Patient Prescription</h2>
</div>

<div class="container">

<form method="POST" class="search-box">
    <input type="text" name="id" placeholder="Enter Patient ID" required>
    <input type="submit" class="btn" name="search" value="View"> 
    <a href="patient_dashboard.php" class="btn">Back to Dashboard</a>
</form>



</div>

</body>
</html>

<?php
$conn = mysqli_connect("localhost", "root", "", "hms");

$date = date("Y-m-d");

if(isset($_POST['search'])) {
   $id = $_POST['id'];
if ($conn->connect_error) {
                die("<p style='color:red;'>Connection failed: " . $conn->connect_error . "</p>");
            }
            $check = mysqli_query($conn, "SELECT * FROM medicine WHERE Patient_ID='$id'");
            echo" <table>";
                        echo"<tr>";
                        echo"<th>Medicine</th>";
                         echo"<th>Type</th>";
                       echo "</tr>";
            if(mysqli_num_rows($check) > 0) {
                 while($row = mysqli_fetch_assoc($check))
                     {
                        echo "<tr>
                        <td>{$row['Medicine_name']}</td>
                         <td>{$row['Medicine_type']}</td>
                        </tr>";
    }
}
else
{
    echo "<tr><td colspan='8'>No records found</td></tr>";
}
            }
?>