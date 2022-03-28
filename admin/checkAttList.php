<?php 
include ('../headerFooter/header.php');
include ('../db.php');
// check login....


session_start();
if (isset($_SESSION['is_adminlogin'])) {
	$aEmail=$_SESSION['aEmail'];
}

else{
	echo "<script>location.href='login.php'; </script>";
}

?>



<!-- css -->
<style type="text/css">
	.container{
		margin-top: 20%;
	}
</style>



<!-- nav bar -->

<?php include ('nav.php'); ?>

<div class="container mt-5 ">
	<h3 class="mb-4 mt-5 pt-5">Employee Attendance List</h3>

	<div class="table">
		<table class="table table-bordered text-center">
			
			<thead class="bg bg-dark text-warning">
				<th>Serial No.</th>
				<th>Date</th>
				<th>Attendance</th>
			</thead>

			<?php
				$sql= "SELECT distinct presentDate from present_tb";
				$result=$conn->query($sql);

				if ($result->num_rows>0) {
					$i=0;
					while ($row=$result->fetch_assoc()) {
						$i++;

						?>

				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $row['presentDate']; ?></td>
					<td><a href="viewList.php?date=<?php echo $row['presentDate']; ?>" class="btn btn-dark text-warning">View</a></td>
				</tr>
			<?php
					}
				}
			 ?>
		</table>
	
	</div>

</div>
