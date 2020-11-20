<?php
$project_id = @$_GET['id'];
if (!isset($project_id)) {
  header('Location: validateproject.php');
}
require_once("DBConnect.php");

$sql = "UPDATE `kpa_project_list` SET `is_verified`='1' WHERE `kpa_project_list`.`id`='$project_id';";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Validation successful!');</script>";
            echo "<script>window.location='validateproject.php';</script>";
} else {
    echo "Error validating! " . mysqli_error($conn);
}
mysqli_close($conn);

?>