<?php
session_start();

// Dummy login credentials (you can replace with DB check)
$valid_email = "user@example.com";
$valid_password = "password123";

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['loginEmail'] ?? '';
    $password = $_POST['loginPassword'] ?? '';

    // Validate
    if ($email === $valid_email && $password === $valid_password) {
        // Login success
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header("Location: request.php");
        exit;
    } else {
        // Invalid login, redirect back with error (optional)
        header("Location: 1.html?error=invalid");
        exit;
    }
} else {
    // Direct access to login.php
    header("Location: 1.html");
    exit;
}
?>
