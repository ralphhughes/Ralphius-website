<?php

    require_once 'includes/Templater.php';


    $page = new Templater("templates/main.tpl.php");    // Loading the template file
    /*Setting variables using the 2 methods*/
    $page->title = "Server Stats";
	$head="
<script type=\"text/javascript\" src=\"http://www.google.com/jsapi\"></script>
<script type=\"text/javascript\">
	google.load(\"visualization\", \"1\", {packages:[\"corechart\"]});
</script>
<script type=\"text/javascript\">
	function drawVisualization() {
		// Create and populate the data table.
		var loadData = new google.visualization.DataTable();
		var tempData = new google.visualization.DataTable();
		var freqData = new google.visualization.DataTable();
		loadData.addColumn('datetime', 'Date');
		loadData.addColumn('number', 'Load avg');

		tempData.addColumn('datetime', 'Date');
		tempData.addColumn('number', 'CPU temp');

		freqData.addColumn('datetime', 'Date');
		freqData.addColumn('number', 'CPU Frequency');
";

$file = "/home/pi/stats/stats2.csv";
$f = fopen($file, "r");
while ( $line = fgets($f, 1000) ) {
    $parts = explode(',', $line);
    $timestamp = $parts[0];
    $year=substr($timestamp,0,4);
    $month=substr($timestamp,5,2)-1;
    $day=substr($timestamp,8,2);
    $hours=substr($timestamp,11,2);
    $minutes=substr($timestamp,14,2);
    $seconds='00';
    $head=$head . "\t\t".'loadData.addRow([new Date('.$year.','.$month.','.$day.','.$hours.','.$minutes.','.$seconds.'),' . $parts[1].']);'. "\n";
	$head=$head . "\t\t".'tempData.addRow([new Date('.$year.','.$month.','.$day.','.$hours.','.$minutes.','.$seconds.'),' . $parts[2].']);'. "\n";
	$head=$head . "\t\t".'freqData.addRow([new Date('.$year.','.$month.','.$day.','.$hours.','.$minutes.','.$seconds.'),' . $parts[3].']);'. "\n";
}
		$head=$head . "
		
		var loadChart = new google.visualization.LineChart(document.getElementById('loadData'));
		loadChart.draw(
			loadData, {
				title: \"Server Load\",
				
				width: 600,
				height: 400,
                                backgroundColor: '#E3DB9A',
				chartArea:{width:\"85%\"},
				vAxis: {title: \"Load\", minValue: 0},
				hAxis: {format:'d MMM, hh:mm'},
				legend: {position: \"none\"},
			}
		);
		
		var tempChart = new google.visualization.LineChart(document.getElementById('tempData'));
		tempChart.draw(
			tempData, {
				title: \"CPU Temperature\",
				smoothLine: true,
				width: 600,
				height: 400,
                                backgroundColor: '#E3DB9A',
				chartArea:{width:\"85%\"},
				vAxis: {title: \"Temp (\u00B0C)\"},
				hAxis: {format:'MMM d, HH:mm'},
				legend: {position: \"none\"},
			}
		);
		
		var freqChart = new google.visualization.LineChart(document.getElementById('freqData'));
		freqChart.draw(
			freqData, {
				title: \"CPU Frequency\",
				width: 600,
				height: 400,
                                backgroundColor: '#E3DB9A',
				chartArea:{width:\"85%\"},
				vAxis: {title: \"Freq (MHz)\"},
				hAxis: {format:'MMM d, HH:mm'},
				legend: {position: \"none\"},
			}
		);
	}

	google.setOnLoadCallback(drawVisualization);
</script>
";
	$page->set("head", $head);
    $page->set("body", "
		<p>Last 48 hours (rolling period)</p>
		<div id=\"loadData\" style=\"width: 600px; height: 400px;\"></div>
		<div id=\"tempData\" style=\"width: 600px; height: 400px;\"></div>
		<div id=\"freqData\" style=\"width: 600px; height: 400px;\"></div>
                <br/>
	");
    /*Outputting the data to the end user*/
    $page->publish();
