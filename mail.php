<?php
// Get data from form
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Set the email address to receive the message
$to = "o.itangisha@techie.rw";  // Your email

// Email subject
$subject = "Mail From website";

// Construct the message for your email
$txt = "Name = " . $name . "\r\n" . 
       "Email = " . $email . "\r\n" . 
       "Message = " . $message;

// Email headers for the received message
$headers = "From: o.itangisha@techie.rw" . "\r\n" .
           "CC: o.itangisha@gmail.com";  // CC your secondary email

// Check if email is not empty and send email
if ($email != NULL) {
    if (mail($to, $subject, $txt, $headers)) {
        // Send a reply to the sender
        $reply_subject = "Thank you for your message!";
        $reply_message = "Hello " . $name . ",\r\n\r\nThank you for reaching out to us. We have received your message and will get back to you shortly.\r\n\r\nYour message: " . $message;
        
        // Reply email headers
        $reply_headers = "From: o.itangisha@techie.rw" . "\r\n" .
                         "CC: o.itangisha@gmail.com";  // CC your secondary email
        
        // Send the reply to the sender
        mail($email, $reply_subject, $reply_message, $reply_headers);

        // Redirect to a thank you page after successful submission
        header("Location: thankyou.html");
    } else {
        echo "Error in sending email.";
    }
}
?>
