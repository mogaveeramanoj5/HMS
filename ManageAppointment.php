<!DOCTYPE html>
<html>
<head>
<title>Manage Apointments</title>
<style>
        body {
            font-family: Arial;
            background: #f4f6f9;
        }

        .container {
            width: 90%;
            margin: auto;
            margin-top: 30px;
        }

        h2 {
            background: #2c3e50;
            color: white;
            padding: 12px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background:  #34495e;;
            color: white;
        }
        .btn {
            display: inline-block;
            padding: 7px 10px;
            margin: 15px;
            background-color:#3498db;
            color: white;
            text-decoration: none;
            margin-left:70px;
}
    
        </style>
        
</head>
<body>
<div class="container">
	<h2>Manage Appointments</h2>
	<table>
        <tr>
            <th>Appointment ID</th>
            <th>Doctor ID</th>
            <th>Patient ID</th>
            <th>Date</th>
            <th>Reason</th>
	    <th>status</th>
            <th>Action</th>
        </tr>
        
	<?php
	$conn = mysqli_connect("localhost", "root", "", "hms");
        $sql = "SELECT * FROM appointment";
        $result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_assoc($result)) 
		{ 
                    echo "<tr>
                    <td>".$row['appointment_id']."</td>
                    <td>".$row['doctor_id']."</td>
                    <td>".$row['Patient_ID']."</td>
                    <td>".$row['appointment_date']."</td>
		    <td>".$row['reason']."</td>
                    <td>".$row['Status']."</td>
		    <td>
			<form method='post' >
				<input type='hidden' name='aid' value='".$row['appointment_id']."'>
           			<button type='submit' name='accept' style='background-color: #34495e;color:white;border:none;padding:5px 10px;border-							radius:5px;'>Accept</button>
				<button type='submit' name='reject' style='background-color:darkred;color:white;border:none;padding:5px 10px;border-							radius:5px;'>Reject</button>
        		</form>
    		    </td>
    		    </tr>";
                
               }
        }
        

if(isset($_POST['accept']))
{
	$id = $_POST['aid'];
 	$conn = mysqli_connect("localhost", "root", "", "hms");
	$q = "UPDATE appointment SET Status='Accepted' WHERE Appointment_id='$id'";
    	$run = mysqli_query($conn, $q);
	if($run)
	{
        	echo "<script>alert('Accepted'); window.location.href='ManageAppointment.php';</script>";
	} 
	else 
	{
        	echo "Error: " . mysqli_error($conn);
	}
}


if(isset($_POST['reject']))
{
	$id = $_POST['aid'];
	$q = "UPDATE appointment SET Status='rejected' WHERE Appointment_id='$id'";
	$run = mysqli_query($conn, $q);
	if($run)
	{
        	echo "<script>alert('Rejected'); window.location.href='ManageAppointment.php';</script>";
    	}
	else
	{
        	echo "Error: " . mysqli_error($conn);
    	}
}
?>
                

</table>
</div>
<a href="doctor_dashboard.php" class="btn">Back to Dashboard</a>
</body>
</html>