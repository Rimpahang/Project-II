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
            echo "<script>window.location='upload_file.php';</script>";
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
// echo "Nepal";exit();
require_once("DBConnect.php");

$sql = "SELECT * FROM `uploads` WHERE 1 Limit 0, 10";
$result = mysqli_query($conn, $sql);
// $data = mysqli_num_rows($result);
// echo "<pre>"; print_r($result); exit();
?>

<?php include 'includes/header.php';?>
        <p id="breadcrumb"><a href="index.php" style="padding-left: 10px;">Home</a> &raquo; <a href="list_user.php">Upload</a> &raquo; Files</p>
        <div class="content">
<form action="" method="POST" enctype="multipart/form-data">
 <input type="file" name="image" required="required" />
 <input type="submit" value="UPLOAD" />
</form>
<h1>Files</h1>
<table border="1" cellspacing="0" cellpadding="20" width="100%">
    <tr>
        <th>S.N.</th>
        <th>Thumbnail</th>
        <th>File Name</th>
        <th>Created At</th>
        <th>Action</th>
    </tr>
<?php
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    //$user_list = mysqli_fetch_assoc($result);
    // echo "<pre>"; print_r($user_list);exit;
    $i=0;
    while($row = mysqli_fetch_assoc($result)) {
        // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";

?>
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
    <?php include 'includes/footer.php';?>
