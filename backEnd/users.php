<?php include_once('includes/header.php');

if (isset($_POST['add_user'])) {
  
  $n =$_POST['name'];
  $u = $_POST['username'];
  $e = $_POST['email'];
  $p = $_POST['password'];
  $re_p = $_POST['password-re'];
   if ($p != $re_p) {
    echo '<script type="text/javascript">alert("Password & Confirm Password don\'t match.");</script>';
  }

  $sql = "INSERT INTO `kpa_user` (`name`,`username`, `email`,`password`)
VALUES ('$n','$u', '$e', md5('$p'))";
require_once('DBConnect.php');
if (mysqli_query($conn, $sql)) {
     echo "<script>alert('User Added Successfully!');</script>";
            echo "<script>window.location='users.php';</script>";
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
<h1>Add User</h1>
<script type="text/javascript">
  function formValidate(){
    if( document.forma.name.value == "" ) {
              alert( "Please provide user's name!" );
              document.forma.name.focus() ;
              return false;
           }
           if( document.forma.username.value == "" ) {
              alert( "Please provide user's username!" );
              document.forma.username.focus() ;
              return false;
           }
           if( document.forma.email.value == "" ) {
              alert( "Please provide your Email!" );
              document.forma.email.focus() ;
              return false;
           }
           if( document.forma.email.value == "" ) {
              alert( "Please provide your Email!" );
              document.forma.email.focus() ;
              return false;
           var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
          if(document.forma.email.value.match(mailformat))
          {
         document.forma.email.focus();
        return true;      
        }
        else{
          alert("You have entered an invalid email address!");
           document.forma.email.focus();
       return false;
     }
           
  }
</script>
<form action="" method="POST" name="forma" onsubmit="return(formValidate());" >
<table class="table table-striped">
  <tr>
    <td>Name:</td>
    <td><input type="text" name="name" placeholder="Enter Full Name" ></td>
  </tr>
  <tr>
    <td>Username:</td>
    <td><input type="text" name="username" placeholder="Enter Username" ></td>
  </tr>
  <tr>
    <td>Email:</td>
    <td><input type="email" name="email" placeholder="Enter Email" ></td>
  </tr>
  <tr>
    <td>Password:</td>
    <td><input type="password" name="password" required="required"></td>
  </tr>
  <tr>
    <td>Confirm Password:</td>
    <td><input type="password" name="password-re" required="required"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name='add_user' class="btn btn-light">
  </tr>
</table>
</form>
              </div>
            </div>
          </div>
          
        </div>   
        <div class="row">
          <div class="col"><p>The users registered are listed below:</p>
            <div class="card card-stats">
              <div class="card body">
                <?php

require_once("DBConnect.php");

$sql = "SELECT * FROM `kpa_user` WHERE 1 Limit 0, 10";
$result = mysqli_query($conn, $sql);
?>
                <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
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
        <td><?= $row["name"];?></td>
        <td><?= $row["username"];?></td>
        <td><?= $row["email"];?></td>
        <td><a href="edit_user.php?id=<?= $row['id'];?>">Edit</a> &nbsp;&nbsp;<a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete_user.php?id=<?= $row['id'];?>">Delete</a></td>
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