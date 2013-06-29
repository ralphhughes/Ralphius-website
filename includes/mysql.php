<?php

function openDB() {
    $db_hostname = "localhost";  //usually "localhost be default"
    $db_username = "root";  //your user name
    $db_pass = "chess386";  //the password for your user
    $db_name = "web";  //the name of the database

    global $con;
    //$con = mysql_connect ($db_hostname, $db_username, $db_pass) or die ('I cannot connect to the database because: ' . mysql_error());
    //mysql_select_db ($db_name, $con);
    $con = new mysqli($db_hostname, $db_username, $db_pass, $db_name);

    if($con->connect_errno > 0){
        die('Unable to connect to database [' . $db->connect_error . ']');
    }
    return $con;
}
?>
