<?php include_once('includes/header.php');
$user_id = @$_GET['id'];
if (!isset($user_id)) {
  header('Location: users.php');
}
require_once("DBConnect.php");
$sql = "SELECT * FROM `kpa_user` WHERE `id`='$user_id' Limit 0, 10";
$result = mysqli_query($conn, $sql);
$prev_data = mysqli_fetch_assoc($result);

if (isset($_POST['edit_user'])) {
  $user_id = $_GET['id'];
  $n=$_POST['name'];
  $u = $_POST['username'];
  $e = $_POST['email'];
  $sql = "UPDATE `kpa_user` SET `name`='$n',`username`='$u', `email`='$e' WHERE `id`='$user_id';";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Data edited successfully!');</script>";
            echo "<script>window.location='users.php';</script>";
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
          Naresh 
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
          <li class="active">
            <a href="users.php">
                    <i class="fa fa-users"></i>                  
              <p>Users</p>
            </a>
          </li>
          <li class="">
            <a href="content.php">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Projects</p>
            </a>
          </li>
          <li>
            <a href="notifications.php">
              <i class="nc-icon nc-bell-55"></i>
              <p>Notifications</p>
            </a>
          </li>
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
                <a class="nav-link btn-rotate" href="#pablo">
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
        <div class="row">
          <div class="col">
            <div class="card card-stats">
              <div class="card body">
<h5>Edit User Info.</h5>
<form action="" method="POST" name="user">
<table class="table table-striped">
 <tr>
    <td>Name:</td>
    <td><input type="text" name="name" placeholder="Enter Full Name" required="required" value="<?= $prev_data['name'];?>"></td>
  </tr>
 
 <tr>
    <td>Username:</td>
    <td><input type="text" name="username" placeholder="Enter Username" required="required" value="<?= $prev_data['username'];?>"></td>
  </tr>
  <tr>
    <td>Email:</td>
    <td><input type="email" name="email" required="required" value="<?= $prev_data['email'];?>"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="edit_user" value="UPDATE"></td>
  </tr>

</table>
</form>
              </div>
            </div>
          </div>
          
        </div>      
      </div>
      <?php include_once('includes/footer.php');?>