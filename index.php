<?php 
include('db.php');
include('headerFooter/header.php');

session_start();
if (isset($_SESSION['is_login'])) {
	$email=$_SESSION['email'];
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
<div class="sec1">

<div class="container">
	<div class="text-center mt-5 pt-5">
		<h2 class="text-warning mt-5 pt-5">Welcome to our Website</h2>
		<p class="text-light"><strong>This is our Employee Attendance Management System</strong></p>
		
	</div>
</div>

<!-- wave shape -->
<svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,128L60,144C120,160,240,192,360,208C480,224,600,224,720,218.7C840,213,960,203,1080,197.3C1200,192,1320,192,1380,192L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>

</div>

<!-- sec2 -->
<div class="sec2">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<img src="img/about.png" class="aboutImg">
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
	<h3 class="text-center text-warning mt-5 mb-3">Our Employee</h3>

	<div class="row mt-5">

		<div class="col-sm-4 ">
			<div class="card bg-dark shadow p-4">
				<img src="img/emp1.jpg" class="cardImg ">

				<div class="cardDetails text-center">
					<h5 class=" text-warning mt-3">Rabiul Islam</h5>
					<p class="text-center text-light">Web Designer</p>
					<p class=" text-light">
					<i class='bx bxs-phone'></i>
						+88-01XXXXXXXXX
					</p>
				</div>
				
				
			</div>
		</div>

		<div class="col-sm-4 ">
			<div class="card bg-dark shadow p-4">
				<img src="img/emp2.jpg" class="cardImg ">

				<div class="cardDetails text-center">
					<h5 class=" text-warning mt-3">Atik Khan</h5>
					<p class="text-center text-light">Web Developer</p>
					<p class=" text-light">
					<i class='bx bxs-phone'></i>
						+88-01XXXXXXXXX
					</p>
				</div>
				
				
			</div>
		</div>
		

		<div class="col-sm-4 ">
			<div class="card bg-dark shadow p-4">
				<img src="img/emp3.jpg" class="cardImg ">

				<div class="cardDetails text-center">
					<h5 class=" text-warning mt-3">Mohiuddin Ahmed</h5>
					<p class="text-center text-light">Web Designer & Developer</p>
					<p class=" text-light">
					<i class='bx bxs-phone'></i>
						+88-01XXXXXXXXX
					</p>
				</div>
				
				
			</div>
		</div>
		
		
	</div>
	
</div>

<?php include ('headerFooter/footer.php'); ?>