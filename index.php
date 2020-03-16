<?php
require_once("backEnd/includes/DBconnect.php");
$get_data_sql = "SELECT * FROM `kpa_project_list`";
$result_data = mysqli_query($conn, $get_data_sql);
if (mysqli_num_rows($result_data) > 0) {
    $json_array = array();
    while ($row = mysqli_fetch_assoc($result_data)) {
        $json_array[] = $row;

    }
}
 $jencode = json_encode($json_array);

file_put_contents('search_json'.'.json',$jencode);
?>


<!DOCTYPE html>
<html lang="en">
<?php include('includes/head.php'); ?>
<body data-spy="scroll" data-target="#navbarResponsive">
    <!--  Project Title  -->
	<div class="jumbotron text-center" style="margin-bottom:0;font-family: cursive; color: blue;">
		<h1>Khwopa Project Archive</h1>
	</div>
	<!-- Navigation bar-->
	<nav class="navbar navbar-expand-md bg-light navbar-light sticky-top mt-1">
        <!-- Navbar toggler-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
                <!--  Search bar  -->
            <ul class="list-group-horizontal navbar-nav">
                <form class="form-inline" role="search" action="/search_result.php">
                    <li><input class="form-control mr-sm-2" type="search" placeholder="Search" id="navBarSearch" aria-label="Search" style="margin-top: 4px;"></li>
                    <li class="ml-2"><button class="btn btn-outline-success " type="submit" style="margin-top: 4px;">Search</button></li>
                </form>
            </ul>
            <ul class="list-group" id="sResult"></ul>

            <!--  Navbar links  -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link " href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-success" href="#">Project Titles</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-success dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
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
                    <a class="nav-link text-success" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-success" href="#">Contact</a>
                </li>
            </ul>
        </div>
	</nav>

	<!-- Carousel -->
	<div id="slides" class="carousel slide " data-ride="carousel" data-interval="4000">
		<ul class="carousel-indicators">
			<li data-target="#slides" data-slide-to="0" class="active"></li>
			<li data-target="#slides" data-slide-to="1"></li>
			<li data-target="#slides" data-slide-to="2"></li>
			<li data-target="#slides" data-slide-to="3"></li>
		</ul>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="images/image1.jpg" style="height: 400px; width: 100%;margin-top: 20px;">
			</div>  
			<div class="carousel-item">
				<img src="images/image2.png" style="height: 400px; width: 100%;margin-top: 20px;">
			</div> 
			<div class="carousel-item">
				<img src="images/image3.jpg" style="height: 400px; width: 100%;margin-top: 20px;">
				<div class="carousel-caption">
					<h1 class="display-9">Third Sem. Project</h1>
					<button type="button" class="btn btn-outline-secondary btn-lg">More</button>
					<button type="button" class="btn btn-primary btn-lg">Hello!!!</button>
				</div>
			</div> 
			<div class="carousel-item">
				<img src="images/image4.png" style="height: 400px;width: 100%;margin-top: 20px;">
			</div> 
			          <ul class="list-group col-sm-3" id="sResult"></ul>

		</div>
        <!-- Prev and Next Buttons for carousel-->
		<a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span></a>
        <a class="carousel-control-next" href="#slides" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span></a>
    </div>
			<!-- Registration Request -->
			<div class="container-fluid fixed-bottom reg">
				<div class="container-fluid fixed-bottom reg jumbotron d-md-flex justify-content-center align-items-center position-relative bg-info">
					<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
						<p class="para">Want to become member? Click the button and be our friend rather than guest.</p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 d-inline-block">
                        <a href="signup.php"><button type="button" class="btn btn-outline-success btn-light">Register</button></a>
                    </div>
                    <div class="fa fa-times position-absolute" id="reg-cross" style="color: black; right: 20px; top: 3px;"></div>

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
							<p class="lead">Khwopa Project Archive Khwopa Project Archive Khwopa Project Archive</p>
						</div>
					</div>
				</div><br>
				<!--Three column section-->
				<div class="container-fluid padding">
					<div class="row text-center padding">
						<div class="col-xs-12 col-sm-6 col-md-4">
							<a href="#"><h3 class="text-info">Student</h3></a>
							<p>Khwopa Project Archive</p>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<a href="#"><h3 class="text-info">Teacher</h3></a>
							<p>Khwopa Project Archive</p>
						</div>
						<div class="col-sm-12 col-md-4">
							<i class="fab fa-code"></i>
							<a href="#"><h3 class="text-info">Supervisior</h3></a>
							<p>Khwopa Project Archive</p>
						</div>
					</div>
					<hr class="my-4">
				</div>
				<!--- Two column section --->
				<div class="container-fluid padding bg-light">
					<div class="row padding">
						<div class="col-lg-4">
							<h2>More About KPA...</h2>
							<p>Khwopa Project Archive Khwopa Project Archive</p>
							<p>Khwopa Project Archive Khwopa Project Archive Khwopa Project Archive</p>
							<div id="more" class="collapse">
								Khwopa Project Archive Khwopa Project Archive<br>Khwopa Project Archive Khwopa Project Archive</div><br>
								<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#more">Read More</button><br><br>

							</div>
							<div class="col-lg-4">
								<img src="images/image4.png" class="img-fluid img-thumbnail" style="height: 300px; width: 80%;margin-right: 80%;">
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
								<img src="images/analyze.jpg" class="rounded-circle" id="icon" style="height: 160px;">
								<h4>Analyze</h4>
								</div>
							</div>
								<div class="col-sm-3">
									<div class="zoom">
									<img src="images/evaluate.png" class="rounded-circle" id="icon" style="height: 160px;">
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
								<p>Khwopa Project Archive Khwopa Project Archive Khwopa Project Archive Khwopa Project Archive Khwopa Project Archive Khwopa Project Archive Khwopa Project Archive</p>
								<p>Khwopa Project Archive Khwopa Project Archive Khwopa Project Archive Khwopa Project Archive Khwopa Project Archive</p>	
								</div>
								</div>
								</div> 
								<hr class="hr1">
								<!---Accordion-->
								<div class="container">
 <h2 style="text-align: center;">Be KPA's Member For:</h2>
  <p>As you <strong>register in KPA</strong> and <strong>become member</strong> you come across with various facilities which would enrich your surfing experience on KPA.</p>
  <div id="accordion">
    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseOne" >
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

