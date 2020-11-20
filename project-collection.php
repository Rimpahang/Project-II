<?php include('includes/header-projectcollections.php') ?>
<body data-spy="scroll" data-target="#navbarResponsive">

   <?php include('includes/nav.php') ?>
  <br><br>
<div class="container">
<div class="wrapper col-sm-6">
  <div class="header"><br>
    <div class="title">
      
      Project Collection
    </div>
<br>
    <div class="search_box">
      <input type="text" id="search_input" placeholder="Fliter Table Using Names">
    </div>
  </div>

<div class="container1 col-sm-12">
  <div class="table_wrap">
    <div class="table_header">
      <ul>
        <li>
          <div class="item">
            <div class="projects">
              <span>Projects</span>
            </div>
            <div class="faculty">
              <span>Faculty</span>
            </div>
            <div class="sem-year">
              <span>Sem-Year</span>
            </div>
            
          </div>
        </li>
      </ul>
    </div>
    <div class="table_body">
      <ul>
        <li>
          <div class="item">
            <div class="projects">
              <span>Ticket Booking</span>
            </div>
            <div class="faculty">
              <span>Computer</span>
            </div>
            <div class="sem-year">
              <span>V-2074</span>
            </div>
            

<button class="btn btn-success" onclick="toggleLogin() ">Source Code</button>
    <div class="overlay">
      <div class="login">
        <div class="header1">
          <h3>Request for Source Code</h3>
          <p>Source code will be sent to email</p>
          <i class="fas fa-times" onclick="toggleLogin()"></i>
        </div>
        <div class="body1">
          <form action="/" method="submit" class="form1" onsubmit="return myfunn()">
            <input type="text" id="user" placeholder="username" value=""/>
            <p id="message" class="text-danger"></p>
            <input type="text" id="email" placeholder="E-mail" value="" />
            <p id="message1" class="text-danger"></p>
          
        </div>
        
          <input type="submit" value="Submit" class="btn btn-info" style="margin-left: 40px;"></input>
        </form>
      </div>
    </div>

      <script>
    function toggleLogin() {
      document.querySelector(".overlay").classList.toggle("open");
    }
  
  
    function myfunn(){
      var correct_way = /^[A-Za-z]+$/;
      var a = document.getElementById("user").value;
      var b = document.getElementById("email").value;
      if(a==""){
        document.getElementById("message").innerHTML="Field Required";
        return false;
      }
      if (a.length<3) {
        document.getElementById("message").innerHTML="Username between 3-20";
        return false;
      }
       if (a.length>20) {
        document.getElementById("message").innerHTML="Username between 3-20";
        return false;
      }
      if (a.match(correct_way)) 
        true;
      
      else{
        document.getElementById("message").innerHTML="Alphabets only";
        return false;
      }

      if(b==""){
        document.getElementById("message1").innerHTML="Field Required";
        return false;
      }

      if(b.indexOf('@')<=0){
        document.getElementById("message1").innerHTML="@ position invalid";
      return false;
      }
      if((b.charAt(b.length-4)!='.') && (b.charAt(b.length-4)!='.')){
        document.getElementById("message1").innerHTML=". position invalid";
      return false;
      }
     
     


    }
  </script>


          </div>
        </li>
           <li>
          <div class="item">
            <div class="projects">
              <span title="Khwopa Project Archive">Khwopa Project Archive</span>
            </div>
            <div class="faculty">
              <span>Computer</span>
            </div>
            <div class="sem-year">
              <span>V-2074</span>
            </div>
            

