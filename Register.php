<!DOCTYPE html>
<html>
<head>
<title>Doctor Registration</title>

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
</style>
</head>

<body>

<div class="container">

<div class="left">
    <h2>Welcome Doctor</h2>
    <p>Create your account to continue</p>
</div>

<div class="right">
    <h2>Doctor Registration</h2>

    <form method="POST">

        <input type="text" name="docid" placeholder="Doctor ID" required>

        <input type="text" name="docname" placeholder="Full Name" required>

        <input type="password" name="docpass" placeholder="Password" required>

        <div class="row">
            <input type="text" name="phone" placeholder="Phone" required>
            <input type="number" name="age" placeholder="Age" required>
        </div>

        <input type="email" name="email" placeholder="Email" required>

        <div class="row">
            <input type="text" name="spl" placeholder="Specialization" required>
            <input type="number" name="exp" placeholder="Experience" required>
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
	$docid=$_POST['docid'];
	$docname=$_POST['docname'];
	$docpass=$_POST['docpass'];
	$age=$_POST['age'];
	$spl=$_POST['spl'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$exp=$_POST['exp'];
	$error=array();

		$cn=@mysqli_connect('localhost','root','','hms');
		$qry="select *from doctor where Email='".$email."'";
		$r=mysqli_query($cn,$qry);
		$rc=mysqli_num_rows($r);
		if($rc!=0)
		{
				echo"<script>alert('Email already found please enter unique email');
				window.location.href='Register.php';</script>";
		}
		
		$qry="select *from doctor where Doctor_id=".$docid."";
		$r=mysqli_query($cn,$qry);
		$rc=mysqli_num_rows($r);
		if($rc==0)
		{
			$qryin="insert into doctor(Doctor_id,docname,docpass,Age,Specialization,Phone,Email,Experience)values(".$docid.",'".$docname."','".			$docpass."',".$age.",'".$spl."',".$phone.",'".$email."',".$exp.")";
			$r=mysqli_query($cn,$qryin);
			if($r)
			{
				echo"<script>alert('Registration is succesfulll');
				window.location.href='Login.php';</script>";
			}
		}
		else
		{
				echo"<script>alert('doctor id already found please login');
				window.location.href='Login.php';</script>";
		
		}
	

}
?>
</html>