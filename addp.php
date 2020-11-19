<?php include('includes/header-addp.php') ?>
<body data-spy="scroll" data-target="#navbarResponsive">

 
      <?php include('includes/nav.php') ?>
	<br>
  <main>
    <div class="container ">
    <div class="container-fluid">
      <div class="site-content">
        <div class="d-flex justify-content-center">
          <div class="d-flex flex-column">
            <h1 class="site-title">Add Your Project Here</h1>
            <p class="site-desc">Add your project here and help it to share and supervised!!!</p>
            <div class="d-flex flex-row">
              <a href="#container2"><input type="button" value="Add Project" class="btn site-btn1 px-4 py-3 mr-4 btn-dark" style="margin-left: 160px;" ></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </main>
  <div class="container"> 
<hr class="hr1">
<h2 style="text-align: center; color: #3357A0;"><b>Why You Should Add Your Project ?</b></h2><br>
</div>
<!--- Service--->
<div class="container col-md-12">
  <div class="container1">
  <div class="service">
  <div class="box">
    <h2>01</h2>
    <h3>To Share</h3>
    <p>After you add your project here, it will be shared with many other college students and teachers. You are not just sharing your project but also your vision!!!</p>
  </div>
   <div class="box">
    <h2>02</h2>
    <h3>To Get Review & Suggestion</h3>
    <p>Your project will be reviewed and rated by different users and college faculties and you will also get some suggestions regarding your project!!! </p>
  </div>
   <div class="box">
    <h2>03</h2>
    <h3>To Keep Your Project Safe</h3>
    <p>Your Project will be safe with us and it will be in the Khec archive collection of projects for many years!!!</p>
  </div>
</div>
</div>
</div><br><br><br>

<!----Add Project Form---->
<div class="container">
  <hr class="hr1">
  <br>
  <div class="container2" id="container2">
  <div class="row">
    
    <div class="col-md-6">
      <div class="h1"><h1 class="text-left">About Project</h1></div>
      <p class="text-left">Add your projects to KPA by filling the form. Enter your project details carefully. After adding your project, other members can get information about your project!!!</p>
    </div>
    <div class="col-md-5">
    <!--2 columns of 6-->
      <div class="row">
        <div class="col-md-6">
          <h3 class="text-left">Add Project Info</h3>
        
      </div>
      <div class="col-md-6"> 
      <span class="glyphicon glyphicon-pencil"></span>
    </div>
    <hr>
    <form action="#" id="form1" onsubmit="return validation()">
      
    <!--column for textbox and label-->
    <div class="row" id="row1">
      
      <label class="label col-md-2 control-label">Project Name</label>
      <div class="col-md-10">
        <input type="text" class="form-control1" name="user" id="user" placeholder="Project Name" autocomplete="off">
        <span id="projectname" class="text-danger font-weight-bold"></span>
        </div>
    </div>
     <div class="row">
      <label class="label col-md-2 control-label">Members</label>
      <div class="col-md-10">
          <textarea class="form-control1" placeholder="Members(Roll. no)" id="member"></textarea>
          <span id="members" class="text-danger font-weight-bold"></span>
      </div>
    </div>
      <div class="row">
      
      <label class="label col-md-2 control-label">Semester</label>
      <div class="col-md-10">
        <select class= "form-control1">
          <option>First</option>
          <option>Third</option>
          <option>Fifth</option>
          <option>Seventh</option>
          <option>Eight</option>
        </select>
        </div>  
    </div>
      <div class="row">
      
      <label class="label col-md-2 control-label">Category</label>
      <div class="col-md-10">
        <select class= "form-control1">
          <option>System Management</option>
          <option>Robotics</option>
          <option>Game</option>
          <option>Commerce</option>
          <option>Ml & AI</option>

        </select>
        </div>
      </div>

    <div class="row">
      
      <label class="label col-md-2 control-label"> E-mail</label>
      <div class="col-md-10">
        <input type="email" class="form-control1" name="email" id="email" placeholder="E-mail">
        <span id="emailid" class="text-danger font-weight-bold"></span>
        </div>
      </div>

    <div class="row">
      <label class="label col-md-2 control-label"> Password</label>
      <div class="col-md-10">
        <input type="password" class="form-control1" name="password" placeholder="Password" id="pass">
         <span id="passid" class="text-danger font-weight-bold"></span><br>
        <input type="checkbox"><small> Remember me!</small>
      </div>
    </div>  

    <div class="row">
      <label class="label col-md-2 control-label"> Confirm Password</label>
      <div class="col-md-10">
        <input type="password" class="form-control1" name="password" placeholder=" Confirm Password" id="conpass">
         <span id="confmpass" class="text-danger font-weight-bold"></span>
        
      </div>
    </div> 
       <div class="row">
      
      <label class="label col-md-2 control-label"> Mob. No.</label>
      <div class="col-md-10">
        <input type="number" class="form-control1" name="mobile" id="mobileNumber">
        <span id="mobileno" class="text-danger font-weight-bold"></span>
        </div>
      </div>
    
<div class="row">
  
      <label class="label col-md-2 control-label">Message</label>
      <div class="col-md-10">
       <textarea class="form-control1"></textarea>
        </div>
      </div>
      <br>

      <div class="row">
        
       <input type="file" id="real-file" hidden="hidden" />
<button type="button" id="custom-button">CHOOSE A FILE</button>
<span id="custom-text">No file chosen, yet.</span>
  
      </div>
<script type="text/javascript">
      const realFileBtn = document.getElementById("real-file");
const customBtn = document.getElementById("custom-button");
const customTxt = document.getElementById("custom-text");

customBtn.addEventListener("click", function() {
  realFileBtn.click();
});

realFileBtn.addEventListener("change", function() {
  if (realFileBtn.value) {
    customTxt.innerHTML = realFileBtn.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt.innerHTML = "No file chosen, yet.";
  }
});
</script>
<br>
    <!-- <div class="row">
    <input type="file" id="file" onchange="return fileValidation()"/>
      
      </div>

<script type="text/javascript">
  function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.docx|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
</script> -->
    
    
      <input type="submit" name="submit" value="Submit"  class="btn btn-info">
  
    <input type="button" id="resetform" name="cancel" value="Clear" class="btn btn-warning" onclick="myfun()">
    </div>
    </div>
    </form>
  </div>
  
</div>
</div>
<br><br>
<?php include('includes/footer.php') ?>