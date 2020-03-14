<?php include_once('includes/header.php');?>
<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="yellow" data-active-color="success">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="img/default-avatar.png">
          </div>
        </a>
       <a href="#" class="simple-text logo-normal">
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
          <li>
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
          <li class="active">
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
<?php
error_reporting(0);
   if(isset($_FILES['image'])){
       // echo "<pre>";print_r($_FILES['image']);exit;
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("docx","doc","ppt","pptx","pdf","jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="This file type is not allowed!";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be less than or equal to 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"uploads/".$file_name);

         $sql = "INSERT INTO `uploads` (`title`) VALUES ('$file_name');";
         require_once("DBConnect.php");

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('File uploaded successfully!');</script>";
            echo "<script>window.location='upload.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
         
      }else{
         print_r($errors);
      }
   }
?>

<?php
require_once("DBConnect.php");
$sql = "SELECT * FROM `uploads` WHERE 1 Limit 0, 10";
$result = mysqli_query($conn, $sql);?>

        <div class="content">
<form action="" method="POST" enctype="multipart/form-data">
 <input type="file" name="image" required="required" />
 <input type="submit" value="UPLOAD" />
</form><br><br>
<h5>Files</h5>
<table class="table table-striped" border="1" cellspacing="0" cellpadding="20" width="100%">
    <tr>
        <th>S.N.</th>
        <th>Thumbnail</th>
        <th>File Name</th>
        <th>Created At</th>
        <th>Action</th>
    </tr>
<?php
if (mysqli_num_rows($result) > 0) {
     $i=0;
    while($row = mysqli_fetch_assoc($result)) {?>
    <tr>
        <td style="text-align: center;"><?= ++$i;?></td>
        <td style="text-align: center;"><img style="width: 80px; border: 1px solid #eee;" src="uploads/<?= $row["title"];?>" alt="Thumbnail"></td>
        <td><?= $row["title"];?></td>
        <td><?= $row["created_at"];?></td>
        <td style="text-align: center;"><a style="color: #F00; text-decoration: none;" onclick="return confirm('Are you sure you want to delete this file?')" href="delete_file.php?id=<?= $row['id'];?>">&#10008;</a></td>
    </tr>
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
</div></div>
      <?php include_once('includes/footer.php');?>