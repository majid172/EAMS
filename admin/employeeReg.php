<?php
include('../db.php');
include('../headerFooter/header.php');

//check login.....
session_start();
if (isset($_SESSION['is_adminlogin'])) {
	$aEmail=$_SESSION['aEmail'];
}

else{
	echo "<script>location.href='login.php'; </script>";
}

if(isset($_REQUEST['submit'])){

		$sql="SELECT email FROM empssign WHERE email='".$_REQUEST['email']."'";
		$res=$conn->query($sql);
		if ($res->num_rows == 1) {
			
			$msg='<div class="alert alert-warning mt-2" role="alert">Already registerd</div>';
		}
		
		else{
		$name=$_REQUEST['name'];
		$email=$_REQUEST['email'];
		$pass=$_REQUEST['password'];
		$joinDate=$_REQUEST['joinDate'];
		$startTime=$_REQUEST['startTime'];
		$endTime=$_REQUEST['endTime'];

		$sql="INSERT into empssign(name,email,joinDate,dtStart,dtEnd,password) VALUES('$name','$email','$joinDate','$startTime','$endTime','$pass')";

		if($conn->query($sql)==TRUE){
			$msg = '<div class="alert alert-success mt-2" role="alert">Successfully registerd</div>';
		}
		else{
			$msg = '<div class="alert alert-danger mt-2" role="alert">Unsuccessfully registerd</div>';
		}
	}
}

?>

<style type="text/css">
	body{
		background: #ececec;

	}
	.formbox{
		width: 600px;
		padding: 30px;
		margin: 10% auto;
		box-shadow: 8px 8px 5px gray, -8px -8px 5px white;
	}

</style>


<!-- nav bar -->

<?php include ('nav.php'); ?>


<!-- form -->
<div class="formbox ">
	<form action="" method="post">
		
		<h4 class="text-center"><i class='bx bx-edit mr-2' ></i>Employee Registration Form</h4>
		<p class="text-center text-danger mb-3"><strong><i>A&A consulting ltd.</i></strong></p>

		<label for="name">Employee Name</label>
		<input type="text" name="name" class="form-control" required>

		<label for="email">Employee Email</label>
		<input type="email" name="email" class="form-control" required>

		<div class="row">
			<div class="col-sm-6">
				<label for="joinDate">Join Date</label>
				<input type="date" name="joinDate" class="form-control" required>
			</div>
			
			<div class="col-sm-6">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control" required>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-6">
				<label for="startTime">Duty Start Time</label>
				<input type="time" name="startTime" class="form-control" required>
			</div>
			
			<div class="col-sm-6">
				<label for="endTime">Duty End Time</label>
				<input type="time" name="endTime" class="form-control" required>
			</div>
		</div>

		<button class="btn btn-info mt-3" name="submit">Registration</button>
		<button class="btn btn-danger mt-3" type="reset">Reset</button>
		<a href="index.php" class="btn btn-primary mt-3">Home</a>
		<a href="employeeList.php" class="btn btn-success mt-3">Employee List</a>
		<a href="checkAttList.php" class="btn btn-warning mt-3">Attendance List</a>

		<?php if (isset($msg)) {
			// code...
			echo $msg;
		}
		?>
	</form>
	
</div>

<?php include '../headerFooter/footer.php'; ?>