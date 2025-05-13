<?php
session_start();

// Process registration form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Capture form data
    $uname = $_POST['uname'] ?? '';
    $uemail = $_POST['uemail'] ?? '';
    $pass = $_POST['pass'] ?? '';
    $confirmpass = $_POST['confirmpass'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $gen = $_POST['gen'] ?? '';
    $fcolor = $_POST['fcolor'] ?? '';
    $bio = $_POST['bio'] ?? '';
    $tc = isset($_POST['tc']) ? 'Accepted' : 'Not Accepted';

    // Simple form validation (expand as necessary)
    if ($pass !== $confirmpass) {
        $_SESSION['error'] = 'Passwords do not match';
        header("Location: index.php"); // Redirect back to registration form with error
        exit;
    }

    // Store the form data in session
    $_SESSION['user'] = [
        'uname' => $uname,
        'uemail' => $uemail,
        'dob' => $dob,
        'gen' => $gen,
        'fcolor' => $fcolor,
        'bio' => $bio,
        'tc' => $tc
    ];

    // Redirect to success page
    header("Location: success.php");
    exit;
}
?>
