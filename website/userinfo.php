<?php
// userinfo.php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: logins.php');
    exit();
}

// Connect to MySQL
$con = mysqli_connect('localhost', 'root', '', 'user_db');
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Only proceed if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize inputs
    $user     = mysqli_real_escape_string($con, trim($_POST['user']));
    $email    = mysqli_real_escape_string($con, trim($_POST['email']));
    $mobile   = mysqli_real_escape_string($con, trim($_POST['mobile']));
    $comments = mysqli_real_escape_string($con, trim($_POST['comments']));

    // Basic server-side validation
    if (empty($user) || empty($email) || empty($mobile)) {
        die("Name, email, and mobile are required fields.");
    }

    // Prepare and execute insert
    $sql = "INSERT INTO inquiry (`user`, `email`, `mobile`, `comments`)
            VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($con));
    }
    mysqli_stmt_bind_param($stmt, 'ssss', $user, $email, $mobile, $comments);

    if (mysqli_stmt_execute($stmt)) {
        // Success: redirect back to homepage
        header('Location: index.php');
        exit();
    } else {
        // Failure: report error
        die("Insert failed: " . mysqli_stmt_error($stmt));
    }
} else {
    // Not a POST request
    header('Location: index.php');
    exit();
}
?>
