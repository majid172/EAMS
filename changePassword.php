<?php
include('db.php');
include('headerFooter/header.php');

// check login.....
session_start();
if (isset($_SESSION['is_login'])) {
	$email=$_SESSION['email'];
}

else{
	echo "<script>location.href='login.php'; </script>";
}
	
if(isset($_REQUEST['submit'])){

		$id=$_REQUEST['id'];
		$name=$_REQUEST['name'];
		$email=$_REQUEST['email'];
		
		$password=$_REQUEST['password'];

		

		$update="UPDATE empssign SET name='$name', email='$email',password='$password' where id=$id";

		$res=$conn->query($update);
		if($res==TRUE)
		{
			$msg = '<div class="alert alert-success mt-2" role="alert">Successfully updated</div>';
		}
		else{
			$msg = '<div class="alert alert-danger mt-2" role="alert">Unsuccessfully updated</div>';
		}
	}


?>

<!-- css code -->
<style type="text/css">
	body{
		background: #ececec;

	}
	.formbox{
		width: 600px;
		padding: 30px;
		margin: 8% auto;
		box-shadow: 8px 8px 5px gray, -8px -8px 5px white;
	}

</style>


<!-- nav bar -->

<?php include ('nav.php'); ?>

<!-- form design -->



<div class="formbox">
	<form action="" method="post">
		
		<h4 class="mb-5 text-center">Employee's Update Form</h4>



		<!-- read data for update -->
		<?php 

			 if ($_GET['edit']) {
 	// code...
		 	$id=$_GET['edit'];

			$sql="SELECT * FROM empssign WHERE id=$id";
			$res=$conn->query($sql);

			if ($res->num_rows>0) {
				$row=$res->fetch_assoc();
			}


		 }

			?>

		<div class="row">
			<div class="col-sm-4">
				<label for="id">Employee ID</label>
				<input type="text" name="id" class="form-control" value="<?php echo $row['id']; ?>" readonly>
			</div>

			<div class="col-sm-8 ">
				<label for="name">Employee Name</label>
				<input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
				
			</div>
		</div>

		

		<label for="email">Employee Email</label>
		<input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" readonly>

	<label for="email">Change Password</label>
		<input type="password" name="password" value="<?php echo $row['password']; ?>" class="form-control">
		
		

		<button class="btn btn-info mt-3" name="submit">Update</button>
		
		<a href="index.php" class="btn btn-primary mt-3">Back</a>
		
		<?php if (isset($msg)) {
			// code...
			echo $msg;
		}
		?>
	</form>
	
</div>

<?php include 'headerFooter/footer.php'; ?>