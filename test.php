<?php
require_once("backEnd/includes/DBConnect.php");

$sql = "SELECT * FROM `kpa_project_list` WHERE 1 Limit 0, 10";
$result = mysqli_query($conn, $sql);
?>

<?php

        while($row = mysqli_fetch_assoc($result)) {

?>
     <?= $row["id"];?>
       <?= $row["project_title"];?>
      <?= $row["proj_descrip"];?>
       <?= $row["proj_thumb"];?>
       <?= $row["year"];?>
        
<?php
    }   
?>
<?php 
mysqli_close($conn);
?>
