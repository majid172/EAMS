<?php 
include ('../db.php');
include ('../headerFooter/header.php');

// check login.......

session_start();
if (isset($_SESSION['is_adminlogin'])) {
	$aEmail=$_SESSION['aEmail'];
}

else{
	echo "<script>location.href='login.php'; </script>";
}

?>

<style type="">
	body{
		background: #ececec;

	}
	#table{
		height: 550px;
		overflow: scroll;
		border-radius: 30px;
		box-shadow: 8px 8px 5px gray, -8px -8px 5px white;
		margin: 5% auto;
	}
</style>



<!-- nav bar -->

<?php include ('nav.php'); ?>

<div class="container mt-5">
	<div class="row mt-5">
		<h3 class="text-info mt-5">Registered Employee List</h3>
	</div>
	

	<div class="table-responsive" id="table">

		<table class="table table-bordered table-hover mt-4">
			
			<thead class="text-center bg-dark text-warning">
				<th>Serial No.</th>
				<th>Employee Name</th>
				<th>Email</th>
				<th>Joining Date</th>
				<th>Start Duty</th>
				<th>End Duty </th>
				<th>Action</th>
			</thead>

			<tbody>
				<!-- read data from database -->
				<?php 

					$sql="SELECT * from empssign";
					$read=$conn->query($sql);
					if ($read->num_rows>0) {
						while ($row=$read->fetch_assoc()) {
				?>

				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['joinDate']; ?></td>
					<td><?php echo $row['dtStart']; ?></td>
					<td><?php echo $row['dtEnd']; ?> </td>
					<td>
						<a href="emListEdit.php?id=<?php echo $row['id']; ?>" class="btn btn-dark text-warning"><i class='bx bx-edit-alt'></i></a>
						<a href="emDelete.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger"><i class='bx bxs-trash'></i></a>
					</td>
				</tr>
				<?php
						}
					}
				?>
			</tbody>
			
	</table>
	</div>
	
	
</div>


<!-- footer -->
<?php include '../headerFooter/footer.php'; ?>