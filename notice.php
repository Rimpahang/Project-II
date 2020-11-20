<?php
require_once('backEnd/includes/DBconnect.php');

$get_notice_sql = "SELECT * FROM `kpa_notice` WHERE `status` = 1";

$result = mysqli_query($conn, $get_notice_sql);
if (mysqli_num_rows($result) > 0){
?>
<?php include('includes/header.php') ?>
<body data-spy="scroll" data-target="#navbarResponsive">
    <!--  Project Title  -->
  <!-- Navigation bar-->
  <?php include('includes/nav.php') ?>

<div style="width: 70%;padding-left: 10px; margin-left: 10px; padding-top: 20px; margin: 0 auto; ">
    <div class="row">
        <div class="col-md-9" style="border: 1px solid gray; border-right: 1px solid gray;">
            <div style="background-color: #a1bae5;" class="row">
                <div class="col-md-5" align="right" style="margin-bottom: 10px;
                    ">
                    <h4 style="color: darkblue; padding-top: 3px; font-size: 20px; text-align: center; margin-top: 8px;">
                        <b>Notices & Events</b>
                    </h4></div>
               
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
   
<?php include('includes/footer.php') ?>