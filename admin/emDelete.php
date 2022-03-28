<?php 
include ('../db.php');
include ('../headerFooter/header.php');
// check login/.......

session_start();
if (isset($_SESSION['is_adminlogin'])) {
	$aEmail=$_SESSION['aEmail'];
}

else{
	echo "<script>location.href='login.php'; </script>";
}

error_reporting(0);

$del=$_GET['delete'];
$sql="DELETE FROM empssign WHERE id='$del'";
$data=$conn->query($sql);

if ($data) {
	$msg = '<div class="alert alert-success mt-2" role="alert">Successfully deleted</div>';
}
else{
	$msg = '<div class="alert alert-success mt-2" role="alert">Fail to Delete</div>';
}

?>

<div class="container">
	<?php if(isset($msg)){
		echo $msg;
	}
	?>
	<a href="employeeList.php" class="btn btn-danger"> Back to List</a>
</div>