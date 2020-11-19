 <!--  Project Title  -->
    <div class="jumbotron text-center" style="margin-bottom:0;font-family:Times New Roman ; color: #7A3BA3;">
    <h1>Khwopa Project Archive</h1>
  </div>
<nav class="navbar navbar-expand-md bg-light navbar-light sticky-top mt-1">
<!-- <button  type="button" data-toggle="collapse" data-target="#navbarResponsive">
      <span class="navbar-toggler-icon"></span> 
    </button> -->
    <div class="container-fluid">
      <!-- <a class="navbar-brand" href="#" data-target="#model" data-toggle="modal">Login</a> --><!-- <img src="images/khwopa.png"> --> 
      <div id="login-signup-modal" class="modal fade" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">

    
     <!-- login modal content -->
       <div class="modal-content" id="login-modal-content">
        
          <div class="modal-header"><h4 class="modal-title"> Login Now!</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-right: 10px; margin-top: -33px;"><span aria-hidden="true">&times;</span></button>
            
          </div>
                  <div class="modal-body">
          <form method="post" id="Login-Form" role="form" >
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><i class="fas fa-user-alt fa-3x"></i></div>
                <input name="username"  class="form-control input-lg" style="margin-left: 5px;margin-top:5px; " placeholder="Enter Username"  data-parsley-type="" required="" data-parsley-length="[3, 20]">
                </div>                      
            </div>
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><i class="fas fa-lock fa-3x"></i></div>
                <input name="password" id="login-password" type="password" class="form-control input-lg" style="margin-left: 10px;margin-top:5px;" placeholder="Enter Password"  data-parsley-length="[6, 10]" data-parsley-trigger="keyup" required="" >

              <div class="input-group-append">
                <div class="input-group-text" style="margin-top: 5px;"><i class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggle1()"></i></div>
              </div>
                </div>                      
            </div>
              <script>
    var state= false;
    function toggle1(){
      if(state){
        document.getElementById("login-password").setAttribute("type","password");
        document.getElementById("eye").style.color='#7a797e';
        state = false;

      }
      else{
        document.getElementById("login-password").setAttribute("type","text");
        document.getElementById("eye").style.color='#5887ef';
        state = true;
      }
    }
  </script>  
            <div class="checkbox">
              <label><input type="checkbox" name="remember_me" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />Remember me</label>
            </div>
              <button type="submit" name="sub" class="btn btn-success btn-block btn-lg">LOGIN</button>
          </form>
        </div>
        
        <div class="modal-footer">
          <p>
          <a id="FPModal" href="javascript:void(0)" data-target="#forgot-password-modal-content">Forgot Password?</a> | 
          <a id="signupModal" href="javascript:void(0)" data-toggle="modal" >Register Here!</a>
          </p>
        </div>
        
       </div>
        <!-- login modal content -->
        
