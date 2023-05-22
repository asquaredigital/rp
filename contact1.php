<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    // Set recipient email address
   $to = 'elavarasan5193@gmail.com';
    
    
    $subject = 'New Notification from the Website';

     // Collect form data

   $name = $_POST['name1'];
   $phone = $_POST['phone1'];
   $email = $_POST['email1'];
   $msg_subject = $_POST['msg_subject1'];
   $message1 = $_POST['message1'];

  

   // Set subject

   // Build the email content
   $email_body = "Name: $name\n";
   $email_body .= "Phone: $phone\n";
   $email_body .= "Email: $email\n";
   $email_body .= "Subject: $msg_subject\n";
   $email_body .= "Message: $message1\n";

   // Set headers
   $headers = "From: " . $email . "\r\n";
   $headers .= "Reply-To: " . $email . "\r\n";
   
   // Send the email
   if (mail($to, $subject, $email_body, $headers)) {
      // Email sent successfully
      $response = array(
         'success' => true,
         'message' => 'Thank you for your submission! We will contact you back!'
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
