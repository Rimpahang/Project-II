<?php
$id = @$_GET['id'];
if (!isset($id)) {
	header('Location: upload.php');
}
 
require_once('DBConnect.php');
//get file name
$sql = "SELECT `project_abstract` as `filename` FROM `kpa_project_details` WHERE `id` = '$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
	
	$sql = "DELETE FROM `kpa_project_details` WHERE id='$id';";

	if (mysqli_query($conn, $sql)) {
	  $myFile = "projects/".$row['filename'];
		unlink($myFile) or die("Couldn't delete file");
	    echo "<script>alert('File deleted successfully!');</script>";
        echo "<script>window.location='upload.php';</script>";
	} else {
	    echo "Error deleting record: " . mysqli_error($conn);
	}
}
