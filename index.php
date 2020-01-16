<!DOCTYPE html>
<html lang="en">
<head>
	<title>Khwopa Project Archive</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

	<style>

	.fakeimg {
		height: 200px;
		background: #aaa;
	}
	.jumbotron{
		height: 3%;
		padding-top: 20px;
		padding-bottom: 5px;
	}
	.navbar{
		height: 80px;
	}
</style>
</head>
<body>

	<div class="jumbotron text-center" style="margin-bottom:0; font-family: cursive; color: blue;">
		<h1>Khwopa Project Archive</h1>
	</div>
	<!-- Navigation -->
	<nav class="navbar navbar-expand-md bg-light navbar-light sticky-top">
		<div class="container-fluid">

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span> 
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<form class="form-inline" action="/action_page.php">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Search</button>
				</form>  
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link " href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-success" href="#">Categories</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-success" href="#">Top Projects</a>
					</li>   
					<li class="nav-item">
						<a class="nav-link text-success" href="#">Project Titles</a>
					</li> 
					<li class="nav-item">
						<a class="nav-link text-success" href="#">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-success" href="#">Contact</a>
					</li>
				</ul>
			</div> 
		</div> 
	</nav>
<div class="row">
	<!-- Image Slider -->
<div id="myCarousel" class="carousel slide col-md-8" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/image2.png" alt="img2" width="900" height="500">
    </div>
    <div class="carousel-item">
      <img src="images/image1.jpg" alt="img1" width="900" height="500">
    </div>
    <div class="carousel-item">
      <img src="images/image3.jpg" alt="img3" width="900" height="500">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<div class="col-md-4 notice-bar" style="background-color: orange;">
	HELLO
</div>
</div>

	<!-- Jumbotron -->
	<div class="container-fluid">
		<div class="row jumbotron">
			<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
				<p class="para">This is the online collection of old projects done in our college. Want to become member??? Click the button and be our friend rather than guest.</p>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
				<a href="#"><button type="button" class="btn btn-outline-secondary btn-light">Register</button></a>
			</div>
		</div>
	</div>


</body>
</html>
