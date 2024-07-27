<?php
session_start();
require 'db_connection.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username'], $_POST['email']) && !isset($_POST['new_password']) && !isset($_POST['confirm_password'])) {
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);

        // Check if username and email match
        $stmt = $conn->prepare("SELECT * FROM account_registration WHERE username = ? AND email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Valid username and email found, proceed to display reset password form
            display_reset_form($username, $email);
        } else {
            // Invalid username or email
            echo "<script>alert('Invalid username or email.'); window.location.href = 'request_reset.html';</script>";
            exit;
        }
    } elseif (isset($_POST['new_password'], $_POST['confirm_password'], $_POST['username'], $_POST['email'])) {
        $new_password = htmlspecialchars($_POST['new_password']);
        $confirm_password = htmlspecialchars($_POST['confirm_password']);
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);

        if (check_passwords_match($new_password, $confirm_password)) {
            $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

            // Update the password in the database
            $stmt = $conn->prepare("UPDATE account_registration SET password = ? WHERE username = ? AND email = ?");
            $stmt->bind_param("sss", $hashed_password, $username, $email);

            if ($stmt->execute()) {
                // Password updated successfully, redirect to login page
                echo "<script>alert('Successfully reset your previous password! '); window.location.href = 'homepage_loginpage.html'</script> ";
                exit;
            } else {
                // Error updating password
                echo "<script>alert('Error updating password. Please try again.');</script>";
                exit;
            }
        } else {
            // Passwords do not match
            echo "<script>alert('Passwords do not match. Please try again.'); window.location.href = 'reset_password.php'</script>";
            exit;
        }
    } else {
        // Missing parameters or invalid request method
        header("Location: request_reset.html");
        exit;
    }
} else {
    // Invalid request method
    header("Location: request_reset.html");
    exit;
}

// Function to check if the passwords match
function check_passwords_match($new_password, $confirm_password) {
    return $new_password === $confirm_password;
}

// Function to display the reset form
function display_reset_form($username, $email) {
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    
<link rel="website icon" type="png" href="img/LearnCore3.png" id="logo1" style="border-radius: 100%;">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            background-image: url('img/backgroundlearn_core.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .reset-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .reset-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .txt-field {
            margin-bottom: 15px;
            position: relative;
        }
        .txt-field label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        .txt-field input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .toggle-password {
            position: absolute;
            top: 65%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
        button {
            width: 48%;
            padding: 10px;
            background-color: #5cb85c;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-bottom: 10px;
        }
        button:hover {
            background-color: #4cae4c;
        }
        .back-button {
            background-color: #d9534f;
        }
        .back-button:hover {
            background-color: #c9302c;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="reset-container">
        <h2>Reset Password</h2>
        <form action="reset_password.php" method="post">
            <input type="hidden" name="username" value="<?php echo htmlspecialchars($username); ?>">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <div class="txt-field">
                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" required>
                <span class="toggle-password" onclick="togglePassword('new_password')">👁️</span>
            </div>
            <div class="txt-field">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
                <span class="toggle-password" onclick="togglePassword('confirm_password')">👁️</span>
            </div>
            <div class="button-container">
                <button type="submit">Reset Password</button>
                <button type="button" class="back-button" onclick="window.location.href='homepage_loginpage.html';">Back</button>
            </div>
        </form>
    </div>
    <script>
        function togglePassword(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const toggleIcon = passwordField.nextElementSibling;

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.textContent = '🙈'; // Change icon to indicate the text is visible
            } else {
                passwordField.type = 'password';
                toggleIcon.textContent = '👁️'; // Change icon back to indicate the text is hidden
            }
        }
    </script>
</body>
</html>
<?php
}
?>
