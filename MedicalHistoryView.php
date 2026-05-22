<?php
$conn = mysqli_connect("localhost", "root", "", "hms");

// Default query (show all)
// $sql = "SELECT 
// p.Patient_ID, p.pname, p.phone, p.email, p.gender, p.age, p.disease, p.address,
// a.appointment_id, a.appointment_date, a.reason,
// m.medicine_name, m.medicine_type
// FROM patient p
// LEFT JOIN appointment a ON p.Patient_ID = a.Patient_ID
// LEFT JOIN medicine m ON p.Patient_ID = m.Patient_ID";

// $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor - Medical History</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f4f6f9;
            margin: 0;
        }

        .header {
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            text-align: center;
        }

        .container {
            text-align: center;
            width: 95%;
            margin: 20px auto;
        }

        .search-box {
            
            margin-bottom: 15px;
        }

        input[type="number"] {
            padding: 8px;
            width: 200px;
        }

        input[type="submit"] {
            padding: 3px;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: darkgray;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .footer {
            margin-top: 20px;
            color: gray;
        }
        .btn {
            display: inline-block;
            padding:3px;
            margin: 15px;
            background-color:#3498db;
            color: white;
            font-size:14px;
            text-decoration: none;
}
    </style>
</head>

<body>

<div class="header">
    <h2>Medical History View</h2>
</div>

<div class="container">

<form method="post" class="search-box">
    <input type="TEXT" name="id" placeholder="Enter Patient ID" required>
    <input type="submit" name="search" value="Search">
     <a href="doctor_dashboard.php" class="btn">Back to Dashboard</a>
</form>
</div>
<?php
// Search filter
$medic_name=array();
if(isset($_POST['search']))
{
    $id = $_POST['id'];
   
    $sql = "SELECT 
    p.Patient_ID, p.pname, p.phone, p.email, p.gender, p.age, p.disease, p.address,
    a.appointment_id, a.appointment_date, a.reason
    FROM patient p
    LEFT JOIN appointment a ON p.Patient_ID = a.Patient_ID
    WHERE p.Patient_ID='$id'";

    $result = mysqli_query($conn, $sql);
    $med="select medicine_name from medicine where Patient_ID='$id'";
    $med_result=mysqli_query($conn,$med);
    $rs=mysqli_num_rows($med_result);
    if($rs>0){
        while($row = mysqli_fetch_assoc($med_result))
        {
            $medic_name[]=$row['medicine_name'];
        }
    }

    if($result && mysqli_num_rows($result) > 0)
{
    echo "<table>
    <tr>
        <th>Patient ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Age</th>
        <th>Address</th>
        <th>Appointment ID</th>
        <th>Date</th>
        <th>Reason</th>
        <th>Medicine</th>
    </tr>";

    while($row = mysqli_fetch_assoc($result))
    {
        echo "<tr>
        <td>{$row['Patient_ID']}</td>
        <td>{$row['pname']}</td>
        <td>{$row['phone']}</td>
        <td>{$row['email']}</td>
        <td>{$row['gender']}</td>
        <td>{$row['age']}</td>
        <td>{$row['address']}</td>
        <td>{$row['appointment_id']}</td>
        <td>{$row['appointment_date']}</td>
        <td>{$row['reason']}</td>
        <td><select name='medic_name'>";
        foreach($medic_name as $name) {
            echo "<option value='$name'>$name</option>";
        }
        echo "</select></td>
        </tr>";
        
    }

    echo "</table>";
}
else
{
    echo "<table><tr><td>No Medical History Found</td></tr></table>";
}
}
else
    {
        echo "<table><tr><td>Please enter a valid Patient ID</td></tr></table>";
    }
?>

</div>

<div class="footer">
    <center><p>Doctor Module - Hospital Management System</p></center>
</div>
</body>
</html>