<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   // Collect form data
   $name = $_POST['name'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $message1 = $_POST['message'];

   // Set recipient email address
   $recipient = 'elavarasan@gmail.com';

   // Set subject
   $subject = 'Enquiry Notification';

   // Build the email content
   $message = "Name: $name\n";
   $message .= "Phone: $phone\n";
   $message .= "Email: $email\n";
   $message .= "Service: $message1\n";

   // Set headers
   $headers = "From: $name <$email>";

   // Send the email
   if (mail($recipient, $subject, $message, $headers)) {
      // Email sent successfully
      $response = array(
         'success' => true,
         'message' => 'Thank you for your submission!'
      );
   } else {
      // Failed to send email
      $response = array(
         'success' => false,
         'message' => 'Sorry, there was an error sending your message. Please try again later.'
      );
   }

   // Return the JSON response
   header('Content-type: application/json');
   echo json_encode($response);
} else {
   // If the request method is not POST, return an empty response
   header('Content-type: application/json');
   echo json_encode(array());
}
?>