
<!DOCTYPE html>
<html>
<head>
	<title>Doctor - View Patients</title>
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
            width: 90%;
            margin: 20px auto;
        }

        .search-box {
            margin-bottom: 15px;
        }

        input[type="text"] {
            padding: 8px;
            width: 200px;
        }

        input[type="submit"] {
            padding: 8px 15px;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th {
            background-color: #3498db;
            color: white;
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
            text-align: center;
            margin-top: 20px;
            color: gray;
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
	<h2>View Patient Details</h2>
</div>
<div class="container">
	<form method="post" class="search-box">
        <input type="text" name="id" placeholder="Enter Patient id" required>
        <input type="submit" name="search" value="Search">
        <a href="doctor_dashboard.php" class="btn">Back to Dashboard</a>
	</form>
    
<table>
	<tr>
		<th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Disease</th>
                <th>Address</th>
	</tr>
<?php
	if(isset($_POST['search']))	
	{
	    $id = $_POST['id'];
	    $conn = mysqli_connect("localhost", "root", "", "hms");
            $sql = "SELECT p.Patient_ID,p.pname,p.phone,p.email,p.age,p.gender,p.address,a.reason FROM patient p
                    JOIN appointment a ON p.Patient_ID = a.Patient_ID WHERE  p.Patient_ID=".$id."";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0)
            {
               	while($row = mysqli_fetch_assoc($result)) 
		        { 
                    echo "<tr>
                    <td>".$row['Patient_ID']."</td>
                    <td>".$row['pname']."</td>
                    <td>".$row['phone']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['age']."</td>
                    <td>".$row['gender']."</td>
                    <td>".$row['reason']."</td>
                    <td>".$row['address']."</td>
                    </tr>";
                }
            }
            else
            {
                echo "<tr><td colspan='9'>No patient details are found</td></tr>";
            }
    }
    
    else
        {
              echo "<tr><td colspan='9'>Please enter a valid Patient ID</td></tr>";
        }

?>
</table>
</div>
<div class="footer">
      <p>Doctor Module - Hospital Management System</p>
</div>
</body>
</html>