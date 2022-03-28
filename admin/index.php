<?php 
include('../db.php');
include('../headerFooter/header.php');

session_start();
if (isset($_SESSION['is_adminlogin'])) {
	$aEmail=$_SESSION['aEmail'];
}

else{
	echo "<script>location.href='login.php'; </script>";
}
?>

<!-- css link -->
<link rel="stylesheet" type="text/css" href="style.css">

<!-- icon -->
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

<?php include ('nav.php'); ?>

	<div class="sec1 container-fluid">

		<div class="container">
	<div class="text-center mt-5 pt-5">
		<h2 class="text-warning mt-5 pt-5">Welcome to our Website</h2>
		<p class="text-light"><strong>This is our Employee Attendance Management System</strong></p>
		
	</div>
</div>
		
	</div>

<svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,128L60,144C120,160,240,192,360,208C480,224,600,224,720,218.7C840,213,960,203,1080,197.3C1200,192,1320,192,1380,192L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>



<!-- sec2 -->
<div class="sec2">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<img src="../img/about.png" class="aboutImg">
			</div>
			
			<div class="col-sm-6">
				<h3 class="text-right">About Us</h3>

				<p class="text-justify">
					It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors
				</p>
				
			</div>
		</div>
		
	</div>
	
</div>


<!-- sec3 -->

<div class="container mb-5">
	<h3 class="text-center text-warning mt-5 mb-3">Dashboard</h3>

	<div class="row mt-5">

		<div class="col-sm-4 ">
			<div class="card bg-dark shadow p-2 pb-5">
				

				<h3 class="text-center text-light mt-3 p-4">Total Member</h3>

				<?php

				$sql="SELECT count(id) as total from empssign";
				$c=$conn->query($sql);
				$value=$c->fetch_assoc();
				$total_count=$value['total'];
				echo '<p class="text-center text-warning">Number of members: '.$total_count.'</p>';
				 ?>

				
			</div>
		</div>


		<div class="col-sm-4">
			<div class="card bg-dark shadow p-2" style="height: 200px;">
				
				<h3 class="text-center text-light mt-3 p-4">Recently registered</h3>

				<?php

				

				$sql="SELECT name  from empssign ORDER BY id DESC limit 2";
				$result=$conn->query($sql);
				if($result->num_rows>0){
						while($row=$result->fetch_assoc()){
						
							echo '<p class="text-warning" style="line-height:0.5;"><b>Member name: </b>'.$row['name'].'</p>';
							echo '</ul>';
							}
						}
				 ?>

				
			</div>
			
		</div>
		

		<div class="col-sm-4 ">
			<div class="card bg-dark shadow p-2 pb-5">
				
				<h3 class="text-center text-light mt-3 p-4">Total Attendance</h3>

				<?php

				// current time
				$timezone=date_default_timezone_set('Asia/Dhaka');
				$currentDate=date('j/m/Y');

				$sql="SELECT count(serial) as total from present_tb where presentDate='".$currentDate."'";
				$c=$conn->query($sql);
				$value=$c->fetch_assoc();
				$total_count=$value['total'];
				echo '<p class="text-center text-warning">Today number of present: '.$total_count.'</p>';
				 ?>

				
			</div>
		</div>

		
	</div>
	
</div>

<?php include('../headerFooter/footer.php'); ?>