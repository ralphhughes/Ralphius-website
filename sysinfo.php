<?
// Get the Time
$time = (exec("date +'%d %b %Y - %T %Z'"));

// Get Frequency
$freq = (exec("cat  /sys/devices/system/cpu/cpu0//cpufreq/scaling_cur_freq")) / 1000;

//get Temp
$cputemp = (exec("cat /sys/class/thermal/thermal_zone0/temp "));
$cputemp2 = $cputemp / 1000; 

// Get Network-Data
$RX = (exec("ifconfig eth0 | grep 'RX bytes'| cut -d: -f2 | cut -d' ' -f1"));
$TX = (exec("ifconfig eth0 | grep 'TX bytes'| cut -d: -f3 | cut -d' ' -f1"));

// Get kernel info
list($system, $host, $kernel) = split(" ", exec("uname -a"), 5);

// Grab uptime output
$uptime_array = explode(" ", exec("cat /proc/uptime")); 
$seconds = round($uptime_array[0], 0); 
$minutes = $seconds / 60; 
$hours = $minutes / 60; 
$days = floor($hours / 24); 
$hours = floor($hours - ($days * 24)); 
$minutes = floor($minutes - ($days * 24 * 60) - ($hours * 60)); 
$seconds = floor($seconds - ($days * 24 * 60 * 60) - ($hours * 60 * 60) - ($minutes * 60)); 
$uptime_array = array($days, $hours, $minutes, $seconds); 
$uptime = ($days . " days " .  $hours . " hours " .  $minutes . " minutes" );

// Get the kernel info, and grab the cool stuff
$output1 = null; 
$output2 = null; 

// First output of /proc/stat 
exec("cat /proc/stat", $output1); 

// Set the time interval 
sleep(1); 

// Second output of /proc/stat 
exec("cat /proc/stat", $output2); 

// CPU total load 
$cpu_load_total = 0; 

for ( $i=0 ; $i < 1 ; $i++ ) 
{ 
  // Get informations from first row of /proc/stat 
  $cpu_stat_1 = explode(" ", $output1[ $i + 1 ]); 
  $cpu_stat_2 = explode(" ", $output2[ $i + 1 ]); 

  // Init arrays 
  $info1 = array( "user"   => $cpu_stat_1[1],  
                  "nice"   => $cpu_stat_1[2], 
                  "system" => $cpu_stat_1[3],  
                  "idle"   => $cpu_stat_1[4] 
                ); 
                 
  $info2 = array( "user"   => $cpu_stat_2[1],  
                  "nice"   => $cpu_stat_2[2], 
                  "system" => $cpu_stat_2[3],  
                  "idle"   => $cpu_stat_2[4] 
                ); 

  // Informations that should involve the calculation 
  $idlesum = $info2["idle"]-$info1["idle"] + 
             $info2["system"]-$info1["system"]; 

  // Sum the outputvalues 
  $sum1 = array_sum( $info1 ); 
  $sum2 = array_sum( $info2 ); 

  // Calculate the cpu-load 
  $load = ( 1 - ( $idlesum / ( $sum2 - $sum1 ) ) ) *100; 
   
  $cpu_load_total += $load; 
} 

// Round it to 2 decimals 
$cpuload = (round( $cpu_load_total, 2 ));


//Get the memory info, and grab the cool stuf
$meminfo = file("/proc/meminfo");
for ($i = 0; $i < count($meminfo); $i++) {
		list($item, $data) = split(":", $meminfo[$i], 2);
		$item = chop($item);
		$data = chop($data);
		if ($item == "MemTotal") { $total_mem =$data;	}
		if ($item == "MemFree") { $free_mem = $data; }
		if ($item == "SwapTotal") { $total_swap = $data; }
		if ($item == "SwapFree") { $free_swap = $data; }
		if ($item == "Buffers") { $buffer_mem = $data; }
		if ($item == "Cached") { $cache_mem = $data; }
		if ($item == "MemShared") {$shared_mem = $data; }
}
$used_mem = ( $total_mem - $free_mem . ' kB'); 
$used_swap = ( $total_swap - $free_swap . ' kB' );
$percent_free = round( $free_mem / $total_mem * 100 );
$percent_used = round( $used_mem / $total_mem * 100 );
$percent_swap = round( ( $total_swap - $free_swap ) / $total_swap * 100 );
$percent_swap_free = round( $free_swap / $total_swap * 100 );
$percent_buff = round( $buffer_mem / $total_mem * 100 );
$percent_cach = round( $cache_mem / $total_mem * 100 );
$percent_shar = round( $shared_mem / $total_mem * 100 );
//Now it's time to grab the cool stuff from the hard drive
//This one is not quite as straight forward.....
exec ("df", $x);
$count = 1;
while ($count < sizeof($x)) {
		list($drive[$count], $size[$count], $used[$count], $avail[$count], $percent[$count], $mount[$count]) = split(" +", $x[$count]);
		$percent_part[$count] = str_replace( "%", "", $percent[$count] );	
$count++;
}
?>
<?php

    require_once 'includes/Templater.php';

    /*Here we setup the most simple usage of the template*/

    $page = new Templater("templates/main.tpl.php");    // Loading the template file
    /*Setting variables using the 2 methods*/
    $page->title = "Raspberry Pi System Information";
	$page->head = "
