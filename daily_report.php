<?php
$conn = mysqli_connect("localhost", "root", "", "hms");

$date = date("Y-m-d");
$medic_name=array();
if(isset($_POST['search'])) {
    $date = $_POST['date'];
}

$sql = "SELECT 
a.appointment_id,
a.appointment_date,
p.pname,
p.phone,
d.docname
FROM appointment a
JOIN patient p ON a.Patient_ID = p.Patient_ID
JOIN doctor d ON a.doctor_id = d.doctor_id
WHERE DATE(a.appointment_date) = '$date'";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Daily Report</title>

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

input[type="date"], input[type="submit"] {
    padding: 10px;
    margin-right: 10px;
}

/* Table */
table {
    width: 100%;
    border-collapse: collapse;
    background: white;
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
</style>
</head>

<body>

<div class="header">
    <h2>Daily Hospital Report</h2>
</div>

<div class="container">

<form method="POST" class="search-box">
    <input type="date" name="date" value="<?php echo $date; ?>" required>
    <input type="submit" name="search" value="Search">
    <input type="submit" name="back" value="Back" formaction="report.php">
</form>

<table>
<tr>
    <th>Appointment ID</th>
    <th>Date</th>
    <th>Patient Name</th>
    <th>Phone</th>
    <th>Doctor</th>
</tr>

<?php
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<tr>
        <td>{$row['appointment_id']}</td>
        <td>{$row['appointment_date']}</td>
        <td>{$row['pname']}</td>
        <td>{$row['phone']}</td>
        <td>{$row['docname']}</td>
        </tr>";
    }
}
else
{
    echo "<tr><td colspan='8'>No records found</td></tr>";
}
?>

</table>

</div>

</body>
</html>