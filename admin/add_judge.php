<?php
require_once '../includes/db.php';

$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $display_name = trim($_POST['display_name']);

    if (!empty($username) && !empty($display_name)) {
        $stmt = $conn->prepare("INSERT INTO judges (username, display_name) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $display_name);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $success = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Judge - Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f8;
            padding: 40px;
        }

        .container {
            background: #fff;
            max-width: 500px;
            margin: auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 15px 0 5px;
            font-weight: 600;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            margin-top: 20px;
            width: 100%;
            background: #2c3e50;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #1c5d8c;
        }

        .success {
            text-align: center;
            background: #2ecc71;
            color: white;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Add New Judge</h2>

        <?php if ($success): ?>
            <div class="success">Judge added successfully!</div>
        <?php endif; ?>

        <form method="POST">
            <label for="username">Username (unique ID)</label>
            <input type="text" name="username" id="username" required>

            <label for="display_name">Display Name</label>
            <input type="text" name="display_name" id="display_name" required>

            <button type="submit">Add Judge</button>
        </form>
    </div>

</body>

</html>