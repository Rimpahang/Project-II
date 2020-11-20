<?php include_once('includes/header.php');

if (isset($_POST['add_project'])) {
  
  $n =$_POST['title'];
  $u = $_POST['description'];
  $e = $_POST['abstract'];
  $p = $_POST['category'];
  $y= $_POST['year'];
  $s= $_POST['sem'];
  $f= $_POST['faculty'];

  $sql = "INSERT INTO `kpa_project_list` (`project_title`, `proj_descrip`, `proj_thumb`, `category`, `year`, `semester`, `faculty`) VALUES ('$n', '$u', '$e', '$p', '$y', '$s', '$f');";
include('DBConnect.php');
if (mysqli_query($conn, $sql)) {
     echo "<script>alert('Project Added Successfully!');</script>";
            echo "<script>window.location='addproject.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}
?>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="yellow" data-active-color="success">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="img/default-avatar.png">
          </div>
        </a>
        <a href="dashboard.php" class="simple-text logo-normal">
<?=($_SESSION['username']);?>        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="">
            <a href="dashboard.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>

            </a>
          </li>
          <li class="">
            <a href="users.php">
                    <i class="fa fa-users"></i>                  
              <p>Users</p>
            </a>
          </li>
          <li class="active">
            <a href="addproject.php">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Projects</p>
            </a>
          </li>
          <!-- <li>
            <a href="notifications.php">
              <i class="nc-icon nc-bell-55"></i>
              <p>Notifications</p>
            </a>
          </li> -->
          <li>
            <a href="user.php">
              <i class="nc-icon nc-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
         
          <li class="">
            <a href="upload.php">
              <i class="nc-icon nc-caps-small"></i>
              <p>Upload Files</p>
            </a>
          </li>
          <li class="">
            <a href="../home.php">
              <i class="nc-icon nc-caps-small"></i>
              <p>Back to Homepage</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="dashboard.php">Dashboard</a>

<?php

require_once("DBConnect.php");

$sql = "SELECT * FROM `kpa_project_list` WHERE `is_verified`='0' ORDER BY `id` ASC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {?>

            <button class="btn btn-light" href="validateproject.php" style="text-align: right; margin-left: 400px;" >View unvalidated projects</button><?php } ?>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
           <ul class="navbar-nav">
              <!-- <li class="nav-item">
                <a class="nav-link btn-magnify" href="#pablo">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li> -->
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="logout.php">
                  <i class="fa fa-sign-out" alt='logout'></i>
                  <p>
                    <span class="d-lg-none d-md-block">Logout</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <p id="breadcrumb"><a href="dashboard.php" style="padding-left: 10px;">Home</a> &raquo; <a href="addproject.php">Project List</a> &raquo; Validate projects</p>
          
        <div class="row">
          <div class="col"><p>The submitted project which are to be validated are listed below:</p>
            <div class="card card-stats">
              <div class="card body">
                <?php
require_once("DBConnect.php");

$sql = "SELECT * FROM `kpa_project_list` WHERE `is_verified`='0' ORDER BY `id` ASC";
$result = mysqli_query($conn, $sql);
?>
                <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Project Title</th>
      <th scope="col">Project Description</th>
      <th scope="col">Thumbnail</th>
      <th scope="col">Category</th>
      <th scope="col">Year</th>
      <th scope="col">Semester</th>
      <th scope="col">Faculty</th>
      <th scope="col">Actions</th>
           
      </tr>
  </thead>
  <?php
if (mysqli_num_rows($result) > 0) {
   
    $i=0;
    while($row = mysqli_fetch_assoc($result)) {
?>
  <tbody>
   <tr>
        <td><?= ++$i;?></td>
        <td><?= $row["project_title"];?></td>
        <td><?= $row["proj_descrip"];?></td>
        <td><img src="../images/<?= $row["proj_thumb"];?>"style="height: 100px;width: 100px"> </td>
        <td><?= $row["category"];?></td>
        <td><?= $row["year"];?></td>
        <td><?= $row["semester"];?></td>
        <td><?= $row["faculty"];?></td>
        <td><a href="validatep.php?id=<?= $row['id'];?>">Validate</a> &nbsp;&nbsp;<a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete_project.php?id=<?= $row['id'];?>">Delete</a></td>
    </tr>
  </tbody>
  <?php
    }   
} else {
    ?>
    <tr>
        <td colspan="3">No Record(s) found.</td>
    </tr>
    <?php
}
?>
<?php 
mysqli_close($conn);
?>
</table>
              </div>
            </div>
          </div>

        </div>     
      </div>
      <?php include_once('includes/footer.php');?>