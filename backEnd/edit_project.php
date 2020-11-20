<?php include_once('includes/header.php');
$project_id = @$_GET['id'];
if (!isset($project_id)) {
  header('Location: addproject.php');
}
require_once("DBConnect.php");
$sql = "SELECT * FROM `kpa_project_list` WHERE `id`='$project_id' Limit 0, 10";
$result = mysqli_query($conn, $sql);
$prev_data = mysqli_fetch_assoc($result);

if (isset($_POST['edit_project'])) {
  $project_id = $_GET['id'];
  $n =$_POST['title'];
  $u = $_POST['description'];
  $e = $_POST['abstract'];
  $p = $_POST['category'];
  $y= $_POST['year'];
  $s= $_POST['sem'];
  $f= $_POST['faculty'];

  $sql = "UPDATE `kpa_project_list` SET `project_title`='$n',`proj_descrip`='$u', `proj_thumb`='$e', `category`='$p',`year`='$y', `semester`='$s', `faculty`='$f' WHERE `kpa_project_list`.`id`='$project_id';";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Data edited successfully!');</script>";
            echo "<script>window.location='addproject.php';</script>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
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
       <a href="user.php" class="simple-text logo-normal">
          <?=($_SESSION['username']);?>  
        </a>
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
            <a class="navbar-brand" href="#pablo">Dashboard</a>
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
        <p id="breadcrumb"><a href="dashboard.php" style="padding-left: 10px;">Home</a> &raquo; <a href="addproject.php">Project List</a> &raquo; Edit project info</p>
        <div class="row">
          <div class="col">
            <div class="card card-stats">
              <div class="card body">
<h5>Edit User Info.</h5>
<form action="" method="POST" name="user">
<table class="table table-striped">
  <tr>
    <td>Project Title:</td>
    <td><input type="text" name="title" placeholder="Enter title" value="<?= $prev_data['project_title'];?>"></td>
  </tr>
  <tr>
    <td>Project Description:</td>
    <td><textarea type="text" name="description" placeholder="Enter description" ><?= $prev_data['proj_descrip'];?></textarea>  </td>
  </tr>
  <tr>
    <td>Project abstract:</td>
    <td><input type="file" name="abstract" id="abstract">Previous img:<img src="../images/<?= $prev_data['proj_thumb'];?>" style="height: 50px;width: 60px"></td>
  </tr>
  <tr>
    <td>Category:</td>
    <td><select name="category" id="category"value="<?= $prev_data['category'];?>">
  <option value="Management System">Management System</option>
  <option value="Commerce">Commerce</option>
  <option value="Robotics">Robotics</option>
  <option value="Games">Games</option>

  <option value="ML and AI">ML and AI</option>

  <option value="Others">Others</option>
  </select></td>
  </tr>
  <tr>
    <td>Year:</td>
    <td><select name="year" id="year" value="<?= $prev_data['year'];?>">
  <option value="1">1</option>
   <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
 </select></td>
  </tr><tr>
    <td>Semester:</td>
    <td><select name="sem" id="semester" value="<?= $prev_data['semester'];?>">
  <option value="First">First</option>
<option value="Second">Second</option>
 <option value="Third">Third</option>
 <option value="Fourth">Fourth</option>
 <option value="Fifth">Fifth</option>
 <option value="Sixth">Sixth</option>
 <option value="Seventh">Seventh</option>
 <option value="Eighth">Eighth</option>
  
  </select></td>
  </tr><tr>
    <td>Faculty:</td>
    <td><select name="faculty" id="faculty" value="<?= $prev_data['faculty'];?>">
  <option value="B.E. Computer">B.E. Computer</option>
  <option value="B.E. Electronics">B.E. Electronics</option>
  </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="edit_project" value="UPDATE"></td>
  </tr>

</table>
</form>
              </div>
            </div>
          </div>
          
        </div>      
      </div>
      <?php include_once('includes/footer.php');?>