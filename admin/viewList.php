<?php 
include ('../db.php');
include('../headerFooter/header.php');
// check login,,,,,

session_start();
if (isset($_SESSION['is_adminlogin'])) {
	$aEmail=$_SESSION['aEmail'];
}

else{
	echo "<script>location.href='login.php'; </script>";
}
?>




<!-- nav bar -->

<?php include ('nav.php'); ?>


<!-- body part  -->
<div class="container mt-5">
	<div class="table mt-5 pt-5">
		<h3>Employee Attendance List</h3>

		<table class="table table-bordered">
			
			<thead class="text-center bg-dark text-warning">
				<th>Serial No.</th>
				<th>Employee Name</th>
				<th>Email</th>
				<th>Duty Time</th>
				<th>Present Time</th>
				<th>Attendance</th>
			</thead>

			<!-- show employee list from database -->

			<?php

			if ($_GET['date']) {
				$date=$_GET['date'];

				$sql="SELECT DISTINCT name,email,dtTime,presentTime,attend  from present_tb where presentDate='".$date."'";
				$res=$conn->query($sql);

				if ($res->num_rows>0) {
					$i=0;
					while ($row=$res->fetch_assoc()) {
						$i++;
				?>

				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $row['name']?></td>
					<td><?php echo $row['email']?></td>
					<td><?php echo $row['dtTime']?></td>
					<td><?php echo $row['presentTime']?></td>
					<td class="btn btn-success ml-4"><?php echo $row['attend']?></td>
				</tr>

				<?php
					}
				}
			}
			?>
		</table>
		
	</div>
</div>