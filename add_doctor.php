<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add doctor</title>
    
</head>
<body class="page-body">
    <div class="registration-card">
        <div class="card-header">
            <h2 class="header-title">Add doctor</h2>
        </div>

        <form class="registration-form" action="" method="POST">
            <div class="form-group">
                <label class="field-label">Doctor ID</label>
                <input type="text" class="input-field" name="docid">
            </div>

            <div class="form-group">
                <label class="field-label">Full Name </label>
                <input type="text" maxlength="50" required class="input-field" name="docname">
            </div>

            <div class="form-group">
                <label class="field-label">Password</label>
                <input type="password" maxlength="50" required class="input-field" name="docpass">
            </div>

            <div class="form-group">
                <label class="field-label">Phone Number</label>
                <input type="tel" pattern="[0-9]{10}" required class="input-field" name="phone">
            </div>

            <div class="form-group">
                <label class="field-label">Email address</label>
                <input type="email" maxlength="50" required class="input-field" name="email">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="field-label">Age</label>
                    <input type="text" max="150" required class="input-field1" name="age">
                </div>
            </div>

            

            <div class="form-group full-width">
                <label class="field-label">Specialization</label>
                <input type="text" maxlength="100" required class="input-field" name="spl">
            </div>

            <div class="form-group full-width">
                <label class="field-label">Experience</label>
                 <input type="text" max="150" required class="input-field" name="exp">
            </div>

            <div class="form-group full-width actions">
                <input type="submit" class="submit-button" name="sbtn" value="submit">
            </div>
        </form>
    </div>

</body>
<style>/* General Page Styling */
.page-body {
    background-color: #f8fafc;
    font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
    padding: 3rem 1.5rem;
    margin: 0;
    color: #334155;
}

/* Card Container */
.registration-card {
    max-width: 900px;
    margin: 0 auto;
    background: #ffffff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    border: 1px solid #e2e8f0;
}

/* Header Section */
.card-header {
    background-color: #2563eb;
    padding: 1.5rem 2rem;
}

.header-title {
    color: #ffffff;
    font-size: 1.5rem;
    font-weight: 700;
    margin: 0;
}

.header-subtitle {
    color: #dbeafe;
    font-size: 0.875rem;
    margin-top: 5px;
}

/* Form Layout */
.registration-form {
    padding: 2rem;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
}

.full-width {
    grid-column: span 2;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}

/* Labels and Inputs */
.field-label {
    display: block;
    font-weight: 600;
    font-size: 0.875rem;
    margin-bottom: 0.5rem;
    color: #475569;
}

.field-label-small {
    display: block;
    font-weight: 700;
    font-size: 0.75rem;
    text-transform: uppercase;
    color: #64748b;
    margin-bottom: 0.25rem;
}

.input-field, .select-field, .textarea-field {
    width: 100%;
    padding: 0.6rem;
    border: 1px solid #cbd5e1;
    border-radius: 4px;
    font-size: 1rem;
    box-sizing: border-box; /* Ensures padding doesn't break width */
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
}
.input-field1 {
    width: 210%;
    padding: 0.6rem;
    border: 1px solid #cbd5e1;
    border-radius: 4px;
    font-size: 1rem;
    box-sizing: border-box; /* Ensures padding doesn't break width */
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
}
.input-field1:focus, .select-field:focus, .textarea-field:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
}


.input-field:focus, .select-field:focus, .textarea-field:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
}


/* Button */
.submit-button {
    width: 100%;
    background-color: #2563eb;
    color: white;
    padding: 0.875rem;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    transition: background-color 0.2s;
    margin-top: 1rem;
}

.submit-button:hover {
    background-color: #1d4ed8;
}

/* General Page Styling */
.page-body {
    background-color: #f8fafc;
    font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
    padding: 3rem 1.5rem;
    margin: 0;
    color: #334155;
}

/* Card Container */
.registration-card {
    max-width: 800px;
    margin: 0 auto;
    background: #ffffff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    border: 1px solid #e2e8f0;
}

/* Header Section */
.card-header {
    background-color: #2563eb;
    padding: 1.5rem 2rem;
}

.header-title {
    color: #ffffff;
    font-size: 1.5rem;
    font-weight: 700;
    margin: 0;
}

.header-subtitle {
    color: #dbeafe;
    font-size: 0.875rem;
    margin-top: 5px;
}

/* Form Layout */
.registration-form {
    padding: 2rem;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
}

.full-width {
    grid-column: span 2;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}

/* Labels and Inputs */
.field-label {
    display: block;
    font-weight: 600;
    font-size: 0.875rem;
    margin-bottom: 0.5rem;
    color: #475569;
}

.field-label-small {
    display: block;
    font-weight: 700;
    font-size: 0.75rem;
    text-transform: uppercase;
    color: #64748b;
    margin-bottom: 0.25rem;
}

.input-field, .select-field, .textarea-field {
    width: 100%;
    padding: 0.6rem;
    border: 1px solid #cbd5e1;
    border-radius: 4px;
    font-size: 1rem;
    box-sizing: border-box; /* Ensures padding doesn't break width */
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
}

.input-field:focus, .select-field:focus, .textarea-field:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
}

/* Special Fields */
.auto-gen-field {
    background-color: #f1f5f9;
    padding: 0.75rem;
    border-radius: 6px;
    border: 1px solid #e2e8f0;
}


/* Button */
.submit-button {
    width: 100%;
    background-color: #2563eb;
    color: white;
    padding: 0.875rem;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    transition: background-color 0.2s;
    margin-top: 1rem;
}

.submit-button:hover {
    background-color: #1d4ed8;
}

/* Responsive adjustments */
@media (max-width: 640px) {
    .registration-form {
        grid-template-columns: 1fr;
    }
    .full-width {
        grid-column: span 1;
    }
}
</style><?php
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
				window.location.href='add_doctor.php';</script>";
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
				echo"<script>alert('Doctor added succesfully');
				window.location.href='admin_dashboard.php';</script>";
			}
		}
		else
		{
				echo"<script>alert('doctor already exist');
				window.location.href='add_doctor.php';</script>";
		
		}
	

}
?>
</html>