<?php include('includes/header.php') ?>
<body data-spy="scroll" data-target="#navbarResponsive">
    <!--  Project Title  -->
  <!-- Navigation bar-->
  <?php include('includes/nav.php') ?>

        <!-- Registration Request -->
      <div class="container-fluid fixed-bottom reg">
        <div class="container-fluid fixed-bottom reg jumbotron d-md-flex justify-content-center align-items-center position-relative bg-info">
          <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
            <p class="para">Want to become member? Click the button and be our friend rather than guest.</p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 d-inline-block">
                        <a href="#"><button type="button" class="btn btn-outline-success btn-light">Register</button></a>
                    </div>
                    <div class="fa fa-times position-absolute" id="reg-cross" style="color: black; right: 20px; top: 3px;">
                    </div>
                </div>
            </div>
            <div class="row"  style="background-color: #666666"><div class="col-8">
  <img src="images/image2.png" style="height: 100%; width: 90%;">
              </div>
            <div class="col-4" style="color: white" >
              <h1 style="margin-top: 5px;color: black">Welcome to Khwopa Project Archive</h1>
              <p style="font-size: 16px; text-align: justify;margin-right: 10px; margin-top: 25px;">Are you starting to do a project for the first time? Do you need help on how to start? You have come to right place. Khwopa Project Archive is where you can find many project done by students of Khwopa Engineering College. It is an archive of all kinds of project you can view and get ideas from and get your own project started. This website is the platform to showcase project samples for you to get ideas from and develop your own project.<p><button type="button" class="btn btn-info" >Lets get started!</button></p></p>
            </div>
  </div>
        <!---Welcome Section--->
       
        <div class="container1 text-center">
            <h2>How a good Project is made?</h2><br>
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
         
            <hr class="hr1">
          
        <!--Three column section-->
        <div class="container padding">
          <div class="row padding">
            <div class="col-xs-4 col-sm-4 col-md-4">
              <h3 class="text-info">To start a project</h3>
              <p> The first step to start a project is to choose a topic of your interest. So, start by exploring some of the potential project titles.<br><a class="btn btn-primary btn-md" href="#" role="button">EXPLORE »</a></p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
              <h3 class="text-info">Explore available projects</h3>
              <p> After looking at some project titles, lets view some projects of your likings.<br><br><a class="btn btn-primary btn-md" href="#" role="button">EXPLORE »</a></p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
              <h3 class="text-info">Guidelines</h3>
              <p> The following link provides the files containg college provided guidelines. <br> <br><a class="btn btn-primary btn-md" href="#" role="button">DOWNLOAD</a></p>
            </div>
            
          </div>
          <hr class="my-4">
        </div>
       
        
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
          This website is a platform where members of a project group can find various range of projects to choose from or to use as a reference. Since this site was made just to overcome the difficulties faced by the students conducting the project for the first time, it should be easy to begin a project discussing available projects as a member of KPA. You get access by requesting samples of project as well and discuss it among ur group.
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
          Since this site is accessible to both the teachers and students, both party can communicate making KPA a medium. This will allow smooth transitioning of the project throughout its whole phases.
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
          All the members of KPA can download the sample project if their request for that project gets accepted. They can also upload their projects which will serve as a reference to the future visitors as well.
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



</body>
</html>
<?php include('includes/footer.php') ?>
 