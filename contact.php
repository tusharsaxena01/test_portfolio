<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validate the form data (you can add more validation if needed)

    // Process the form data (you can store it in a database, send an email, etc.)

    // Example: Send an email
    $to = "saxena.abhi7007@gmail.com";
    $subject = "Personal Website Contact Form";
    $body = "Name: " . $name . "\n";
    $body .= "Email: " . $email . "\n";
    $body .= "Message: " . $message . "\n";

    if (mail($to, $subject, $body)) {
        echo "Thank you for your message. We will get back to you soon.";
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
}
?>