<button class="btn btn-success" onclick="toggleLogin() ">Source Code</button>
    <div class="overlay">
      <div class="login">
        <div class="header1">
         <h3>Request for Source Code</h3>
          <p>Source code will be sent to email</p>
          <i class="fas fa-times" onclick="toggleLogin()"></i>
        </div>
        <div class="body1">
          <form action="/" method="submit" class="form1" onsubmit="return myfunn()">
            <input type="text" id="user" placeholder="username" value=""/>
            <p id="message" class="text-danger"></p>
            <input type="text" id="email" placeholder="E-mail" value="" />
            <p id="message1" class="text-danger"></p>
          
        </div>
        
          <input type="submit" value="Submit" class="btn btn-info"></input>
        </form>
      </div>
    </div>

      <script>
    function toggleLogin() {
      document.querySelector(".overlay").classList.toggle("open");
    }
  
  
    function myfunn(){
      var correct_way = /^[A-Za-z]+$/;
      var a = document.getElementById("user").value;
      var b = document.getElementById("email").value;
      if(a==""){
        document.getElementById("message").innerHTML="Field Required";
        return false;
      }
      if (a.length<3) {
        document.getElementById("message").innerHTML="Username between 3-20";
        return false;
      }
       if (a.length>20) {
        document.getElementById("message").innerHTML="Username between 3-20";
        return false;
      }
      if (a.match(correct_way)) 
        true;
      
      else{
        document.getElementById("message").innerHTML="Alphabets only";
        return false;
      }
      if(b.indexOf('@')<=0){
        document.getElementById("message1").innerHTML="@ position invalid";
      return false;
      }
      if((b.charAt(b.length-4)!='.') && (b.charAt(b.length-4)!='.')){
        document.getElementById("message1").innerHTML=". position invalid";
      return false;
      }
     
      if(b==""){
        document.getElementById("message1").innerHTML="Field Required";
        return false;
      }

    }
  </script>

          </div>
        </li>
           <li>
          <div class="item">
            <div class="projects">
              <span>Bhok Bhokai</span>
            </div>
            <div class="faculty">
              <span>Computer</span>
            </div>
            <div class="sem-year">
              <span>V-2074</span>
            </div>
            

<button class="btn btn-success" onclick="toggleLogin() ">Source Code</button>
    <div class="overlay">
      <div class="login">
        <div class="header1">
          <h3>Request for Source Code</h3>
          <p>Source code will be sent to email</p>
          <i class="fas fa-times" onclick="toggleLogin()"></i>
        </div>
        <div class="body1">
          <form action="/" method="submit" class="form1" onsubmit="return myfunn()">
            <input type="text" id="user" placeholder="username" value=""/>
            <p id="message" class="text-danger"></p>
            <input type="text" id="email" placeholder="E-mail" value="" />
            <p id="message1" class="text-danger"></p>
          
        </div>
        
          <input type="submit" value="Submit" class="btn btn-info"></input>
        </form>
      </div>
    </div>

      <script>
    function toggleLogin() {
      document.querySelector(".overlay").classList.toggle("open");
    }
  
  
    function myfunn(){
      var correct_way = /^[A-Za-z]+$/;
      var a = document.getElementById("user").value;
      var b = document.getElementById("email").value;
      if(a==""){
        document.getElementById("message").innerHTML="Field Required";
        return false;
      }
      if (a.length<3) {
        document.getElementById("message").innerHTML="Username between 3-20";
        return false;
      }
       if (a.length>20) {
        document.getElementById("message").innerHTML="Username between 3-20";
        return false;
      }
      if (a.match(correct_way)) 
        true;
      
      else{
        document.getElementById("message").innerHTML="Alphabets only";
        return false;
      }
      if(b.indexOf('@')<=0){
        document.getElementById("message1").innerHTML="@ position invalid";
      return false;
      }
      if((b.charAt(b.length-4)!='.') && (b.charAt(b.length-4)!='.')){
        document.getElementById("message1").innerHTML=". position invalid";
      return false;
      }
     
      if(b==""){
        document.getElementById("message1").innerHTML="Field Required";
        return false;
      }

    }
  </script>
          </div>
        </li>
           <li>
          <div class="item">
            <div class="projects">
              <span title="Linrary Management System">Library Management System</span>
            </div>
            <div class="faculty">
              <span>Computer</span>
            </div>
            <div class="sem-year">
              <span>V-2074</span>
            </div>
            

