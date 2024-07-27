<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnCore Passphrase Generator</title>
    <style>
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
        }
        .container {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .logo img {
            height: 100px;
            width: 100px;
            border-radius: 100%;
        }
        .welcome-container h1 {
            font-size: 1.5rem;
            color: black;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .button {
            display: inline-block;
            padding: 15px 30px;
            margin: 10px;
            font-size: 1.2rem;
            color: white;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="./img/LearnCore3.png" alt="LearnCore Logo">
        </div>
        <div class="welcome-container">
            <h1>Welcome to LearnCore</h1>
            <?php
                session_start();

                // Example word bank
                $words = [
                    "countries" => [
                        "France", "Japan", "Brazil", "Canada", "India", "Australia",
                        "Germany", "Italy", "Mexico", "Spain", "China", "Russia",
                        "South Africa", "Argentina", "Turkey", "Egypt", "Thailand", "Sweden",
                        "Norway", "South Korea", "United Kingdom"
                    ],
                    "flowers" => [
                        "rose", "tulip", "daisy", "sunflower", "lily", "orchid",
                        "chrysanthemum", "violet", "poppy", "dahlia", "lotus", "marigold",
                        "hibiscus", "jasmine", "peony", "lavender", "iris", "carnation",
                        "geranium", "gardenia", "begonia"
                    ],
                    "actions" => [
                        "explores", "paints", "saves", "creates", "fixes", "teaches",
                        "jumps", "runs", "writes", "sings", "plays", "designs",
                        "drives", "builds", "learns", "shapes", "travels", "celebrates",
                        "adventures", "cooks", "bakes"
                    ],
                ];
                

                // Generate a time-sensitive passphrase
                function generate_passphrase($words) {
                    $template = "The {countries1} {flowers1} {actions1} the {countries2} {flowers2}.";
                    $passphrase = str_replace(
                        ["{countries1}", "{flowers1}", "{actions1}", "{countries2}", "{flowers2}"],
                        [
                            $words["countries"][array_rand($words["countries"])],
                            $words["flowers"][array_rand($words["flowers"])],
                            $words["actions"][array_rand($words["actions"])],
                            $words["countries"][array_rand($words["countries"])],
                            $words["flowers"][array_rand($words["flowers"])]
                        ],
                        $template
                    );
                    return $passphrase;
                }

                // Set expiration time (e.g., 5 minutes)
                $expiration_time = time() + 300;

                // Generate and store the passphrase
                $passphrase = generate_passphrase($words);
                $_SESSION['passphrase'] = $passphrase;
                $_SESSION['expiration'] = $expiration_time;

                // Display the passphrase to the user
                echo "<p>Your passphase is: <strong>$passphrase</strong></p>";
                echo "<p>This passphrase is valid until " . date("H:i:s", $expiration_time) . "</p>";
            ?>
            <a href="generate_phrase1.php" class="button">Generate New Passphrase</a>
            <a href="validate1.php" class="button">Validate</a>
        </div>
    </div>
</body>
</html>
