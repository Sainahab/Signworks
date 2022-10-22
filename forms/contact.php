<?php

/* Configuration */
$subject = 'Website Submission received'; // Set email subject line here
$mailto  = 'info@signworks.ma'; // Email address to send form submission to
/* END Configuration */

$name      = $_POST['name'];
$email          = $_POST['email'];
$clientMessage          = $_POST['message'];
$timestamp = date("F jS Y, h:iA.", time());

// HTML for email to send submission details
$body = "
<br>
<p>The following information was submitted through the contact form on your website:</p>
<p><b>Name</b>: $name<br>
<b>Email</b>: $email<br>
<b>Message</b>: $ClientMessage<br>
<p>This form was submitted on <b>$timestamp</b></p>
";

// Success Message
$success = "
<div class=\"row-fluid\">
    <div class=\"span12\">
        <h3>Submission successful</h3>
        <p>Thank you for taking the time to contact Pacific One Lending. A representative will be in contact with you shortly. If you need immediate assistance or would like to speak to someone now, please feel free to contact us directly at <strong>(619) 890-3605</strong>.</p>
    </div>
</div>
";

$headers = "From: $name <$email> \r\n";
$headers .= "Reply-To: $email \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message = "<html><body>$body</body></html>";

if (mail($mailto, $subject, $message, $headers)) {
    echo "$success"; // success
} else {
    echo 'Form submission failed. Please try again...'; // failure
}

?>