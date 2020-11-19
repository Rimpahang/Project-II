<?php include('includes/header-contact.php') ?>
<body data-spy="scroll" data-target="#navbarResponsive">

	 <?php include('includes/nav.php') ?>
	<br>
 <!--- Two column section --->
        <div class="container">
          <div class="row">
        <div class="container-fluid padding" style="background: #CFE9F1;">
          <div class="row padding">
            <div class="col-lg-6"><br>
            <div class="contact-info">
          <h1 class="title">Let's Get in Touch</h1>
          <p class="text">
         Please kindly contact us if you have ant queries.
         We are always looking forward to your opinions and we will reply you as soon as possible!!! 
          </p>

          <div class="info">
            
            <div class="information">
             <i class="fas fa-map-marked-alt fa-2x" title="KPA Address"></i>
              <h6 style="margin-top: 20px;margin-left: 15px;">Libali-02, Bhaktapur</h6>
            </div>

             
            <div class="information">
              <i class="fas fa-envelope-open fa-2x" title="Email Us"></i>
              <h6 style="margin-top: 20px;margin-left: 15px;">kpa-khec@edu.np</h6>
            </div>

             
            <div class="information">
             <i class="fas fa-phone-square-alt fa-2x" title="Call Us"></i>
              <h6 style="margin-top: 15px;margin-left: 15px;">Landline: 01-45667788,
              Mobile: 9833453453353</h6>
            </div>
          </div>
          <br>
          <div class="social-media">
            <h4 style="color: orange;">Connect with us :</h4>
            <div class="social-icons">
              <a href="#">
                <i class="fab fa-facebook-f" title="facebook"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter" title="twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram" title="instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in" title="linkedin"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

              
              <div class="col-lg-6">
<div class="wrapper1">
  <h2>Contact us</h2>
  <div id="error_message"></div>
  <form id="myform" onsubmit="return validate();">
    <div class="input_field">
        <input type="text" placeholder="Name" id="name">
    </div>
    <div class="input_field">
        <input type="text" placeholder="Subject" id="subject">
    </div>
    <div class="input_field">
        <input type="text" placeholder="Phone" id="phone">
    </div>
    <div class="input_field">
        <input type="text" placeholder="Email" id="email">
    </div>
    <div class="input_field">
        <textarea placeholder="Message" id="message"></textarea>
    </div>
    <div class="btns">
        <input type="submit">
    </div>
  </form>
</div>
</div>
          </div>
        </div>
      </div>
    </div>
      <br>


<?php include('includes/footer.php') ?>
<script>
     function validate(){
  var name = document.getElementById("name").value;
  var subject = document.getElementById("subject").value;
  var phone = document.getElementById("phone").value;
  var email = document.getElementById("email").value;
  var message = document.getElementById("message").value;
  var error_message = document.getElementById("error_message");
  
  error_message.style.padding = "10px";
  
  var text;
  if(name.length < 5){
    text = "Please Enter valid Name";
    error_message.innerHTML = text;
    return false;
  }
  if(subject.length < 10){
    text = "Please Enter Correct Subject";
    error_message.innerHTML = text;
    return false;
  }
  if(isNaN(phone) || phone.length != 10){
    text = "Please Enter valid Phone Number";
    error_message.innerHTML = text;
    return false;
  }
  if(email.indexOf("@") == -1 || email.length < 6){
    text = "Please Enter valid Email";
    error_message.innerHTML = text;
    return false;
  }
  if(message.length <= 140){
    text = "Please Enter More Than 140 Characters";
    error_message.innerHTML = text;
    return false;
  }
  alert("Form Submitted Successfully!");
  return true;
}   
    </script>