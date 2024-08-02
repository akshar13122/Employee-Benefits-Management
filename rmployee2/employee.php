<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.html');
    exit;
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #B2FFFF;
        }
        .benefits-section {
            margin-bottom: 20px;
        }
        .points-info {
            font-weight: bold;
        }
        .benefits-list {
            list-style-type: none;
            padding: 0;
        }
        .benefits-list li {
            background-color: #f9f9f9;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .redeem-button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            text-align: center;
            cursor: pointer;
            width: 150px;
            text-decoration: none;
        }
        .redeem-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome, <?php echo $user['name']; ?></h1>
    </header>
    
    <main>
        <section class="benefits-section">
            <h2>Your Benefits</h2>
            <p class="points-info">You have <?php echo $user['points']; ?> points.</p>
            <ul class="benefits-list">
                <?php if ($user['points'] >= 100): ?>
                    <li>Movie Tickets</li>
                <?php endif; ?>
                <?php if ($user['points'] >= 200): ?>
                    <li>Hospital bill payment(20% once in a year)</li>
                <?php endif; ?>
                <?php if ($user['points'] >= 300): ?>
                    <li>Family Tour Tickets</li>
                <?php endif; ?>
                <?php if ($user['points'] >= 400): ?>
                    <li>Flexible Working Houres Facility + Work From Home  Facility </li>
                <?php endif; ?>
            </ul>
        </section>

        <a href="redeem.php" class="redeem-button">Redeem Your Points</a>
    </main>

    <footer>
        <p>&copy; 2024 Employee Benefits, Inc. All rights reserved.</p>
    </footer>
</body>
</html>
