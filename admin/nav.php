<?php
include ('../db.php');

?>
<nav class="navbar navbar-expand-lg navbar-light bg-dark mb-4 fixed-top shadow">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand " href="index.php"><img src="../img/logo.png" style="width:80px; height: 50px;"></a>
    
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    
      <li class="nav-item active">
        <a class="nav-link text-light" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link text-light" href="employeeReg.php">Employee Registration</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="employeeList.php">Employee List</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="checkAttList.php">Attendance</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="logout.php">Logout</a>
      </li>
    </ul>

    <?php 

    $sql="SELECT * from adminlogin_tb WHERE a_email='".$aEmail."' limit 1";
    $res=$conn->query($sql);
    if ($res->num_rows>0) {
        while($row=$res->fetch_assoc())
        {
            echo ' <strong class="text-warning">Hello '.$row['a_name'].'</strong>';
        }
    }

    ?>
  </div>
</nav>
