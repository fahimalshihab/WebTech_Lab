<?php
session_start();

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Capture form data (same as before)
    $uname = $_POST['uname'] ?? '';
    $uemail = $_POST['uemail'] ?? '';
    $pass = $_POST['pass'] ?? '';
    $confirmpass = $_POST['confirmpass'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $gen = $_POST['gen'] ?? '';
    $fcolor = $_POST['fcolor'] ?? '';
    $bio = $_POST['bio'] ?? '';
    $tc = isset($_POST['tc']) ? 'Accepted' : 'Not Accepted';

    // Validate passwords
    if ($pass !== $confirmpass) {
        $_SESSION['error'] = 'Passwords do not match';
        header("Location: 1.html"); // Redirect back
        exit;
    }

    // Store data in session
    $_SESSION['user'] = [
        'uname' => $uname,
        'uemail' => $uemail,
        'dob' => $dob,
        'gen' => $gen,
        'fcolor' => $fcolor,
        'bio' => $bio,
        'tc' => $tc
    ];

    // Show success page (HTML output)
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Registration Success</title>
    </head>
    <body>
        <h1>Registration Successful!</h1>
        <h2>Submitted Data:</h2>
        <p><strong>Name:</strong> <?= htmlspecialchars($uname) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($uemail) ?></p>
        <p><strong>Date of Birth:</strong> <?= htmlspecialchars($dob) ?></p>
        <p><strong>Gender:</strong> <?= htmlspecialchars($gen) ?></p>
        <p><strong>Favorite Color:</strong> <span style="color: <?= htmlspecialchars($fcolor) ?>">■</span> <?= htmlspecialchars($fcolor) ?></p>
        <p><strong>Bio:</strong> <?= nl2br(htmlspecialchars($bio)) ?></p>
        <p><strong>Terms Accepted:</strong> <?= $tc ?></p>
    </body>
    </html>
    <?php
    exit;
}
?>