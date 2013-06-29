<?php

    require_once 'includes/Templater.php';

    /*Here we setup the most simple usage of the template*/

    $page = new Templater("templates/main.tpl.php");    // Loading the template file
    /*Setting variables using the 2 methods*/
    $page->title = "Home Page";
    
    
    $page->body.="
	<p>Work in progress. I'm writing this entire site in PHP in order to learn PHP. 
        Don't expect the code to be any good for another couple of months at least.</p>
	";
    /*Outputting the data to the end user*/
    $page->publish();