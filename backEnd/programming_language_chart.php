<?php
require_once('includes/DBconnect.php');

//getting all programming language name
$get_all_programming_language_name_sql = "SELECT DISTINCT `language_name` FROM `kpa_programming_language` ORDER BY `language_name` ASC";
$all_programming_language_name = mysqli_query($conn, $get_all_programming_language_name_sql);
if (mysqli_num_rows($all_programming_language_name) > 0) {
    $all_programming_name_array = array();
    while ($programming_language_name_data = mysqli_fetch_assoc($all_programming_language_name)) {
        $all_programming_name_array[] = $programming_language_name_data['language_name'];
        $language_name = $programming_language_name_data['language_name'];

        //getting all project year list
        $get_programming_language_data_sql = "SELECT DISTINCT `project_year` FROM `kpa_programming_language` ORDER BY `project_year` ASC";
        $project_year_data = mysqli_query($conn, $get_programming_language_data_sql);
        if (mysqli_num_rows($project_year_data) > 0) {
            $project_year_array = array();
            while ($data = mysqli_fetch_assoc($project_year_data)) {
                $project_year_array[] = $data["project_year"];

                //counting every programming language used in each year
                $year = $data['project_year'];
                $get_count_programming_language_of_year_sql = "SELECT COUNT(`language_name`) AS language_count FROM `kpa_programming_language` WHERE `language_name` = '$language_name' AND `project_year` = '$year'";
                $count_language = mysqli_query($conn, $get_count_programming_language_of_year_sql);
                static $count_language_array = array();
                if (mysqli_num_rows($count_language) > 0) {
                    $count = mysqli_fetch_assoc($count_language);
                    $count_language_array[] = $count["language_count"];
                }else{
                    $count_language_array[] = 0;
                }
            }
        }
    }
}
$capn = count($all_programming_name_array);
$capy = count($project_year_array);
$cald = count($count_language_array);


//splitting language count array in the total languages
for ($i = 0; $i <= $cald-1; $i++){
    if ($i < $capy){
        static $array1 = array();
        $array1[] = $count_language_array["$i"];
    }
    elseif ($i >= $capy AND $i < 2 * $capy){
        static $array2 = array();
        $array2[] = $count_language_array[$i];
    }
    elseif ($i >= 2 * $capy AND $i < 3 * $capy){
        static $array3 = array();
        $array3[] = $count_language_array[$i];
    }
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Khwopa Project Archive - Programming Language Chart</title>
	<?php include('includes/head.php'); ?>
</head>
<body>
	<div style="justify-content: center;">
		<canvas id="myChart" style="border: 1px solid red; height: 600px; width: 80%;"></canvas>
	</div>
</body>
</html>

//Chart.js code for graph
<script type="text/javascript">
		var ctx = document.getElementById('myChart').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: <?php echo json_encode($project_year_array); ?>,
				datasets: [{
					label: 'HTML',
					data: <?php echo json_encode($array1)?>,
					backgroundColor: 'rgba(0, 0, 0, 0)',
					borderColor: '#' + <?php echo rand(100000, 999999) ?>,
					borderWidth: 1
				},{
					label: 'JavaScript',
					data: <?php echo json_encode($array2)?>,
					backgroundColor: 'rgba(0, 0, 0, 0)',
					borderColor: '#' + <?php echo rand(100000, 999999) ?>,
					borderWidth: 1
				},
                {
					label: 'PHP',
					data: <?php echo json_encode($array3)?>,
					backgroundColor: 'rgba(0, 0, 0, 0)',
					borderColor: '#' + <?php echo rand(100000, 999999) ?>,
					borderWidth: 1
				}]
			},
			options: {
				responsive: false,
				legend: {
					position: 'right',
                    align: 'start',
				},
				scales: {
					xAxes: [{
						scaleLabel: {
							display: true,
							labelString: 'Project Year'
						},
					}],
					yAxes: [{
						scaleLabel: {
							display: true,
							labelString: 'Number of Projects'
						},
						ticks: {
							beginAtZero: true,
							stepSize: 1,
							min:0,
							max: 12
						}
					}]
				}
			}
		});
	</script>