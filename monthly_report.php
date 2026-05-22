<?php
$conn = mysqli_connect("localhost", "root", "", "hms");

$month = date("m");
$year = date("Y");

if(isset($_POST['search'])) {
    $month = $_POST['month'];
    $year = $_POST['year'];
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
WHERE MONTH(a.appointment_date) = '$month'
AND YEAR(a.appointment_date) = '$year'";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Monthly Report</title>

<style>
body {
    margin: 0;
    font-family: Arial;
    background: #eef2f7;
}

.header {
    background: #1e293b;
    color: white;
    padding: 15px;
    text-align: center;
}

.container {
    width: 95%;
    margin: 20px auto;
}

.search-box {
    margin-bottom: 20px;
}

select, input[type="submit"] {
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
    <h2>Monthly Hospital Report</h2>
</div>

<div class="container">

<form method="POST" class="search-box">

<select name="month" required>
    <option value="">Select Month</option>
    <?php
    for($m=1; $m<=12; $m++){
        $selected = ($m == $month) ? "selected" : "";
        echo "<option value='$m' $selected>".date("F", mktime(0,0,0,$m,1))."</option>";
    }
    ?>
</select>

<select name="year" required>
    <?php
    for($y=2022; $y<=2030; $y++){
        $selected = ($y == $year) ? "selected" : "";
        echo "<option value='$y' $selected>$y</option>";
    }
    ?>
</select>

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