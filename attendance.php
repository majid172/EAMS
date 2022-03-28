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



// Current local time.......
$timezone=date_default_timezone_set('Asia/Dhaka');
$currentTime= date('h:i:sA || j/m/Y');
$currentDate=date('j/m/Y');

// insert attendance details
if (isset($_REQUEST['submit'])) {
    
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $dtTime=$_REQUEST['dtTime'];
    $presentTime=$_REQUEST['presentTime'];
    $presentDate=$_REQUEST['currentDate'];
    $attend=$_REQUEST['attend'];

    $sql="INSERT into present_tb(name,email,dtTime,presentTime,presentDate,attend) VALUES('$name','$email','$dtTime','$presentTime','$presentDate','$attend')";
    $res=$conn->query($sql);
    if ($res==TRUE) {
        $msg='<div class="alert alert-success mt-2">Successfully Inserted</div>';
    }
    else{
        $msg='<div class="alert alert-warning mt-2">Unsuccessfully Inserted</div>';
    }
    
}

 ?>

<!-- css -->
<style type="text/css">
    body{
        background: linear-gradient(to left, #EEE9E9 70%,#ececec);
    }
    .attendBox{
        width: 600px;
        margin: 10% auto;
        box-shadow: 8px 8px 8px gray, -8px -8px 8px white;
    }
</style>

 <div class="container-fluid">

<!-- nav bar -->
<?php include 'nav.php'; ?>



<!-- design and develop -->

<div class="container">
    <div class="attendBox p-3">

        <h4 class="text-center"><i class='bx bx-edit mr-2' ></i>Employee Attendance Sheet</h4>
        <p class="text-center text-danger mb-3"><strong><i>A&A consulting ltd.</i></strong></p>

        <div class="form mt-4">
            <form action="" method="post">

                <label>Employee name</label>
                <input type="text" class="form-control" name="name" value="<?php 

                $sql="SELECT name from empssign WHERE email='".$email."' limit 1";
                $res=$conn->query($sql);
                if ($res->num_rows>0) {
                    while($row=$res->fetch_assoc())
                    {
                        echo $row['name'];
                    }
                }
                ?>"required>

                <label>Employee email</label>
                <input type="email" class="form-control" name="email" value="<?php 

                $sql="SELECT email from empssign WHERE email='".$email."' limit 1";
                $res=$conn->query($sql);
                if ($res->num_rows>0) {
                    while($row=$res->fetch_assoc())
                    {
                        echo $row['email'];
                    }
                }
                ?>" readonly>

                <div class="row mt-3">
                    
                     <div class="col-sm-6">
                        <label>Duty schedule</label>
                        <select name="dtTime" class="form-control" required> 
                            <option value="">Select duty time</option>
                            <option value="9:00-15:00">9:00-16:00</option>
                         
                            
                        </select>
                    </div>

                

                    <div class="col-sm-6">
                        <label>Present time</label>
                        <input type="text" class="form-control "  name="presentTime" value="<?php echo $currentTime; ?>" readonly>


                    </div>
                </div>

                <input type="hidden" name="currentDate" value="<?php echo $currentDate; ?>">
                <label>Present</label>
                <input type="radio" name="attend"  value="Present" required>

               

               <?php 

               $presentTime=date('H');
               // $presentTimeSrt=date_format($presentTime,'h');
               $startTime='9';
               $endTime='16';
               
               if ($startTime<=$presentTime && $endTime>$presentTime) {
                    echo '<button class="form-control btn btn-info"  name="submit">Attendance</button>';
                   

                }

                else{
                     // echo '<input type="hidden" class="form-control btn btn-info"  name="submit">Att</input> ';
                     ?>
                     <script type="text/javascript">
                         alert("Office starts at 9 a.m and closes at 4 p.m");
                     </script>
                     <?php
                }
                ?>

           <!--      <button class="form-control btn btn-info"  name="submit">Attendance</button> -->





                <?php if (isset($msg)) {
                    // code...
                    echo $msg;
                }
                ?>
            </form>


        </div>
        
    </div>
    
</div>
     
 </div>
