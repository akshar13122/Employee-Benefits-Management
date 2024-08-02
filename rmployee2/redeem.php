<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.html');
    exit;
}

$user = $_SESSION['user'];
$message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $benefit = $_POST['benefit'];
    $benefitName = '';

    switch ($benefit) {
        case 'movie_tickets':
            $benefitName = 'Movie Tickets';
            break;
        case 'salary_hike':
            $benefitName = 'Hospital bill payment (20% once in a year)';
            break;
        case 'family_tour':
            $benefitName = 'Family Tour Tickets';
            break;
        case 'flexible_working_hours':
            $benefitName = 'Flexible Working Hours Facility + Work From Home Facility';
            break;
        default:
            $message = "Invalid benefit selected.";
            $_SESSION['message'] = $message;
            header('Location: redeem.php');
            exit;
    }

    $message = "Congratulations, your $benefitName has been collected.";
    $_SESSION['message'] = $message;
    header('Location: redeem.php');
    exit;
}

$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
if (isset($_SESSION['message'])) {
    unset($_SESSION['message']); // Clear the message after displaying
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redeem Points</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #B2FFFF;
        }
        .redeem-card {
            position: relative;
            bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 20px;
            background-color: #f1f1f1;
            text-align: center;
            margin: 20px auto;
            width: 80%;
            max-width: 600px;
        }
        .redeem-card h2 {
            margin-top: 0;
        }
        .redeem-form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .redeem-form label {
            margin: 10px 0;
        }
        .redeem-form input[type="submit"] {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .redeem-form input[type="submit"]:hover {
            background-color: #45a049;
        }
        .message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            margin: 20px 0;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Redeem Your Points</h1>
    </header>
    
    <main>
        <section class="redeem-card">
            <h2>Select a Benefit</h2>
            <?php if ($message): ?>
                <div class="message"><?php echo $message; ?></div>
            <?php endif; ?>
            <form class="redeem-form" action="" method="post">
                <label for="benefit">Select Benefit:</label>
                <select id="benefit" name="benefit">
                    <?php if ($user['points'] >= 100): ?>
                        <option value="movie_tickets">Movie Tickets - 100 points</option>
                    <?php endif; ?>
                    <?php if ($user['points'] >= 200): ?>
                        <option value="salary_hike">Hospital bill payment (20% once in a year) - 200 points</option>
                    <?php endif; ?>
                    <?php if ($user['points'] >= 300): ?>
                        <option value="family_tour">Family Tour Tickets - 300 points</option>
                    <?php endif; ?>
                    <?php if ($user['points'] >= 400): ?>
                        <option value="flexible_working_hours">Flexible Working Hours Facility + Work From Home Facility - 400 points</option>
                    <?php endif; ?>
                </select>
                <input type="submit" value="Redeem">
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Employee Benefits, Inc. All rights reserved.</p>
    </footer>
</body>
</html>
