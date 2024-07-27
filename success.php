<?php
session_start();

// Check if user data is available in session
if (!isset($_SESSION['user_data'])) {
    header("Location: index.php");
    exit;
}

$user = $_SESSION['user_data'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            background-image: url('img/backgroundlearn_core.png');
            background-repeat: no-repeat;
            background-size: cover;
            font-family: 'Kanit', sans-serif;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 50px;
            max-width: 800px;
        }
        .container h1 {
            color: #4CAF50;
            text-align: center;
            margin-bottom: 20px;
        }
        .details {
            margin: 20px 0;
        }
        .details p {
            margin: 5px 0;
        }
        .profile-picture {
            text-align: center;
            margin: 20px 0;
        }
        .profile-picture img {
            max-width: 200px;
            height: 200px;
            border-radius: 10%;
        }
        .left, .right {
            display: inline-block;
            width: 45%;
            vertical-align: top;
        }
        .right {
            text-align: right;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Registration Successful!</h1>
    <p class="text-center">Thank you for registering. Here are your details:</p>

    <?php if (!empty($user['profilePicturePath'])): ?>
        <div class="details">
            <div class="profile-picture">
                <img src="uploads/<?php echo htmlspecialchars($user['profilePicturePath']); ?>" alt="Profile Picture">
            </div>
        
            <div class="left">
                <p><strong>Full Name of Learner:</strong> <?php echo htmlspecialchars($user['learner']); ?></p>
                <p><strong>Full Name of Parent:</strong> <?php echo htmlspecialchars($user['parent']); ?></p>
                <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($user['dob']); ?></p>
                <p><strong>Gender:</strong> <?php echo htmlspecialchars($user['gender']); ?></p>
                <p><strong>Email Address:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
                <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
                <p><strong>Education Level:</strong> <?php echo htmlspecialchars($user['education']); ?></p>
            </div>
            <div class="left">
                
                <p><strong>Billing Address:</strong> <?php echo htmlspecialchars($user['billingAddress']); ?></p>
                <p><strong>Subscription:</strong> <?php echo htmlspecialchars($user['subscription']); ?></p>
                <p><strong>Payment Status:</strong> <?php echo htmlspecialchars($user['payment_status']); ?></p>
                <p><strong>Payment Option:</strong> <?php echo htmlspecialchars($user['payment_option']); ?></p>
                <p><strong>Amount:</strong> <?php echo htmlspecialchars($user['amount']); ?></p>
                <p><strong>Total Amount:</strong> <?php echo htmlspecialchars($user['total_amount']); ?></p>
                <p><strong>Total Amount:</strong> <?php echo htmlspecialchars($user['total_balance']); ?></p>
            </div>
        </div><!-- .details -->
        <div class="text-center">
            <a href="homepage_loginpage.html" class="btn btn-primary btn-lg" style="font-size: 18px;">Done!</a>
        </div>
    <?php endif; ?>

</div><!-- .container -->

</body>
</html>
