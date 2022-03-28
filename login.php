<?php
include('db.php');
session_start();

if(!isset($_SESSION['is_login'])){
  
  if(isset($_REQUEST['email'])){
   
    $email = mysqli_real_escape_string($conn,trim($_REQUEST['email']));
    $password = mysqli_real_escape_string($conn,trim($_REQUEST['password']));
   
    $sql = "SELECT email, password FROM empssign WHERE email='".$email."' AND password='".$password."' limit 1";
    $result = $conn->query($sql);
    
   
    if($result->num_rows == 1){
      $_SESSION['is_login'] = true;
      $_SESSION['email'] = $email;
      // Redirecting to RequesterProfile page on Correct Email and Pass
      echo "<script> location.href='index.php'; </script>";
      exit;
    }

    else {
      $msg = '<div class="alert alert-warning mt-2" role="alert"> Enter Valid Email and Password </div>';
    }
  }
} 
else {
  echo "<script> location.href='index.php'; </script>";
}
?>

<?php include('headerFooter/header.php'); ?>


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



<div class="formbox ">
	<form action="" method="post">
		
		<h4 class="text-center"><i class='bx bx-edit mr-2' ></i>Employee Login Form</h4>
		<p class="text-center text-danger mb-3"><strong><i>A&A consulting ltd.</i></strong></p>

		

		<label for="email">Employee Email</label>
		<input type="email" name="email" class="form-control" required>

		<label for="password">Password</label>
		<input type="password" name="password" class="form-control" required>
		
	

		<button class="btn btn-info mt-3" name="submit">Login</button>
		
		<?php if (isset($msg)) {
			// code...
			echo $msg;
		}
		?>
	</form>
	
</div>
