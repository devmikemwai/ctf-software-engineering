<?php
require_once '../includes/db.php';

$users = $conn->query("SELECT * FROM users");
$judges = $conn->query("SELECT * FROM judges");

$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judge_id = $_POST['judge_id'];
    $user_id = $_POST['user_id'];
    $points = $_POST['points'];

    $stmt = $conn->prepare("INSERT INTO scores (judge_id, user_id, points) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $judge_id, $user_id, $points);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $success = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Judge Scoring Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #eef1f5;
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

        select,
        input[type="number"] {
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
        <h2>Judge Scoring Panel</h2>

        <?php if ($success): ?>
            <div class="success">Score submitted successfully!</div>
        <?php endif; ?>

        <form method="POST">
            <label for="judge_id">Judge</label>
            <select name="judge_id" id="judge_id" required>
                <?php while ($row = $judges->fetch_assoc()): ?>
                    <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['display_name']) ?></option>
                <?php endwhile; ?>
            </select>

            <label for="user_id">Participant</label>
            <select name="user_id" id="user_id" required>
                <?php while ($row = $users->fetch_assoc()): ?>
                    <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['name']) ?></option>
                <?php endwhile; ?>
            </select>

            <label for="points">Points (1–100)</label>
            <input type="number" name="points" id="points" min="1" max="100" required>

            <button type="submit">Submit Score</button>
        </form>
    </div>

</body>

</html>