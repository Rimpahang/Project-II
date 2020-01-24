<!DOCTYPE html>
<html lang="en">
<?php include('includes/head.php'); ?>
<body data-spy="scroll" data-target="#navbarResponsive">

	<div class="jumbotron text-center" style="margin-bottom:0;font-family: cursive; color: blue;">
		<h1>Khwopa Project Archive</h1>
		<p>aka KPA</p> 
	</div>
	<!-- Navigation -->
	<nav class="navbar navbar-expand-md bg-light navbar-light sticky-top">
		<button  type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span> 
		</button>
		<div class="container-fluid">
			<a class="navbar-brand" href="#"><!-- <img src="images/khwopa.png"> --> KPA Navbar</a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span> 
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<form class="form-inline" action="/action_page.php">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"style="margin-top: 4px;">
					<button class="btn btn-outline-success" type="submit" style="margin-top: 4px;">Search</button>
				</form>  
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link " href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-success" href="#">About</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link text-success dropdown-toggle" href="#" id="navbarDropdown"role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="categories.html">Management System</a>
          <a class="dropdown-item" href="categories.html">Commerce</a>
          <a class="dropdown-item" href="categories.html">Robotics</a>
          <a class="dropdown-item" href="categories.html">Games</a>
          <a class="dropdown-item" href="categories.html">ML and AI</a>
          <a class="dropdown-item" href="categories.html">Others</a>
        </div>
						
					</li>
					<li class="nav-item">
						<a class="nav-link text-success" href="#">Top Projects</a>
					</li>   
					<li class="nav-item">
						<a class="nav-link text-success" href="#">Project Titles</a>
					</li> 
					<li class="nav-item">
						<a class="nav-link text-success" href="#">Contact</a>
					</li>
				</ul>
			</div> 
		</div> 
	</nav>
	<!-- Image Slider -->
	<div id="slides"class="carousel slide" data-ride="carousel" data-interval="7000">
		<ul class="carousel-indicators">
			<li data-target="#slides"data-slide-to="0" class="active"></li>
			<li data-target="#slides" data-slide-to="1"></li>
			<li data-target="#slides" data-slide-to="2"></li>
			<li data-target="#slides" data-slide-to="3"></li>
		</ul>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="images/khwopa.png"style="height: 400px; width: 100%;margin-top: 20px;">

			</div>  
			<div class="carousel-item">
				<img src="images/image1.jpg"style="height: 400px; width: 100%;margin-top: 20px;">
			</div> 
			<div class="carousel-item">
				<img src="images/image3.jpg"style="height: 400px; width: 100%;margin-top: 20px;">
				<div class="carousel-caption">
					<h1 class="display-9">Third Sem. Project</h1>
					<button type="button" class="btn btn-outline-secondary btn-lg">More</button>
					<button type="button" class="btn btn-primary btn-lg">Hello!!!</button>

				</div>
			</div> 
			<div class="carousel-item">
				<img src="images/image2.png"style="height: 400px;width: 100%;margin-top: 20px;">
			</div> 
		</div>

		<!-- Prev and Next Buttons -->
		<a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span></a>
			<a class="carousel-control-next" href="#slides" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span></a>
			</div> 
			<!-- Jumbotron -->
			<div class="container-fluid">
				<div class="row jumbotron">
					<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
						<p class="para">This is the online collection of old projects done in our college. Want to become member??? Click the button and be our friend rather than guest.</ p>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
							<a href="#"><button type="button" class="btn btn-outline-secondary btn-light">Register</button></a>
						</div>
					</div>
				</div>
				<!---Welcome Section--->
				<div  class="container-fluid padding">
					<div class="row welcome text-center">
						<div class="col-12">
							<h1 class="display-4">Learn Project</h1>
						</div>
						<hr>
						<div class="col-12">
							<p class="lead">Welcome to the KPA website.wegegetgergscnwebfwehiuhvnfewj hwfhuygscjwq</p>
						</div>
					</div>
				</div><br>
				<!--Three column section-->
				<div class="container-fluid padding">
					<div class="row text-center padding">
						<div class="col-xs-12 col-sm-6 col-md-4">
							<a href="#"><h3 class="text-info">Student</h3></a>
							<p>wefwceweewwe</p>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<a href="#"><h3 class="text-info">Teacher</h3></a>
							<p>wefwceweewwe</p>
						</div>
						<div class="col-sm-12 col-md-4">
							<i class="fab fa-code"></i>
							<a href="#"><h3 class="text-info">Supervisior</h3></a>
							<p>wefwceweewwe</p>
						</div>
					</div>
					<hr class="my-4">
				</div>
				<!--- Two column section --->
				<div class="container-fluid padding bg-light">
					<div class="row padding">
						<div class="col-lg-4">
							<h2>More About KPA...</h2>
							<p>vhbyujnmjnuhuedrvghghukj</p>
							<p>hgyf65eerctvybnuy6rdvbhy6tygdrtyghbnjtfyftfhb</p>
							<div id="more" class="collapse">
								fgdcvhbjhyuhbn,mnyfujbmkjguygyuftrss<br>jhuggbjguytyjhjjhftyff.</div><br>
								<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#more">Read More</button><br><br>

							</div>
							<div class="col-lg-4">
								<img src="images/image4.png" class="img-fluid img-thumbnail"style="height: 300px; width: 80%;margin-right: 80%;">
							</div>
							<!---Quick Links-->
							<div class="col-md-4 notice-bar" style="background-color: orange;">
								HELLO
							</div>
						</div>
					</div>
					<!---End Slider-->
					<div class="container1 text-center">
						<h2>How good Project is made?</h2><br>
						<div class="row">
							<div class="col-sm-3">
								<div class="zoom">
								<img src="images/design.png" class="rounded-circle" id="icon" style="height: 160px;" >
								<h4>Design</h4>
							</div>
							</div>
							<div class="col-sm-3">
								<div class="zoom">
								<img src="images/develop.jpg" class="rounded-circle" id="icon" style="height: 160px;">
								<h4>Develop</h4>
							</div>
							</div>
							<div class="col-sm-3">
							    <div class="zoom">
								<img src="images/analyze.jpg" class="rounded-circle"id="icon" style="height: 160px;">
								<h4>Analyze</h4>
								</div>
							</div>
								<div class="col-sm-3">
									<div class="zoom">
									<img src="images/evaluate.png" class="rounded-circle"id="icon" style="height: 160px;">
									<h4>Evaluate</h4>
								</div>
								</div>
							</div>
						</div>
					</div>
						<hr class="hr1">
												<!--Language-->

						<div class="container">
							<div class="row">
								<h4 class="font-weight-bolder"><a href="#hidden" data-toggle="collapse">Khwopa Project Archive</a></h4>
								<div id="hidden" class="collapse">
								<h4>KPA for students and college...</h4>
								<p>jjewf fns fniuesfhiwuufkjncjkkfuregherugw fbuish sdvbefnwjuieghuhfkndfkwjqhiuehuivhiusvsfnewjkfniuehvushvskcnjnweiuhuieshuvhsih</p>
								<p>efuewhfewhfwrjnfudshchfWUHJKQNRUFHUFHK EFHIWEHF WIUFHIWFHEIF EWUEFH FEWF F EWWEFHEIWFH FHWF9PFKWFENGIOFEWJ </p>	
								</div>
								</div>
								</div> 
								<hr class="hr1">
								<!---Accordion-->
								<div class="container">
 <center><h2 >Be KPA's Member For:</h2></center> 
  <p>As you <strong>register in KPA</strong> and <strong>become member</strong> you come across with various facilities which would enrich your surfing experience on KPA.</p>
  <div id="accordion">
    <div class="card">
      <div class="card-header">
        <a class="card-link" data-toggle="collapse" href="#collapseOne" >
          <p class="text-success">Project Discussion</p>
        </a>
      </div>
      <div id="collapseOne" class="collapse show" data-parent="#accordion">
        <div class="card-body">
          Baaki xa
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
        <p class="text-success">Project Supervision</p>
      </a>
      </div>
      <div id="collapseTwo" class="collapse" data-parent="#accordion">
        <div class="card-body">
          Baaki xa!!
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
         <p class="text-success"> Uploading/Downloading Files</p>
     </a>
      </div>
      <div id="collapseThree" class="collapse" data-parent="#accordion">
        <div class="card-body">
          Baaki xa!!!
        </div>
      </div>
    </div>
  </div>
</div><br><br>
<!--- Footer-->
<footer class="container-fluid text-center">
	<div class="row">
		<div class="col-sm-3">
			<h3>Meet the Team</h3>
			<h5>Our address and contact info here</h45>
		</div>
		<div class="col-sm-3">
			<h3>Contact Us</h3>
			
			<br>
			<h4>Our address and contact info here</h4>
		</div>
		<div class="col-sm-3">
			<h3>Connect</h3>
			<a href="#" class="fa fa-facebook" title="facebook"></a>
			<a href="#" class="fa fa-twitter" title="twitter"></a>
			<a href="#" class="fa fa-google" title="google"></a>
			<a href="#" class="fa fa-youtube" title="youtube"></a>
		</div>
		<div class="col-sm-3">
			<img src="images/kpa.jpg" class="icon" alt="KPA">
		</div>
	</div>

</footer>
	<div class="col-xs-12" style="background: brown;">
		<h5 style="text-align: center; color: white; font-size: 15px;"><i class="fa fa-copyright" style="font-size:16px">  2020 KPA</i></h5>
	</div>
	

</body>
</html>
