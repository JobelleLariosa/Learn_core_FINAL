<?php
session_start();
require 'db_connection.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Check in the admin table
    $stmt = $conn->prepare("SELECT password, full_name FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashed_password, $name);
    $stmt->fetch();

    if ($hashed_password && password_verify($password, $hashed_password)) {
        $_SESSION['username'] = $username;
        $_SESSION['name'] = $name;
        $_SESSION['role'] = 'admin';
        header("Location: validate1.php"); // Learner dashboard
        exit;
    }

    // Check in the learners table
    $stmt->close();
    $stmt = $conn->prepare("SELECT password, learner_name FROM account_registration WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashed_password, $name);
    $stmt->fetch();

    if ($hashed_password && password_verify($password, $hashed_password)) {
        $_SESSION['username'] = $username;
        $_SESSION['name'] = $name;
        $_SESSION['role'] = 'learner';
        header("Location: validate.php"); // Learner dashboard
        exit;
    }

    // If credentials are not found in either table
    $_SESSION['error'] = 'Invalid username or password. Please try again.';
    header("Location: homepage_loginpage.html?error=1");
    exit;

    $stmt->close();
} else {
    header("Location:homepage_loginpage.html");
    exit;
}

$conn->close();
?>
