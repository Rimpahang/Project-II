<?php include('includes/header-projectlists.php') ?>
<body data-spy="scroll" data-target="#navbarResponsive">

	 <?php include('includes/nav.php') ?>
	 <div class="container">
         <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6"><h2><b>Khec Computer Department </b></h2></div>
                <div class="col-sm-6">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-info active">
                            <input type="radio" name="status" value="all" checked="checked"><b> All</b>
                        </label>
                        <label class="btn btn-success">
                            <input type="radio" name="status" value="3sem"> <b>Third Sem</b>
                        </label>
                        <label class="btn btn-warning">
                            <input type="radio" name="status" value="5sem" ><b  style="color: white;"> Fifth Sem</b>
                        </label>
                        <label class="btn btn-danger">
                            <input type="radio" name="status" value="7sem"> <b>Seventh Sem</b>
                        </label>       
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Project Name</th>
                    <th>Submitted&nbsp;On</th>
                    <th>Semester/Batch</th>
                    <th>Category</th>
                    <th>Rating</th>
                    <th>Report</th>
                </tr>
            </thead>
            <tbody>
                <tr data-status="3sem">
                    <td>1</td>
                    <td><a href="lms.php">Library Management System</a></td>
                    <td>04/10/2020</td>
                    <td><span class="label label-success">III/2074</span></td>
                    <td>Management System</td>
                    <td><i class="far fa-star"></i>
                      <i class="far fa-star"></i>
                      <i class="far fa-star-half"></i></td>
                    <td><a href="kpa.docx" download title="Download Report" class="btn btn-sm manage">Download</a></td>
                </tr>
                <tr data-status="5sem">
                    <td>2</td>
                    <td><a href="lms.php">Line Following Robot</a></td>
                    <td>05/08/2019</td>
                    <td><span class="label label-warning">V/2073</span></td>
                    <td>Robotics</td>
                    <td><i class="far fa-star"></i>
                      <i class="far fa-star"></i>
                      <i class="far fa-star-half"></i></td>
                    <td><a href="kpa.docx" download title="Download Report" class="btn btn-sm manage">Download</a></td>
                </tr>
                <tr data-status="3sem">
                    <td>3</td>
                    <td><a href="lms.php">Khwopa Project Archive</a></td>
                    <td>11/05/2020</td>
                    <td><span class="label label-success">III/2075</span></td>
                    <td>Management System</td>
                    <td><i class="far fa-star"></i>
                      <i class="far fa-star"></i>
                      <i class="far fa-star"></i>
                    </td>
                    <td><a href="#" class="btn btn-sm manage">Download</a></td>
                </tr>
                <tr data-status="7sem">
                    <td>4</td>
                    <td><a href="lms.php">Maze Runner</a></td>
                    <td>06/09/2019</td>
                    <td><span class="label label-danger">VII/2075</span></td>
                    <td>Game</td>
                    <td><i class="far fa-star"></i>
                      <i class="far fa-star"></i>
                      <i class="far fa-star"></i>
                      <i class="far fa-star"></i></td>
                    <td><a href="#" class="btn btn-sm manage">Download</a></td>
                </tr>
                <tr data-status="5sem">
                    <td>5</td>
                    <td><a href="lms.php">Department Management System</a></td>
                    <td>12/08/2020</td>
                    <td><span class="label label-warning">V/2073</span></td>
                    <td>Commerce</td>
                    <td><i class="far fa-star"></i>
                      <i class="far fa-star"></i>
                      <i class="far fa-star-half"></i></td>
                    <td><a href="#" class="btn btn-sm manage">Download</a></td>
                </tr>
            </tbody>
        </table>
    </div> 
    <script>
    $(document).ready(function()
{
    $(".btn-group .btn").click(function()
    {
        var inputValue  =   $(this).find("input").val();
        if(inputValue   != 'all')
        {
            var target  =   $('table tr[data-status="' + inputValue + '"]');
            $("table tbody tr").not(target).hide();
            target.fadeIn();
        }
        else
        {
            $("table tbody tr").fadeIn();
        } 
    });
    // Changeing the class of status label to support bootstrap 4
    var bs  =  $.fn.tooltip.Constructor.VERSION;
    var support =   bs.split(".");
    if(str[0]   ==  4)
    {
        $(".label").each(function()
        {
            var classStr    =   $(this).attr("class");
            var newClassStr =   classStr.replace(/label/g, "badge");
            $(this).removeAttr("class").addClass(newClassStr);
        });
    }
});  

</script>
  </div>

    

	
<br><br>
<?php include('includes/footer.php') ?>
