<?php include_once('includes/header.php');?>
<?php
$user_id = $_SESSION['username'];
if (!isset($user_id)) {
  header('Location: ../home.php');
}
require_once("DBConnect.php");
$sql = "SELECT * FROM `kpa_user` WHERE `username`='$user_id' ";
$result = mysqli_query($conn, $sql);
$prev_data = mysqli_fetch_assoc($result);
if (isset($_POST['update_info'])) {
  $user_id = $_SESSION['username'];
  $n=$_POST['name'];
  $u = $_POST['username'];
  $e = $_POST['email'];
  $a = $_POST['address'];
$s = $_POST['semester'];
$d = $_POST['department'];
$me =$_POST['aboutme'];

$sql_1 = "UPDATE `kpa_user` SET `name`='$n',`username`='$u', `email`='$e',`address`='$a', `semester`='$s', `department`='$d', `aboutme`='$me'  WHERE `username`='$user_id';";
if (mysqli_query($conn, $sql_1)) {
    echo "<script>alert('User info updated successfully!');</script>";
            echo "<script>window.location='normaluserdash.php';</script>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
}?>



<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="" data-active-color="success">
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
          <!-- <li class="">
            <a href="content.php">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>My project requests</p>
            </a>
          </li> -->
          <li>
            <a href="user.php">
              <i class="nc-icon nc-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="">
            <a href="addprojectnormal.php">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Add projects</p>
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
                    <a href="logout.php"><i class="fa fa-sign-out" alt='logout'></i></a>
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
      <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Edit Profile</h5>
              </div>
              <div class="card-body">
                <form method="POST">
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $prev_data['username']; ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" type="email" class="form-control" placeholder="<?php echo $prev_data['email']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Full name" value="<?php echo $prev_data['name']; ?>">
                      </div>
                    </div>                    
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" placeholder="Home Address" name="address" value="<?php echo $prev_data['address']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Semester</label>
                        <input type="text" class="form-control" placeholder="Semester" name="semester" value="<?=$prev_data['semester']; ?>">
                      </div>
                      <div class="form-group">
                        <label>Department</label>
                        <input type="text" class="form-control" placeholder="Department" name="department" value="<?=$prev_data['department']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>About Me</label>
                        <textarea class="form-control textarea" name="aboutme"><?=$prev_data['aboutme']; ?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round" name="update_info">Update Profile</button>
                    

                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
      <?php include_once('includes/footer.php');?>