<?php include('includes/header-faq.php') ?>
<body data-spy="scroll" data-target="#navbarResponsive">

	 <?php include('includes/nav.php') ?>
	<br>
                  <br>
 <div class="container-fluid">                 
<div class="container1">
  <h2>Frequently Asked Questions (FAQ) !!!</h2>
  <br>
  <div class="accordion">
    <div class="icons">
      <i class="fas fa-caret-down fa-2x"></i>
    </div>
     
    <h5>What is KPA?</h5>
    
  </div>
  <div class="panel">
    <p>KPA stands for "Khwopa Project Archive". Here, you can discover various completed and ongoing projects done by students of different faculties. In short, KPA is the online platform for that archives the projects of Khec.</p>
    
  </div>
    <div class="accordion">
    <div class="icons">
       <i class="fas fa-caret-down fa-2x"></i>
    </div>
    <h5>What is the main purpose of KPA ?</h5>
    
  </div>
  <div class="panel">
    <p>To collect projects in one place, to provide platform for students to share their projects, to provide wide varieties of projects in one place and many more !!!</p>
    
  </div>
    <div class="accordion">
    <div class="icons">
       <i class="fas fa-caret-down fa-2x"></i>
    </div>
    <h5>Who can upload project in KPA?</h5>
    
  </div>
  <div class="panel">
    <p>Students of "Khwopa Engineering College" from the faculty of Computer and Electronics department can upload their college projects. </p>
    
  </div>
    <div class="accordion">
    <div class="icons">
       <i class="fas fa-caret-down fa-2x"></i>
    </div>
    <h5>Is KPA itself a project done by students?</h5>
    
  </div>
  <div class="panel">
    <p>Yes! KPA is the project done by computer faculty students of 74 batch as their final project for fifth semester. </p>
    
  </div>
</div>
</div>

<script type="text/javascript">
  var acc = document.getElementsByClassName('accordion');
  var i;
  var len = acc.length;
  for(i = 0; i < len; i++){
    acc[i].addEventListener('click', function(){
      this.classList.toggle('active');
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight){
        panel.style.maxHeight = null;
      }
      else{
        panel.style.maxHeight = panel.scrollHeight + 'px'
      }
    })
  }
</script>

<br><br>
<?php include('includes/footer.php') ?>
