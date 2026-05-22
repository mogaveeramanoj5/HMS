<!DOCTYPE html>
<html>
<head>
<title>Doctor Login</title>
<body>
    <div class="ac">
    <h2>Doctor Login</h2>
    <form id="loginForm" action="" method="POST">
        <div class="ig">
            <label>Doctor ID</label>
            <input type="text" name="docid" placeholder="Enter your id" required>
        </div>
        <div class="ig">
            <label>Password</label>
            <input type="password" name="pass" placeholder="Enter password" required>
        </div>
        <button type="submit" name="sbtn" class="bp">Sign In</button>
    </form>
    <p class="st">
        New patient? <a href="Register.php">Create an account here</a>
    </p>
</div>
</body>

<style>
    body {
    font-family: Segoe UI, Tahoma, Geneva, Verdana, sans-serif;
    background-image:url(doctorlog.jpeg);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.ac {
    background-color:#7bbdca66;
    padding: 2.5rem;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    width: 300px;
    height: 300px;
    max-width: 350px;
}

h2 {
    color: #2c3e50;
    margin-bottom: 1.5rem;
    text-align: center;
}

.ig {
    margin-bottom: 1.2rem;
}

.ir {
    display: flex;
    gap: 10px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-size: 0.9rem;
    color: #666;
}

input {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 6px;
    box-sizing: border-box; /* Critical for layout */
}

.bp {
    width: 100%;
    padding: 12px;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 1rem;
    font-weight: bold;
    transition: background 0.3s;
}
.bp:hover {
    background-color: #2980b9;
}

.st {
    text-align: center;
    margin-top: 1.5rem;
    font-size: 0.85rem;
    color: #7f8c8d;
}

.st a {
    color: #3498db;
    text-decoration: none;
}
</style>
</html>



<?php
if(isset($_POST['sbtn']))
{	$docid=$_POST['docid'];
	$pass=$_POST['pass'];
	$error=array();
	if(empty($docid))
	{
		$error[]="docid cant be empty";
	}
	if(empty($pass))
	{
		$error[]="password cant be empty";
	}
	if(empty($error))
	{
		$cn=mysqli_connect('localhost','root','','hms');
		$qry="select *from doctor where Doctor_id=".$docid." and docpass='".$pass."'";
		$r=mysqli_query($cn,$qry);
		$rc=mysqli_num_rows($r);
		if($rc!=0)
		{

				echo"<script>alert('login succesfulll');
				window.location.href='doctor_dashboard.php';</script>";
			
		}
		else
		{
				echo"<script>alert('please enter valid id or password ... ');
				window.location.href='login.php';</script>";
		
		}
	}

}
?>