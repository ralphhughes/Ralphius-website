<?php
// Record GET and POST params
// Transparently proxy em
$url = $_REQUEST['url'];
$password = $_REQUEST['pass'];
$today = date("myd");  
if ($today == $password) {
    $thisFile = "http://".$_SERVER['HTTP_HOST'].$_SERVER[PHP_SELF]."?url=";
    $html = file_get_contents($url);
    // replace occurences of $url in $html with $thisFile
    $html = str_replace($url,$thisFile,$html);
    echo $html;
} else {
    echo "Wrong password.";
}
?>
