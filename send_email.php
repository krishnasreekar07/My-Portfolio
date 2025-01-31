<?php

// Receive form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Basic input validation (optional)
if (empty($name) || empty($email) || empty($message)) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Please fill in all fields.']);
    exit;
}

// Email setup
$to = 'krishna.sreekar@example.com'; // Replace with your email address
$subject = 'Portfolio Contact Form Submission';
$from = 'noreply@yourwebsite.com'; // Replace with a suitable sender address

// Email body
$emailBody = "Name: $name\n";
$emailBody .= "Email: $email\n";
$emailBody .= "Message:\n$message";

// Send email
$headers = "From: $from";
if (mail($to, $subject, $emailBody, $headers)) {
    http_response_code(200); // OK
    echo json_encode(['success' => true]);
} else {
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Error sending email.']);
}

?>