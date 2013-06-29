<?php

require_once 'includes/Templater.php';
require_once 'includes/util.php';

$page = new Templater("templates/main.tpl.php");

$page->title = "Webcam - Motion Detection";
        	
    
	
$path = "/var/www/images/webcam";
$dirFiles = array();
$sortedFiles = array();
/* Pseudo code:
 * Open folder and look for jpg's and .swf's
 * Store the filename's and the last modified date for each file
 * Store in associate array, sorted by last modifed dates
 * Table of links to the SWF's, the JPG's are link thumbnails with the modified date below as a caption
 * Page the results
 */

// opens images folder
if ($handle = opendir($path)) {
    while (false !== ($file = readdir($handle))) {
    	// hides folders
        if ($file != "." && $file != "..") {
            if ($file != "lastsnap.jpg" && $file != "snapshot.jpg") {
                if (endsWith($file,".jpg")) {
                    $dirFiles[] = $file;
                    $parts = explode("~", $file);
                    $label = substr($parts[1],0,-4);
                    
                    $sortedFiles[$label] = $file;
                }
            }
        }
    }
    closedir($handle);
}
sort($sortedFiles);

// thumbnail sizes:
// 128x96
// 160x120
// 320x240
// 640x480
$page->body.="<h1>Webcam - Motion Detection</h1>";
$page->body.="<p>You can click on these thumbnails to view video clips (Shockwave Flash) of each event where motion was detected</p>";
$page->body .= "<table><tr>";
$colCounter=0;
foreach($sortedFiles as $currentLabel=>$currentFile)  {
    $colCounter++;
    $parts = explode("~", $currentFile);
    $eventNum = $parts[0];

    
    $page->body .= "<td><a href=\"images/webcam/$eventNum.swf\">";
    $page->body .= "<img width=\"160\" height=\"120\" alt=\"$label\" title=\"$label\" src=\"images/webcam/$currentFile\"><br/>";
    $page->body .= "$currentLabel</a></td>";
    if ($colCounter > 3) {
        $colCounter = 0;
        $page->body .= "</tr><tr>";
    }
}
$page->body .= "</tr></table>";
$page->body.="<p><i>Note: Timestamps are in UTC</i></p>";
$page->publish();
