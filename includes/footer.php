<!--- Footer-->
<footer class="container-fluid text-center" style="background-color:  #04091e">
  <div class="row">
    <div class="col-sm-3">
      <h3>Meet the Team</h3>
      <h5>Our address and contact info here</h5>
        <p>Total visits:</p> <script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=585a2c83dd33771a7b1c2d5b874f75a945a4891e'></script>
<script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/766612/t/5"></script>
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
      <!-- <a href="#" class="fab fa-youtube-square" title="youtube" style="font-size: 30px; background: grey; "></a> -->
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
  <div class="col-xs-12" style="background: #04091e; height: 22px;">
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
