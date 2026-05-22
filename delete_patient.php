<?php
$conn = mysqli_connect("localhost", "root", "", "hms");

if(isset($_POST['delete'])) {
    $id = $_POST['id'];

    $check = mysqli_query($conn, "SELECT * FROM patient WHERE Patient_ID='$id'");

    if(mysqli_num_rows($check) > 0) {
        mysqli_query($conn, "DELETE FROM patient WHERE Patient_ID='$id'");
        echo"<script>alert('Patient deleted succesfully');
				window.location.href='admin_dashboard.php';</script>";
    } else {
        echo"<script>alert('Patient not found');
				window.location.href='admin_dashboard.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Patient</title>
    <style>
        body { font-family: Arial; }

        .box {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0px 0px 10px gray;
            text-align: center;
            border-radius: 8px;
        }

        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
        }

        button {
            padding: 10px 20px;
            background: red;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background: darkred;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Delete Patient</h2>

    <form method="POST">
        <input type="text" name="id" placeholder="Enter Patient ID" required>
        <button name="delete">Delete</button>
    </form>
</div>

</body>
</html>