<style type=\"text/css\">
	td {
		font-family: Yanone Kaffeesatz, Helvetica, sans-serif;
		font-size: 13;
	}
</style>
";
    $page->set("body", "
<table>
		<tr bgcolor=\"#6a91b1\">
			<td colspan=\"2\"><center>General Info</center></td>
		</tr>
		<tr>
			<td width=110>Hostname</td>
			<td width=268>". $host ."</td>
		</tr>
		<tr>
			<td>System Time</td>
			<td>" . $time. "</td>
		</tr>
		<tr>
			<td>Kernel</td>
			<td>" . $system . ' ' . $kernel. "</td>
		</tr>
		<tr>
			<td>CPU Type</td>
			<td>ARM1176JZF-S</td>
		</tr>
		<tr>
			<td>CPU Frequency</td>
			<td>" . $freq. " MHz</td>
		</tr>
		<tr>
			<td>CPU Load</td>
			<td>" . $cpuload . "%</td>
		</tr>
		<tr>
			<td>CPU Temperature</td>
			<td>" . $cputemp2 . " &deg;C</td>
		</tr>
		<tr>
			<td>Uptime</td>
			<td>" . $uptime. "</td>
		</tr>
</table>
<br>
<br>
<table>
		<tr bgcolor=\"#6a91b1\">
			<td colspan=\"4\"><center>Memory: " . $total_mem. "</center></td>
		</tr>
		<tr>
			<td width=110></td>
			<td width=110>Total</td>
			<td width=120>Usage</td>
			<td>%</td>
			</tr>
		<tr>
			<td>Used</td>
			<td>" . $used_mem. "</td>
			<td><img src=\"images/img4.png\" height=11 width=" . $percent_used. "></td>
			<td>" . $percent_used . "%</td>
			</tr>
		<tr>
			<td>Free</td>
			<td>" . $free_mem. "</td>
			<td><img src=\"images/img1.png\" height=11 width=" . $percent_free. "></td>
			<td>" . $percent_free . "%</td>
			</tr>
		<tr>
			<td>Buffered</td>
			<td>" . $buffer_mem. "</td>
			<td><img src=\"images/img2.png\" height=11 width=" . $percent_buff. "></td>
			<td>" . $percent_buff . "%</td>
			</tr>
		<tr>
			<td>Cached</td>
			<td>" . $cache_mem. "</td>
			<td><img src=\"images/img3.png\" height=11 width=" . $percent_cach. "></td>
			<td>" . $percent_cach . "%</td>
			</tr>
</table>
<br>
<br>
<table>
		<tr bgcolor=\"#6a91b1\">
			<td colspan=\"4\"><center>Swap: " . $total_swap. "</center></td>
		</tr>
		<tr>
			<td width=110></td>
			<td width=110>Total</td>
			<td width=120>Usage</td>
			<td>%</td>
		</tr>
		<tr>
			<td>Used</td>
			<td>" . $used_swap. "</td>
			<td><img src=\"images/img4.png\" height=11 width=" . $percent_swap. "></td>
			<td>" . $percent_swap . "%</td>
		</tr>
		<tr>
			<td>Free</td>
			<td>" . $free_swap. "</td>
			<td><img src=\"images/img1.png\" height=11 width=" . $percent_swap_free. "></td>
			<td>" . $percent_swap_free . "%</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
</table>
Transmitted data since boot: " . $TX . "B (" . intval($TX / 1024 / 1024) . "MB)
<br/>
Received data since boot: " . $RX . "B (" . intval($RX / 1024 / 1024) . "MB)
");
 /*Outputting the data to the end user*/
$page->publish();