<!-- Comment using Ckeditor5 -->
    <form action="/receive_feedback.php">
	    <center><label for="editor">
		    <h4 class="font-weight-bolder" style="text-align: center;">Leave Feedback</h4>
		    </label></center><br>
        <div class="form-group">
            <div class="justify-content-center d-flex col-sm-12">
                <div class="col-md-8" style="min-height: 200px;">
                    <textarea id="editor" placeholder="Please leave your feedback here!">
                    </textarea>
                    <div class="text-right mt-2">
                        <button type="submit" class="btn btn-primary sub">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>

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
			<a href="#" class="fa fa-facebook-square" title="facebook" style="font-size: 30px"></a>
			<a href="#" class="fa fa-twitter-square" title="twitter" style="font-size: 30px"></a>
			<a href="#" class="fa fa-google" title="google" style="font-size: 30px"></a>
			<a href="#" class="fa fa-youtube-square" title="youtube" style="font-size: 30px; background: grey; "></a>
		</div>
		<!---KPA info at footer--->
		<div class="col-sm-3">
			<img src="images/kpa.jpg" class="icon" alt="KPA"><br><br>
			<a href="#" class="fa fa-home" title="Home" style="font-size: 17px;margin-right: 10px;"></a>
			<a href="#" class="fa fa-id-card" title="Contact" style="font-size: 17px;margin-left: 10px;margin-right: 10px;"></a>
			<a href="#" class="fa fa-comment" title="Feedback" style="font-size: 17px;margin-left: 10px;margin-right: 10px;"></a>
				<a href="#" class="fa fa-question" title="FAQs" style="font-size: 17px;margin-left: 10px;"></a>
		</div>
	</div>

</footer>
	<div class="col-xs-12" style="background: brown; height: 22px;">
		<h5 style="text-align: center; color: white; font-size: 15px;"><i class="fa fa-copyright" style="font-size:16px;margin-top: 3px;">  2020 KPA</i></h5>
	</div>

</body>
</html>

<!--Query for ckeditor-->
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );

    //jquery for registration request fadeout
    $(document).ready(function () {
        $("#reg-cross").click(function () {
        $(".reg").fadeOut();
        });
    });

// live search using JSON and JQuery AJAX
$(document).ready(function(){
    $.ajaxSetup({ cache: false })
    $('#navBarSearch').keyup(function(){
        $('#sResult').html('');
        var sText = $('#navBarSearch').val();
        if (sText != ''){
            var expression = new RegExp(sText, "i");
            $.getJSON('search_json.json', function(data) {
                $.each(data, function(key, value){
                    if (value.project_title.search(expression) != -1 || value.semester.search(expression) != -1) {
                        $('#sResult').append('<li class="list-group-item link-class" height="50" width="50">' + value.project_title + ' | <span class="text-muted">' + value.semester + '</span></li>');
                    }
                });
            });
        }
    });
});

</script>
