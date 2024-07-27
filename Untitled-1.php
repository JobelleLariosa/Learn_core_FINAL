<?php
// Database connection
$mysqli = new mysqli("localhost", "username", "password", "database");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve form data
$learner = $_POST['learner'];
$parent = $_POST['parent'];
$username = $_POST['username'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$education = $_POST['education'];
$subscription = $_POST['subscription'];
$amount = $_POST['amount'];
$payment_option = $_POST['payment_option'];
$total_amount = $_POST['total_amount'];
$total_balance = $_POST['total_balance'];
$billingAddress = $_POST['billingAddress'];
$payment_status = $_POST['payment_status'];

// Check for empty payment_option
if (empty($payment_option)) {
    die("Payment option is required.");
}

// Prepare and bind
$stmt = $mysqli->prepare("INSERT INTO account_registration (learner_name, parent_name, username, password, date_of_birth, gender, email, phone,  education_level, subscription, amount, payment_option, total_amount, total_balance, billingAddress, payment_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

if ($stmt === false) {
    die("Prepare failed: " . $mysqli->error);
}

$stmt->bind_param("ssssssssssssssss", $learner, $parent, $username, $password, $confirm_password, $gender, $email, $phone, $dob, $education, $subscription, $amount, $payment_option, $total_amount, $total_balance, $billingAddress, $payment_status);

// Execute
if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}

echo "Registration successful!";

// Close statement and connection
$stmt->close();
$mysqli->close();
?>
