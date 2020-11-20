<!--- Footer-->
<footer class="container-fluid text-center" style="background-color:  #888888">
  <div class="row text-success">
    <div class="col-sm-3">
      <h3 style="color: black;">Meet the Team</h3>
      <h6>Naresh Roka, Avishek Karki</h6>
        <h6>Dhruba Rai, Aarju Chaulagain</h6>
    </div>
    <div class="col-sm-3">
      <h3 style="color: black;">Contact Us</h3>
      <h6>Email: kpa-khec@edu.no</h6>
      <h6>Phone: 9823*******</h6>
    </div>
    <div class="col-sm-3">
      <h3  style="color: #08090A;">Connect</h3>
      <a href="#" class="fab fa-facebook" title="facebook" style="font-size: 30px;"></a>
      <a href="#" class="fab fa-twitter" title="twitter" style="font-size: 30px;"></a>
      <a href="#" class="fab fa-google" title="google" style="font-size: 30px"></a>
      <a href="#" class="fab fa-youtube" title="youtube" style="font-size: 30px;"></a>
    </div>
    <!---KPA info at footer--->
    <div class="col-sm-3">
       <img src="images/logo.png" class="icon" title="KPA Logo" 
  style="height: 55px;margin-bottom: -20px;" alt="KPA"><br><br>
      <a href="home.php" class="fas fa-home" title="Home" style="font-size: 17px;margin-right: 10px;"></a>||
      <a href="contact-us.php" class="fas fa-id-card-alt" title="Contact" style="font-size: 17px;margin-left: 10px;margin-right: 10px;"></a>||
      <a href="#" class="fas fa-comment-dots" title="Feedback" style="font-size: 17px;margin-left: 10px;margin-right: 10px;"></a>||
        <a href="faq.php" class="fas fa-question" title="FAQs" style="font-size: 17px;margin-left: 10px;"></a>
    </div>
  </div>

</footer>
  <div class="col-xs-12" style="background: brown; height: 22px;">
    <h5 style="text-align: center; color: white; font-size: 15px;"><i class="fa fa-copyright" style="font-size:16px;margin-top: 3px;">  2020 KPA</i></h5>
  </div>
  
<!--Query for ckeditor-->
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );</script>
<script>
    //jquery for registration request fadeout
    $(document).ready(function () {
        $("#reg-cross").click(function () {
        $(".reg").fadeOut();
        });
    });
  </script>
  <script>
    //parsely validation
    
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

<script>
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
