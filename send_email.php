<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Validate inputs
    if (!$name ||!$email ||!$subject ||!$message) {
        echo "<script>alert('Please fill out all fields.')</script>";
        exit;
    }

    // Define the recipient's email address
    $to = 'megharajdandgavhal2004@gmail.com'; // Your email address

    // Construct the email headers
    $headers = "From: $email\r\n";
    $headers.= "Reply-To: $email\r\n";
    $headers.= "MIME-Version: 1.0\r\n";
    $headers.= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Prepare the email body
    $body = "Name: $name\n";
    $body.= "Email: $email\n";
    $body.= "Subject: $subject\n";
    $body.= "Message: $message";

    // Check if the $to variable is defined and not empty
    if (!empty($to)) {
        if (mail($to, $subject, $body, $headers)) {
            echo "<script>alert('Your message has been sent successfully')</script>";
        } else {
            echo "<script>alert('Failed to send your message. Please try again later.')</script>";
        }
    } else {
        echo "<script>alert('Recipient email address is not defined.')</script>";
    }
} else {
    echo "Invalid request method.";
}
?>
