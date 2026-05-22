<!DOCTYPE html>
<html>
<head>
<title>Patient Registration</title>

<style>
body {
    background: linear-gradient(135deg,#dbeafe,#f0f9ff);
    font-family: Arial;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
    margin:0;
}

.container {
    width: 800px;
    display:flex;
    background:#fff;
    border-radius:10px;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
    overflow:hidden;
}

.left {
    width:40%;
    background:#2563eb;
    color:#fff;
    padding:30px;
}

.right {
    width:60%;
    padding:30px;
}

input {
    width:100%;
    padding:10px;
    margin:8px 0;
    border:1px solid #ccc;
    border-radius:5px;
}

.row {
    display:flex;
    gap:10px;
}

button {
    width:100%;
    padding:10px;
    background:#06b6d4;
    color:#fff;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

button:hover {
    background:#0891b2;

}
.gender-group {
    flex:1;
}

.radio-group {
    display:flex;
    gap:15px;
    margin-top:10px;
}

.radio-option {
    display:flex;
    align-items:center;
    gap:5px;
    font-size:14px;
    cursor:pointer;
}

.radio-option input {
    accent-color:#06b6d4; /* matches your button color */
    cursor:pointer;
}
</style>
</head>

<body>

<div class="container">

<div class="left">
    <h2>Welcome Patient</h2>
    <p>Create your account to continue</p>
</div>

<div class="right">
    <h2>Patient Registration</h2>

    <form method="POST">

        <input type="text" name="pid" placeholder="Patient ID" required>

        <input type="text" name="pname" placeholder="Full Name" required>

        <input type="password" name="ppass" placeholder="Password" required>

        <div class="row">
            <input type="text" name="phone" placeholder="Phone" required>
            <input type="number" name="age" placeholder="Age" required>
        </div>

        <input type="email" name="email" placeholder="Email" required>

        <div class="row">
        <div class="radio-group">
            <label class="radio-option">
                <input type="radio" name="gender" value="male" required>
                <span>Male</span>
            </label>

            <label class="radio-option">
                <input type="radio" name="gender" value="female">
                <span>Female</span>
            </label>

            <label class="radio-option">
                <input type="radio" name="gender" value="other">
                <span>Other</span>
            </label>
        </div>
        </div>
        
        <div class="row">
            <input type="text" name="address" placeholder="Address" required>
        </div>

        <button type="submit" name="sbtn">Register</button>

    </form>

    <br>

</div>

</div>

</body>
</html>
<?php
if(isset($_POST['sbtn']))
{	
	$patid=$_POST['pid'];
	$patname=$_POST['pname'];
	$patpass=$_POST['ppass'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$error=array();

		$cn=@mysqli_connect('localhost','root','','hms');
		$qry="select *from patient where email='".$email."'";
		$r=mysqli_query($cn,$qry);
		$rc=mysqli_num_rows($r);
		if($rc!=0)
		{
				echo"<script>alert('Email already found please enter unique email');
				window.location.href='patient_register.php';</script>";
		}
		
		$qry="select *from patient where Patient_ID='".$patid."'";
		$r=mysqli_query($cn,$qry);
		$rc=mysqli_num_rows($r);
		if($rc==0)
		{
			$qryin="insert into patient(Patient_ID,pname,ppass,age,gender,phone,email,address)values(".$patid.",'".$patname."','".$patpass."',".$age.",'".$gender."',".$phone.",'".$email."', '".$address."')";
			$r=mysqli_query($cn,$qryin);
			if($r)
			{
				echo"<script>alert('Registration is succesfulll');
				window.location.href='patient_login.php';</script>";
			}
		}
		else
		{
				echo"<script>alert('patient ID already found please login');
				window.location.href='patient_login.php';</script>";
		
		}
	

}
?>
</html>