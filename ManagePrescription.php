<!DOCTYPE html>
<html>
<head>
    <title>Manage Medicines</title>

    <style>
        body {
            font-family: Arial;
            background: #f4f6f9;
        }

        .container {
            width: 80%;
            margin: auto;
        }
	.con{
        width: 100%;
        height: 3%;
        display: flex;
        justify-content: space-between;
        
	 }

        h2 {
            background: #2c3e50;
            color: white;
            padding: 10px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #3498db;
            color: white;
        }

        input {
            width: 90%;
            padding: 5px;
        }

        button {
            padding: 6px 12px;
            border: none;
            color: white;
            cursor: pointer;
        }

        .add-btn {
            background: #3498db;
            margin-top: 10px;
        }

        .remove-btn {
            background: red;
        }

        .save-btn {
            background: green;
            margin-top: 10px;
		
        }
        .btn {
            display: inline-block;
            padding: 7px 10px;
            margin: 15px;
            background-color:#3498db;
            color: white;
            text-decoration: none;
}
.btn1 {
            background-color:#3498db;
            color: white;
            text-align: center;
            text-decoration: none;
            /* text-align:vertical; */
            padding: 7px 10px;
            width: 100px;
            justify-content: right;
            /* margin-right: -50%; */
            /* margin-left: 10px; */
}
.btn2 {
            padding: 7px 10px;
            width: 100px;
}
    </style>

<script>
        function addRow() {
            let table = document.getElementById("medTable");
            let row = table.insertRow();
	    row.innerHTML = `
                <td><input type="text" placeholder="Medicine Name" name="medicine_name[]" required></td>
                <td><input type="text" placeholder="Type (Tablet/Syrup)" name="medicine_type[]" required></td>
                <td><button type="button" class="remove-btn" onclick="removeRow(this)">Remove</button></td>
		`;
        }
	function removeRow(btn) {
            let row = btn.parentNode.parentNode;
            row.remove();
        }
</script>
</head>

<body>

<div class="container">
<h2>Manage Medicines</h2>
<form method="POST" action="">

    <label>Select Patient</label>
   <div class="con">	
    <input type="text" class="btn2" placeholder="patient id" name="patient_id" required>
    <a href="doctor_dashboard.php" class="btn1">Dashboard</a>
    </div>
    <br><br>

    <table id="medTable">
        <tr>
            <th>Medicine Name</th>
            <th>Type</th>
            <th>Action</th>
        </tr>

        <tr>
            <td><input type="text" placeholder="Medicine Name" name="medicine_name[]" required></td>
            <td><input type="text" placeholder="Type (Tablet/Syrup)" name="medicine_type[]" required></td>
            <td></td>
        </tr>
    </table>

    <button type="submit" class="add-btn" onclick="addRow()">+ Add Row</button>
    <br><br>

    <center><button type="submit" name="sbtn" class="save-btn">Save Medicines</button></center>

</form>

</div>

</body>
</html>

<?php
$conn = mysqli_connect("localhost", "root", "", "hms");
if(isset($_POST['sbtn'])) {
     $patient_id = $_POST['patient_id'];
    $check = mysqli_query($conn, "SELECT * FROM patient WHERE Patient_ID='$patient_id'");
    if(mysqli_num_rows($check) > 0) {
   $medicine_names = $_POST['medicine_name'];
    $medicine_types = $_POST['medicine_type'];
    for($i = 0; $i < count($medicine_names); $i++) {
        $name = $medicine_names[$i];
        $type = $medicine_types[$i];

        if(!empty($name) && !empty($type)) {
            $query = "INSERT INTO medicine (Patient_ID, Medicine_name, Medicine_type)VALUES (".$patient_id.", '".$name."', '".$type."')";
            mysqli_query($conn, $query);

		
	echo"<script>alert('Medicine added successfully');
	window.location.href='ManagePrescription.php';</script>";
        }
    }
    }
    else
        {
        echo"<script>alert('Patient not exist')</script>";
    }
        }
?>