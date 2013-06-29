<?php

    require_once 'includes/Templater.php';

    /*Here we setup the most simple usage of the template*/

    $page = new Templater("templates/main.tpl.php");    // Loading the template file
    /*Setting variables using the 2 methods*/
    $page->title = "Webcam";
	$page->head = "
<script type=\"text/JavaScript\">
	setTimeout(\"location.reload(true);\",60000);
</script>
	";
    $page->set("body", "
	<h1>Webcam</h1>
	<h3>(Quite possibly the most boring webcam ever)</h3>
	<!-- 352 x 292 for old webcam -->
	<img src=\"images/webcam/lastsnap.jpg\" width=\"640\" height=\"480\"><br/>
	<p>When working, this image should update every 60 seconds.</p>
        <p>To see a library of saved video clips, click <a href=\"motion.php\">here</a></p>
	");
    /*Outputting the data to the end user*/
    $page->publish();