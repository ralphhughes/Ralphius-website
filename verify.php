<?php

require_once('includes/recaptchalib.php');
require_once('includes/mysql.php');
$privatekey = "6Ld8H-ASAAAAAMumPdcjWZrgTZaku_TyzRs2lqR1";
$resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

if (!$resp->is_valid) {
// What happens when the CAPTCHA was entered incorrectly
    die("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
            "(reCAPTCHA said: " . $resp->error . ")");
} else {
    $con = openDB();
    $name = $con->escape_string($_POST["name"]);
    $email = $con->escape_string($_POST["email"]);
    $comment = $con->escape_string($_POST["comment"]);
    
    $stmt = $con->prepare("insert into feedback (name,email,comment) values (?,?,?)");
    $stmt->bind_param('sss', $name, $email, $comment);
    $stmt->execute();
    $stmt->free_result();
    $stmt->close();
}
?>
<html>
    <head><title>Feedback received</title>
        <script type="text/javascript">

	setTimeout("location.href='feedback.php';",3000);
        
        </script>
    </head>
    <body>
        <h1>Feedback probably saved successfully.</h1> 
    </body>
</html>