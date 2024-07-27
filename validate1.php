<?php
session_start();

$message = "";

// Function to validate the passphrase
function validate_passphrase($input) {
    if (time() > $_SESSION['expiration']) {
        return "<div class='message error'>The passphrase has expired.</div><br>";
    }
    if ($input === $_SESSION['passphrase']) {
        header("Location: admin2.php");
        exit(); // Ensure to exit after header redirection
    } else {
        return "<div class='message error'>The passphrase is incorrect.</div><br>";
    }
}

// Example of how to validate (in a real scenario, you would get the input from the user)
if (isset($_POST['passphrase'])) {
    $user_input = $_POST['passphrase'];
    $message = validate_passphrase($user_input);
} else {
    $message = "<div class='message error'>No passphrase provided.</div><br>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Validate Passphrase</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rokkitt:wght@400;700&display=swap');

        body {
            background-image: url('./img/backgroundlearn_core.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            font-family: 'Rokkitt', serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .container {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 500px;
        }

        .message {
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 5px;
            font-size: 1.2em;
        }

        .message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 10px;
            font-size: 1.2em;
            font-weight: bold;
        }

        input[type="text"] {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            max-width: 300px;
            font-size: 1em;
        }

        input[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1em;
            color: white;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin-bottom: 20px; /* Added margin-bottom */
        }

        .button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php echo $message; ?>
        <h2>Validate Passphrase</h2>
        <form method="POST" action="">
            <label for="passphrase">Enter passphrase:</label>
            <input type="text" id="passphrase" name="passphrase" required>
            <input type="submit" value="Validate">
        </form>
        <a href="generate_phrase1.php" class="button">Generate New Passphrase</a>
    </div>
</body>
</html>
