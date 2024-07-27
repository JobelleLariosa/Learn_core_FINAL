<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: LearnCore_Login_V2.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>LearnCore</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- google font cdn link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rokkitt&display=swap" rel="stylesheet">

    <!-- import jquery and bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="img/LearnCore3.png">

    <style>
    body {
    background-image: url('img/backgroundlearn_core.png');
    background-size: cover;
    background-attachment: fixed;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background-color: #f9f9f9;
}

.container {
    background: rgba(255, 255, 255, 0.9);
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-top: 20px; /* Reduced margin to avoid excessive space */
    width: 90%;
    max-width: 1200px;
    overflow-x: auto; /* Adds horizontal scroll if content is too wide */
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px; /* Reduced padding for better fit */
    text-align: left;
    word-wrap: break-word; /* Ensures long words are broken into new lines */
}

th {
    background-color: #f4f4f4;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

.btn {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #0056b3;
}

.btn-edit {
    background-color: #28a745;
}

.btn-edit:hover {
    background-color: #218838;
}

.btn-delete {
    background-color: #dc3545;
}

.btn-delete:hover {
    background-color: #c82333;
}

.btn-container {
    display: flex;
    justify-content: flex-end;
    margin-top: 20px;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>LearnCore Student List</h1>
        <?php
            // Include the database connection file
            require 'db_connection.php';

            // Query to fetch data from the 'account_registration' table
            $query = "SELECT learner_name, username, email,  subscription, amount, payment_option, total_amount, balance, registration_date, payment_status FROM official_learners_payment";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                // Start of the HTML table
                echo '<table>';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Learner Name</th>';
                echo '<th>Username</th>';
                echo '<th>Email</th>';
                echo '<th>Subscription</th>';
                echo '<th>Amount</th>';
                echo '<th>Payment Option</th>';
                echo '<th>Total Amount</th>';
                echo '<th>Balance</th>';
                echo '<th>Registration Date</th>';
                echo '<th>Payment Status</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                // Fetch and display each row of data
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row['learner_name']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['username']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['subscription']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['amount']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['payment_option']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['total_amount']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['balance']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['registration_date']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['payment_status']) . '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p>No records found.</p>';
            }

            // Close the database connection
            $conn->close();
        ?>
        <div class="btn-container">
            <a href="student_record_payment.php" class="btn">Back</a>
            </form>
        </div>
    </div>
</body>
</html>
