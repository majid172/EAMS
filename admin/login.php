<?php
include('../db.php');
session_start();

if(!isset($_SESSION['is_adminlogin'])){
  
  if(isset($_REQUEST['aEmail'])){
   
    $aEmail = mysqli_real_escape_string($conn,trim($_REQUEST['aEmail']));
    $aPassword = mysqli_real_escape_string($conn,trim($_REQUEST['aPassword']));
   
    $sql = "SELECT a_email, a_password FROM adminlogin_tb WHERE a_email='".$aEmail."' AND a_password='".$aPassword."' limit 1";
    $result = $conn->query($sql);
    
   
    if($result->num_rows == 1){
      $_SESSION['is_adminlogin'] = true;
      $_SESSION['aEmail'] = $aEmail;
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

<?php include('../headerFooter/header.php'); ?>



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
        
        <h4 class="text-center"><i class='bx bx-edit mr-2' ></i>Admin Login Form</h4>
        <p class="text-center text-danger mb-3"><strong><i>A&A consulting ltd.</i></strong></p>

        

       <label for="email" class="pl-2 font-weight-bold">Email</label>
       <input type="email" class="form-control" placeholder="Email" name="aEmail">
                        
        <small class="form-text">We'll never share your email with anyone else.</small>

        <label for="pass" class="pl-2 font-weight-bold">Password</label>

        <input type="password" class="form-control" placeholder="Password" name="aPassword">
        
    

        <button class="btn btn-info mt-3" name="submit">Login</button>
        
        <?php if (isset($msg)) {
            // code...
            echo $msg;
        }
        ?>
    </form>
    
</div>






