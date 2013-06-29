<?php

require_once 'includes/Templater.php';
require_once 'includes/mysql.php';
require_once('includes/recaptchalib.php');
$publickey = "6Ld8H-ASAAAAAOG5HTFWQAiGf_ZBxvNpOOgv8qeU"; // you got this from the signup page


$page = new Templater("templates/main.tpl.php");    // Loading the template file
$page->title = "Guestbook";
$page->set("body", "
    <h2>Guestbook</h2>
    <form method=\"post\" action=\"verify.php\">
        <fieldset>
            <legend>Add comment</legend>
            Name: <input type=\"text\" name=\"name\"><br/>
            Email: <input type=\"text\" name=\"email\"><br/>
            Comment: <input type=\"text\" name=\"comment\"><br/>
            " . recaptcha_get_html($publickey) . "
            <input type=\"submit\" />
        </fieldset>
    </form>
    <hr>
    <h2>Previous Comments</h2>
    " . showFeedback());
/*Outputting the data to the end user*/
$page->publish();



function showFeedback() {
    $con = openDB();

    // Formulate Query
    // This is the best way to perform an SQL query
    // For more examples, see mysql_real_escape_string()
    $sql = "SELECT id, name,email, comment from feedback";

    // Perform Query
    if(!$result = $con->query($sql)){
        die('There was an error running the query [' . $con->error . ']');
    }

    // Use result
    // Attempting to print $result won't allow access to information in the resource
    // One of the mysql result functions must be used
    // See also mysql_result(), mysql_fetch_array(), mysql_fetch_row(), etc.
    $html = "<table>";
    while($row = $result->fetch_assoc()){
        $html = $html . "<tr>";
        $html = $html . "<td>" . $row['name'] . "</td>";
        $html = $html . "<td>" . $row['email'] . "</td>";
        $html = $html . "<td>" . $row['comment'] . "</td>";
        $html = $html . "</tr>";
    }
    $html = $html . "</table>";
    $result->free();
    return $html;
}

