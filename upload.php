<?php
require 'db_connection.php'; // Connection to the database

// Fetch records from account_registration where payment_status is 'paid'
$query = "SELECT learner_name, username, email, subscription, amount, payment_option, total_amount, balance, registration_date, payment_status
          FROM account_registration 
          WHERE payment_status = 'paid'";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $learner_name = $row['learner_name'];
        $username = $row['username'];
        $email = $row['email'];
        $subscription = $row['subscription'];
        $amount = $row['amount'];
        $payment_option = $row['payment_option'];
        $total_amount = $row['total_amount'];
        $balance = $row['balance'];
        $registration_date = $row['registration_date'];
        $payment_status = $row['payment_status'];

        // Check if the email already exists in the official_learners_payment table
        $check_stmt = $conn->prepare("SELECT COUNT(*) FROM official_learners_payment WHERE email = ?");
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $check_stmt->bind_result($count);
        $check_stmt->fetch();
        $check_stmt->close();

        if ($count == 0) {
            // Insert into official_learners_payment table if not already present
            $stmt = $conn->prepare("INSERT INTO official_learners_payment
                (learner_name, username, email, subscription, amount, payment_option, total_amount, balance, registration_date, payment_status) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            
            // Adjust parameter types as needed
            $stmt->bind_param("ssssddddss", $learner_name, $username, $email, $subscription, $amount, $payment_option, $total_amount, $balance, $registration_date, $payment_status);

            try {
                if ($stmt->execute()) {
                    echo "Successfully inserted: $email<br>";
                    header ('Location: paid_leaners.php');
                } else {
                    echo "Failed to insert: $email<br>Error: " . $stmt->error . "<br>";
                }
            } catch (mysqli_sql_exception $e) {
                echo "Error executing statement: " . $e->getMessage() . "<br>";
            }

            $stmt->close();
        } else {
            echo "Record already exists: $email<br>";
        }
    }
} else {
    echo 'No paid records found.';
}

$conn->close();
?>
