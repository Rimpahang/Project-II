<?php
require_once('includes/DBconnect.php');

$get_programming_language_data_sql = "SELECT DISTINCT `project_year` FROM `kpa_programming_language`";

$result = mysqli_query($conn, $get_programming_language_data_sql);

if (mysqli_num_rows($result) > 0) {
	$array = array();
	while ($data = mysqli_fetch_assoc($result)) {
		$array[] = $data["project_year"];
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


	<script type="text/javascript">
		var ctx = document.getElementById('myChart').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: <?php echo json_encode($array); ?>,
				datasets: [{
					label: 'HTML',
					data: [12, 11, 3, 5, 2, 3],
					backgroundColor: 'rgba(0, 0, 0, 0)',
					borderColor: '#' + <?php echo rand(100000, 999999) ?>,
					borderWidth: 1
				},{
					label: 'PHP',
					data: [4, 9, 3, 5, 12, 10],
					backgroundColor: 'rgba(0, 0, 0, 0)',
					borderColor: '#' + <?php echo rand(100000, 999999) ?>,
					borderWidth: 1
				}]
			},
			options: {
				responsive: false,
				legend: {
					position: 'right',
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

</body>
</html>