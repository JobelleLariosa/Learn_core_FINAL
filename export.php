<?php
require 'db_connection.php'; // Connection to the database

// Set headers to indicate a file download
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=official_learners.csv');

// Open output stream
$output = fopen('php://output', 'w');

// Fetch records from official_learners
$query = "SELECT learner_name, username, email, subscription, amount, payment_option, total_amount, balance, registration_date, payment_status
          FROM official_learners_payment";
$result = $conn->query($query);

// Output the header row
fputcsv($output, array('Learner Name', 'Username', 'Email', 'Subscription', 'Amount', 'Payment Option', 'Total Amount', 'Balance', 'Registration Date', 'Payment Status'));

// Output the data rows
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
} else {
    fputcsv($output, array('No records found.'));
}

// Close output stream
fclose($output);
$conn->close();

exit();
?>
