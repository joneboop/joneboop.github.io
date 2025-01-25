<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validate required fields
    if (empty($name) || empty($email) || empty($message)) {
        echo json_encode(['error' => 'All fields are required.']);
        http_response_code(400);
        exit;
    }

    // Email details
    $to = "joonastj.korkiakoski@gmail.com"; // Replace with your email address
    $subject = "Contact Form Inquiry from $name";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    // Additional headers
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(['success' => 'Message sent successfully.']);
        http_response_code(200);
    } else {
        echo json_encode(['error' => 'Failed to send message.']);
        http_response_code(500);
    }
} else {
    echo json_encode(['error' => 'Invalid request method.']);
    http_response_code(405);
}
?>