<?php

    require_once 'includes/Templater.php';

    /*Here we setup the most simple usage of the template*/

    $page = new Templater("templates/main.tpl.php");    // Loading the template file
    /*Setting variables using the 2 methods*/
    $page->title = "Donation Page";
    $page->set("body", "
<h2>Donation Page</h2>
<p>This web site costs money, not only the one off hardware costs, but the electricity for the server and the internet connection
bandwidth. If you have found any of the information on this site useful, please consider donating!</p>
<p>Use the form below for secure mobile phone payment to donate just 1 GBP to the running of this site:</p>
<iframe src=\"http://uk.impulsepay.com/9746?Force=Embed\" width=\"200px\" height=\"130px\" scrolling=\"no\" frameborder=\"0\" ></iframe>
<p>Many thanks!!!</p>
	");
    /*Outputting the data to the end user*/
    $page->publish();

