<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize the form data
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Simple validation (optional)
    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required!";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
    } else {
        // If valid, you can send the data to an email or save it in a database
        
        // Example of sending an email (optional)
        $to = "aakashsutharthor10@gmail.com";  // Replace with your email address
        $subject = "New Contact Form Submission";
        $body = "Name: $name\nEmail: $email\nMessage: $message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            echo "Message sent successfully!";
        } else {
            echo "Sorry, something went wrong.";
        }
    }
} else {
    // Redirect to the form page if accessed directly
    header("Location: index.html"); // Replace with your form page
    exit();
}
?>
