<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  // Set the recipient email address
  $to = "saxena.abhi7007@gmail.com";

  // Set the email subject
  $subject = "New Contact Form Submission";

  // Set the email headers
  $headers = "From: $name <$email>\r\n";
  $headers .= "Reply-To: $email\r\n";

  // Send the email
  $success = mail($to, $subject, $message, $headers);

  // Check if the email was sent successfully
  if ($success) {
    // Set the success message
    $response = "Thank you for your message! We will get back to you soon.";
  } else {
    // Set the error message
    $response = "Oops! An error occurred and your message could not be sent.";
  }

  // Return the response message
  echo $response;
}
?>