<button class="btn btn-success" onclick="toggleLogin() ">Source Code</button>
    <div class="overlay">
      <div class="login">
        <div class="header1">
         <h3>Request for Source Code</h3>
          <p>Source code will be sent to email</p>
          <i class="fas fa-times" onclick="toggleLogin()"></i>
        </div>
        <div class="body1">
          <form action="/" method="submit" class="form1" onsubmit="return myfunn()">
            <input type="text" id="user" placeholder="username" value=""/>
            <p id="message" class="text-danger"></p>
            <input type="text" id="email" placeholder="E-mail" value="" />
            <p id="message1" class="text-danger"></p>
          
        </div>
        
          <input type="submit" value="Submit" class="btn btn-info"></input>
        </form>
      </div>
    </div>

      <script>
    function toggleLogin() {
      document.querySelector(".overlay").classList.toggle("open");
    }
  
  
    function myfunn(){
      var correct_way = /^[A-Za-z]+$/;
      var a = document.getElementById("user").value;
      var b = document.getElementById("email").value;
      if(a==""){
        document.getElementById("message").innerHTML="Field Required";
        return false;
      }
      if (a.length<3) {
        document.getElementById("message").innerHTML="Username between 3-20";
        return false;
      }
       if (a.length>20) {
        document.getElementById("message").innerHTML="Username between 3-20";
        return false;
      }
      if (a.match(correct_way)) 
        true;
      
      else{
        document.getElementById("message").innerHTML="Alphabets only";
        return false;
      }
      if(b.indexOf('@')<=0){
        document.getElementById("message1").innerHTML="@ position invalid";
      return false;
      }
      if((b.charAt(b.length-4)!='.') && (b.charAt(b.length-4)!='.')){
        document.getElementById("message1").innerHTML=". position invalid";
      return false;
      }
     
      if(b==""){
        document.getElementById("message1").innerHTML="Field Required";
        return false;
      }

    }
  </script>


          </div>
        </li>
           <li>
          <div class="item">
            <div class="projects">
              <span>E-Pharma</span>
            </div>
            <div class="faculty">
              <span>Computer</span>
            </div>
            <div class="sem-year">
              <span>V-2074</span>
            </div>
            

<button class="btn btn-success" onclick="toggleLogin() ">Source Code</button>
    <div class="overlay">
      <div class="login">
        <div class="header1">
         <h3>Request for Source Code</h3>
          <p>Source code will be sent to email</p>
          <i class="fas fa-times" onclick="toggleLogin()"></i>
        </div>
        <div class="body1">
          <form action="/" method="submit" class="form1" onsubmit="return myfunn()">
            <input type="text" id="user" placeholder="username" value=""/>
            <p id="message" class="text-danger"></p>
            <input type="text" id="email" placeholder="E-mail" value="" />
            <p id="message1" class="text-danger"></p>
          
        </div>
        
          <input type="submit" value="Submit" class="btn btn-info"></input>
        </form>
      </div>
    </div>

      <script>
    function toggleLogin() {
      document.querySelector(".overlay").classList.toggle("open");
    }
  
  
    function myfunn(){
      var correct_way = /^[A-Za-z]+$/;
      var a = document.getElementById("user").value;
      var b = document.getElementById("email").value;
      if(a==""){
        document.getElementById("message").innerHTML="Field Required";
        return false;
      }
      if (a.length<3) {
        document.getElementById("message").innerHTML="Username between 3-20";
        return false;
      }
       if (a.length>20) {
        document.getElementById("message").innerHTML="Username between 3-20";
        return false;
      }
      if (a.match(correct_way)) 
        true;
      
      else{
        document.getElementById("message").innerHTML="Alphabets only";
        return false;
      }
      if(b.indexOf('@')<=0){
        document.getElementById("message1").innerHTML="@ position invalid";
      return false;
      }
      if((b.charAt(b.length-4)!='.') && (b.charAt(b.length-4)!='.')){
        document.getElementById("message1").innerHTML=". position invalid";
      return false;
      }
     
      if(b==""){
        document.getElementById("message1").innerHTML="Field Required";
        return false;
      }

    }
  </script>


          </div>
        </li>

      </ul>
    </div>
  </div>
</div>
</div>
<script>
  var search_input = document.querySelector("#search_input");

search_input.addEventListener("keyup", function(e){
  var span_items = document.querySelectorAll(".table_body ul li .item .projects span");
  var search_item = e.target.value.toLowerCase();
 
 span_items.forEach(function(item){
   if(item.textContent.toLowerCase().indexOf(search_item) != -1){
      item.closest("li").style.display = "block"
   }
   else{
     item.closest("li").style.display = "none";
   }
 })
  
});

</script>

</div>
 <br>

<?php include('includes/footer.php') ?>
