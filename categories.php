<?php include('includes/header-cat.php') ?>
<body data-spy="scroll" data-target="#navbarResponsive">

	 <?php include('includes/nav.php') ?>
	<div class="container">
		<section class="header">
			<div class="center-div">
					<h1 class="font-weight-bold" style="color: #4e3331 ;">Systems Management</h1>
					<p>Software that manages computer systems in an enterprise, which may include any and all of the following functions: software distribution and upgrading, user profile management, version control, backup and recovery, printer spooling, job scheduling, virus protection and performance and capacity planning. Depending on organizational philosophy, systems management may include network management or come under it. See network management and configuration management.</p><br>
					<div class="header-buttons">
						<a href="https://www.pcmag.com/encyclopedia/term/systems-management">Search on Web</a>
					</div>
				</div>
		</section>
</div>	

<div class="container"> 
<hr class="hr1">
</div>
<br>
<div class="line">
<h2 class="text-center">Khec Projects on Management Systems</h2>
</div>
<div>

<!----project collections----->
<div class="ms">

<div class="container">
	<div class="row">
    <?php

include("backEnd/includes/DBConnect.php");

$sql = "SELECT * FROM `kpa_project_list`";
$result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
?>
    <div class="col-md-3">


		<div class="card shadow" style="width: 15rem;">
			<div class="inner"> 
  <img src="images/logo.png<?php echo($row["proj_thumb"]) ;?>" class="card-img-top" alt="project logo" style="height: 100px; width: 100%;">
</div>
  <div class="card-body text-center">
    <h5 class="card-title"><?= $row["project_title"];?></h5>
    <p class="card-text"><?= $row["proj_descrip"];?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?= $row["semester"];?>,<?= $row["faculty"];?></li>
  </ul>
  <div class="card-body">
    <a href="lms.php" class="card-link">See More...</a>
  </div>
</div>
</div><?php }?>
</div>
</div>
<br><br>

<div class="container"> 
<hr class="hr1">
</div><br>
<!---project recommendations--->
<div class="container">
	<div class="container-fluid padding bg-light">
	<div class="row padding">
		<div class="col-lg-6" style="margin-top: 10px;">
<div class="line">
<h2 class="text-left text-info">Some Recommended Projects:</h2>
</div><br>
<h6 class="text-left">1. Employee Management System</h6>
<h6 class="text-left">2. Payroll Management System</h6>
<h6 class="text-left">3. Online Job Portal System</h6>
<h6 class="text-left">4. Bank and ATM Management System</h6>
<h6 class="text-left">5. Airport Management System</h6>
</div>
<div class="col-lg-6" style="margin-top: 10px;">
	<div class="line">
<h2 class="text-center text-success">Quick Links:</h2></div><br>
 <h6 class="text-left"><i class="
 	fas fa-caret-right"></i><a href="https://www.lovelycoding.org/2013/11/top-18-database-projects-ideas-for.engineering-bca-mca-btech-bsc.html"  style="margin-left: 6px;">List of Management System Projects</a></h6>
<h6 class="text-left"><i class="fas fa-caret-right"></i><a href="https://www.techopedia.com/definition/9615/systems-management"  style="margin-left: 6px;">Definitions and Understanding</a></h6>
<h6 class="text-left"><i class="fas fa-caret-right"></i><a href="https://www.softwaresuggest.com/blog/best-free-open-source-hospital-management-software/"  style="margin-left: 6px;">Free and Open Source Softwares</a></h6>

</div>
</div>
</div>
</div>
<br><br>
<?php include('includes/footer.php') ?>
