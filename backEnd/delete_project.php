<?php
$project_id = @$_GET['id'];
if (!isset($project_id)) {
	header('Location: addproject.php');
}
 
require_once('DBConnect.php');
$sql = "DELETE FROM `kpa_project_list` WHERE id='$project_id';";

if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    header('Location: addproject.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}