<?php
require_once('backEnd/includes/DBconnect.php');

$get_notice_sql = "SELECT * FROM `kpa_notice` WHERE `status` = 1";

$result = mysqli_query($conn, $get_notice_sql);
if (mysqli_num_rows($result) > 0){
?>


<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="file:///C:/Users/avika.AVI-LAPTOP/OneDrive/Desktop/KPA%20V/fontawesome-free-5.12.0-web/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="bootstrap/js/jquery.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
    <script type="text/javascript">
        $('#Login-Form').parsley();
        $('#Signin-Form').parsley();
        $('#Forgot-Password-Form').parsley();
    </script>
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }

        .jumbotron {
            height: 3%;
            padding-top: 20px;
            padding-bottom: 5px;
        }

        .navbar {
            /*height: 60px;*/
            text-transform: uppercase;
            font-weight: 700;
            font-size: .9rem;
            letter-spacing: .1rem;
            /*background: rgba(0, 0, 0, .1)!important;*/
        }

        .dropdown:hover > .dropdown-menu {
            display: block;
            background: #e3e3e3;
        }

        #icon {
            max-width: 200px;
            margin: 5% auto;
        }

        hr.hr1 {
            border: 1px light green;
        }

        footer {
            width: 100%;
            background-color: rgba(120, 120, 120);
            padding: 1%;
            color: #fff;
        }

        .fab {
            padding: 5px;
            font-size: 25px;
            color: #fff;
        }

        .fab:hover {
            color: rgb(60, 60, 200);
            text-decoration: none;
        }

        @media (max-width: 900px) {
            .fab {
                font-size: 20px;
                padding: 10px;
            }
        }

        .fas {
            color: #fff;
        }

        .fas:hover {
            color: yellow;
            text-decoration: none;
        }

        #reg-cross:hover {
            cursor: pointer;
        }

        .modal-backdrop {
            z-index: -1;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /*---Signup---*/
        .modal-header, .modal-body, .modal-footer {
            padding: 25px;
        }

        .modal-footer {
            text-align: center;
        }

        #signup-modal-content, #forgot-password-modal-content {
            display: none;
        }

        /** validation */

        input.parsley-error {
            border-color: #843534;
            box-shadow: none;
        }

        input.parsley-error:focus {
            border-color: #843534;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483
        }

        .parsley-errors-list.filled {
            opacity: 1;
            color: #a94442;
            display: none;
        }

        /*CSS for Notice */
        li p, h3 {
            margin: 0;
            padding: 0
        }

        .date-month {

            background: #0f4f99;
            background: -moz-linear-gradient(top, #0f4f99 0%, #000000 100%);
            background: -webkit-linear-gradient(top, #0f4f99 0%, #000000 100%); /* FF3.6-15 */
            background: linear-gradient(to bottom, #0f4f99 0%, #000000 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0f4f99', endColorstr='#000000', GradientType=0); /* IE6-9 */
        }

        .left-side-news {
            margin-left: 6px;
        }

        header {
            height: 100px;
            width: 70%;
            margin: 0 auto;
        }

        button {
            color: black;
            padding-left: 6px;
            font-size: 16px;
            padding-right: 6px;
            border: 2px solid darkblue;

        }

    </style>
</head>
<body data-spy="scroll" data-target="#navbarResponsive">
<div class="jumbotron text-center" style="margin-bottom:0;font-family: cursive; color: blue;">
    <h1>Khwopa Project Archive</h1>
    <!-- <p>KPA</p>  -->
</div>
<!-- Navigation -->
<nav class="navbar navbar-expand-md bg-light navbar-light sticky-top mt-1">
    <!-- <button  type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="container-fluid">
        <!-- <a class="navbar-brand" href="#" data-target="#model" data-toggle="modal">Login</a> -->
        <!-- <img src="images/khwopa.png"> -->
        <div id="login-signup-modal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">

                <!-- login modal content -->
                <div class="modal-content" id="login-modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><span class="glyphicon glyphicon-lock"></span> Login Now!</h4>
                    </div>

                    <div class="modal-body">
                        <form method="post" id="Login-Form" role="form">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                    </div>
                                    <input name="email" id="email1" type="email" class="form-control input-lg"
                                           placeholder="Enter Email" required data-parsley-type="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                    <input name="password" id="login-password" type="password"
                                           class="form-control input-lg" placeholder="Enter Password" required
                                           data-parsley-length="[6, 10]" data-parsley-trigger="keyup">
                                </div>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="" checked>Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-success btn-block btn-lg">LOGIN</button>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <p>
                            <a id="FPModal" href="javascript:void(0)" data-target="#forgot-password-modal-content">Forgot
                                Password?</a> |
                            <a id="signupModal" href="javascript:void(0)" data-toggle="modal"
                               data-target="#signup-modal-content">Register Here!</a>
                        </p>
                    </div>

                </div>
                <!-- login modal content -->

                <!-- signup modal content -->
                <div class="modal-content" id="signup-modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><span class="glyphicon glyphicon-lock"></span> Signup Now!</h4>
                    </div>

                    <div class="modal-body">
                        <form method="post" id="Signin-Form" role="form">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                    </div>
                                    <input name="email" id="email2" type="email" class="form-control input-lg"
                                           placeholder="Enter Email" required data-parsley-type="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                    <input name="password" id="passwd" type="password" class="form-control input-lg"
                                           placeholder="Enter Password" required data-parsley-length="[6, 10]"
                                           data-parsley-trigger="keyup">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                    <input name="password" id="confirm-passwd" type="password"
                                           class="form-control input-lg" placeholder="Retype Password" required
                                           data-parsley-equalto="#passwd" data-parsley-trigger="keyup">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-block btn-lg">CREATE ACCOUNT!</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <p>Already a Member ? <a id="loginModal" href="javascript:void(0)">Login Here!</a></p>
                    </div>
                </div>
                <!-- signup modal content -->

                <!-- forgot password content -->
                <div class="modal-content" id="forgot-password-modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><span class="glyphicon glyphicon-lock"></span> Recover Password!</h4>
                    </div>

                    <div class="modal-body">
                        <form method="post" id="Forgot-Password-Form" role="form">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <icon class="glyphicon glyphicon-envelope"></icon>
                                    </div>
                                    <input name="email" id="email3" type="email" class="form-control input-lg"
                                           placeholder="Enter Email" required data-parsley-type="email">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-block btn-lg">
                                <span class="glyphicon glyphicon-send"></span> SUBMIT
                            </button>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <p>Remember Password ? <a id="loginModal1" href="javascript:void(0)">Login Here!</a></p>
                    </div>

                </div>
                <!-- forgot password content -->

            </div>
        </div>

        <a href="" data-toggle="modal" data-target="#login-signup-modal"
           style="padding-right: 15px; padding-top: 15px;"><p class="text-info">Signup</p></a>


        <!-- Navbar toggler-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <!--  Search bar  -->
            <ul class="list-group-horizontal navbar-nav">
                <form class="form-inline" role="search" id="navBarSearch" action="/search_result.php">
                    <li><input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                               style="margin-top: 4px;"></li>
                    <li class="ml-2">
                        <button class="btn btn-outline-success" type="submit" style="margin-top: 4px;">Search</button>
                    </li>
                </form>
            </ul>
            <!--  Navbar links  -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-success" href="index.html">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-success dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="categories.html">System Management </a>
                        <a class="dropdown-item" href="categories.html">Commerce</a>
                        <a class="dropdown-item" href="categories.html">Robotics</a>
                        <a class="dropdown-item" href="categories.html">Games</a>
                        <a class="dropdown-item" href="categories.html">ML and AI</a>
                        <a class="dropdown-item" href="categories.html">Others</a>
                    </div>

                </li>
                <li class="nav-item">
                    <a class="nav-link text-success" href="addp.html">Add Project</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-success" href="#">Top Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-success" href="#">Project Titles</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Notice</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!---Notice Section-->
<!-- <div style="height: 7px; background-color: dimgray; width: 70%; margin: 0 auto; margin-top: 5px; margin-bottom: 5px"></div> -->
<div style="width: 70%;padding-left: 10px; margin-left: 10px; padding-top: 20px; margin: 0 auto; ">
    <div class="row">
        <div class="col-md-9" style="border: 1px solid gray; border-right: 1px solid gray;">
            <div style="background-color: #a1bae5;" class="row">
                <div class="col-md-5" align="right" style="margin-bottom: 10px;
					">
                    <h4 style="color: darkblue; padding-top: 3px; font-size: 20px; text-align: center; margin-top: 8px;">
                        <b>Notices & Events</b>
                    </h4></div>
                <div class="col-md-5" align="right" style="padding-top: 10px;">
                    <input type="text" name="name" value="" size="30" placeholder=" Search" aria-label="Search">
                    <button style="margin-right: -100px;" type="submit">Search News</button>

                </div>
            </div>
    <?php while($notice = mysqli_fetch_array($result)){ ?>
            <div class="row" style="padding-bottom: 8px; margin-top: 10px;">
                <div class="col-md-11 left-side-news">
                    <h4 style="color: darkblue;"><?php echo($notice['notice_topic']); ?></h4>
                    <p style="color: gray; height: 15px;"><?php echo($notice['published_date']) ?></p>
                </div>
            </div>
            <?php }} ?>
        </div>
    </div>
</div>


			<br><br><br>			
	<!--- Footer-->
<footer class="container-fluid text-center">
	<div class="row">
		<div class="col-sm-3">
			<h3>Meet the Team</h3>
			<h5>Our address and contact info here</h5>
		</div>
		<div class="col-sm-3">
			<h3>Contact Us</h3>
			
			<br>
			<h4>Our address and contact info here</h4>
		</div>
		<div class="col-sm-3">
			<h3>Connect</h3>
			<a href="#" class="fab fa-facebook-square" title="facebook" style="font-size: 30px"></a>
			<a href="#" class="fab fa-twitter-square" title="twitter" style="font-size: 30px"></a>
			<a href="#" class="fab fa-google" title="google" style="font-size: 30px"></a>
			<a href="#" class="fab fa-youtube-square" title="youtube" style="font-size: 30px; background: grey; "></a>
		</div>
		<!---KPA info at footer--->
		<div class="col-sm-3">
			<img src="images/kpa.jpg" class="icon" alt="KPA"><br><br>
			<a href="#" class="fas fa-home" title="Home" style="font-size: 17px;margin-right: 10px;"></a>||
			<a href="#" class="fas fa-id-card-alt" title="Contact" style="font-size: 17px;margin-left: 10px;margin-right: 10px;"></a>||
			<a href="#" class="fas fa-comment-dots" title="Feedback" style="font-size: 17px;margin-left: 10px;margin-right: 10px;"></a>||
				<a href="#" class="fas fa-question" title="FAQs" style="font-size: 17px;margin-left: 10px;"></a>
		</div>
	</div>

</footer>
	<div class="col-xs-12" style="background: brown; height: 22px;">
		<h5 style="text-align: center; color: white; font-size: 15px;"><i class="fa fa-copyright" style="font-size:16px;margin-top: 3px;">  2020 KPA</i></h5>
	</div>

</body>
</html>
<script>
$(document).ready(function(){


    $('#signupModal').click(function(){
     $('#login-modal-content').fadeOut('fast', function(){
        $('#signup-modal-content').fadeIn('fast');
     });
    });

    $('#loginModal').click(function(){
     $('#signup-modal-content').fadeOut('fast', function(){
        $('#login-modal-content').fadeIn('fast');
     });
    });

    $('#FPModal').click(function(){
     $('#login-modal-content').fadeOut('fast', function(){
        $('#forgot-password-modal-content').fadeIn('fast');
        });
    });

    $('#loginModal1').click(function(){
     $('#forgot-password-modal-content').fadeOut('fast', function(){
        $('#login-modal-content').fadeIn('fast');
     });
    });


    $('#Login-Form').parsley();
    $('#Signin-Form').parsley();
    $('#Forgot-Password-Form').parsley();
});

</script>
