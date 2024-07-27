<?php
session_start();
require 'db_connection.php'; // Include your database connection file

// Get form data
$learner = $_POST['learner'];
$parent = $_POST['parent'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$education = $_POST['education'];
$billingAddress = $_POST['billingAddress'];
$profilePicture = $_FILES['profilePicture']['name'];
$subscription = $_POST['subscription'];
$payment_option = $_POST['payment'];
$amount = floatval($_POST['amount']);
$total_amount = floatval($_POST['total_amount']);
$total_balance = floatval($_POST['total_balance']);
$terms_agreed = isset($_POST['terms']) ? 1 : 0;
$privacy_agreed = isset($_POST['privacy']) ? 1 : 0;

// Upload profile picture
$target_dir = "uploads/";
$target_file = $target_dir . basename($profilePicture);
move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file);

// Insert data into the database
$sql = "INSERT INTO account_registration (learner_name, parent_name, date_of_birth, gender, email, phone, username, password, education_level, billing_address, profile_picture, subscription, payment_option, amount, total_amount, balance,  terms_agreed, privacy_agreed, payment_status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssssssdddd", $learner, $parent, $dob, $gender, $email, $phone, $username, $password, $education, $billingAddress, $profilePicture, $subscription, $payment_option, $amount, $total_amount, $total_balance, $terms_agreed, $privacy_agreed, );

// Execute the statement
if ($stmt->execute()) {
    // Store user data in session
    $_SESSION['user_data'] = [
        'learner' => $learner,
        'parent' => $parent,
        'dob' => $dob,
        'gender' => $gender,
        'email' => $email,
        'phone' => $phone,
        'username' => $username,
        'education' => $education,
        'billingAddress' => $billingAddress,
        'profilePicturePath' => $profilePicture,
        'subscription' => $subscription,
        'payment_option' => $payment_option,
        'amount' => $amount,
        'total_amount' => $total_amount,
        'total_balance' => $total_balance,
        'terms_agreed' => $terms_agreed,
        'privacy_agreed' => $privacy_agreed
    ];

    // Redirect to success page
    header("Location: success.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>