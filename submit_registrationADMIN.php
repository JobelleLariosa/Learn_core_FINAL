<?php
session_start();
require 'db_connection.php'; // Include your database connection file

// Sanitize and retrieve form data
$full_name = $conn->real_escape_string($_POST['learner']);
$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string(password_hash($_POST['password'], PASSWORD_DEFAULT)); // Hash the password
$dob = $conn->real_escape_string($_POST['dob']);
$gender = $conn->real_escape_string($_POST['gender']);
$email = $conn->real_escape_string($_POST['email']);
$phone = $conn->real_escape_string($_POST['phone']);
$terms_accepted = isset($_POST['terms']) ? 1 : 0;
$privacy_accepted = isset($_POST['privacy']) ? 1 : 0;

// Prepare and execute the SQL statement
$sql = "INSERT INTO admins (full_name, username, password, dob, gender, email, phone, terms_accepted, privacy_accepted)
        VALUES ('$full_name', '$username', '$password', '$dob', '$gender', '$email', '$phone', $terms_accepted, $privacy_accepted)";

if ($conn->query($sql) === TRUE) {
    echo("Register Succesfully!");
    header("Location: homepage_loginpage.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