<div class="modal-content" id="signup-modal-content">
        
       <div class="modal-header">
        <h4 class="modal-title"> Signup Here!</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-right: 10px; margin-top: -33px;"><span aria-hidden="true">&times;</span></button>
            
          </div>
                
        <div class="modal-body">
          <form method="post" id="Signin-Form" role="form">
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><i class="fas fa-envelope fa-3x"></i></div>
                <input name="email" id="email2" style="margin-left: 5px;margin-top:5px;" type="email" class="form-control input-lg" placeholder="Enter Email" data-parsley-type="email" required="">
                </div>                     
            </div>
               <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><i class="fas fa-user-alt fa-3x"></i></div>
                <input name="text" id="username" style="margin-left: 5px;margin-top:5px;" type="text" class="form-control input-lg" placeholder="Enter Username" required="" data-parsley-length="[3, 20]" data-parsley-trigger="keyup" data-parsley-required-message="this field is required">
                </div>                     
            </div>
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><i class="fas fa-unlock fa-3x"></i></div>
                <input name="password" id="passwd" style="margin-left: 10px;margin-top:5px;" type="password" class="form-control input-lg" placeholder="Enter Password" required data-parsley-length="[6, 10]" data-parsley-trigger="keyup">

                 <div class="input-group-append">
                <div class="input-group-text" style="margin-top: 5px;"><i class="fa fa-eye" aria-hidden="true" id="eye1" onclick="toggle()"></i></div>
              </div>
                </div>                      
            </div>
              <script>
    var state= false;
    function toggle(){
      if(state){
        document.getElementById("passwd").setAttribute("type","password");
        document.getElementById("eye1").style.color='#7a797e';
        state = false;

      }
      else{
        document.getElementById("passwd").setAttribute("type","text");
        document.getElementById("eye1").style.color='#5887ef';
        state = true;
      }
    }
  </script>
        
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><i class="fas fa-lock fa-3x"></i></div>
                <input name="password" style="margin-left: 5px;margin-top:5px;" id="confirm-passwd" type="password" class="form-control input-lg" placeholder="Retype Password" required data-parsley-equalto="#passwd" data-parsley-trigger="keyup">
                </div>  <!-- data-parsley-pattern="^[a-zA-Z]+$"   -->                  
            </div>
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"></div>
                <p style="font-family: sans-serif; font-size: 11px;margin-top: 15px;">Please provide a photo of Khec ID card (Size < 42Kb):</p>
  <input type="file" name="f" required="" data-parsley-max-file-size="42" data-parsley-trigger="keyup">
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
          <h4 class="modal-title"> Recover Password!</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-right: 10px; margin-top: -33px;"><span aria-hidden="true">&times;</span></button>
            
          </div>

        <div class="modal-body">
          <form method="post" id="Forgot-Password-Form" role="form">
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><i class="fas fa-envelope-open-text fa-3x"></i></div>
                <input name="email1" style="margin-left: 5px;margin-top:5px; " id="email3" type="email" class="form-control input-lg" placeholder="Enter Email" required data-parsley-type="email">
                </div>                     
            </div>         
            <button type="submit" name="sub1" class="btn btn-success btn-block btn-lg">
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
<div class="zoom1">
<a href="home.html">
  <img src="images/logo.png" alt="KPA Logo" title="KPA Logo" 
  style="height: 55px;width: 55px; margin-left: 76px">
</a>
</div>
         <!-- Navbar toggler-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
               
            <!--  Navbar links  -->
          <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link text-success" href="home.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-success" href="#" id="navbarDropdown"role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="categories.php">System Management </a>
          <a class="dropdown-item" href="categories.php">Commerce</a>
          <a class="dropdown-item" href="categories.php">Robotics</a>
          <a class="dropdown-item" href="categories.php">Games</a>
          <a class="dropdown-item" href="categories.php">ML and AI</a>
          <a class="dropdown-item" href="categories.php">Others</a>
        </div>
            
          </li>
                <li class="nav-item">
                    <a class="nav-link text-success" href="addp.php">Add Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-success" href="top-projects.php">Top Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-success" href="project-lists.php">Project Lists</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-success" href="notice.html">Notice</a>
                </li> </ul>
              
            <?php if(isset($_SESSION['username']))
      {     ?><?php echo "hi"; ?>
            <div class="btn-group">
  <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">     <?php   echo  strtoupper($_SESSION['username']);} ?>  </button> 
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Profile</a>
    <a class="dropdown-item" href="#">Requests</a>
    <a class="dropdown-item" href="backEnd/logout.php">Logout</a>
  </div>
</div>  
<?php if(!isset($_SESSION['username']))
      {     ?>
<ul class="navbar-nav ml-auto"> <li class="nav-item">
                  <button class="btn btn-outline-warning" type="button">
                <a  class="text-info" data-toggle="modal" data-target="#login-signup-modal"><b>Sign-in</b></a></button></li></ul><?php }?>

        </div>
  </nav>  