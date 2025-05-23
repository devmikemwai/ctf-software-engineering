<?php
require_once '../includes/db.php';

$query = "
    SELECT users.name, COALESCE(SUM(scores.points), 0) as total_points
    FROM users
    LEFT JOIN scores ON users.id = scores.user_id
    GROUP BY users.id
    ORDER BY total_points DESC
";

$results = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="10"> <!-- auto-refresh every 10s -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scoreboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f8;
            color: #333;
            margin: 0;
            padding: 40px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        table {
            width: 90%;
            max-width: 800px;
            margin: auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 15px 20px;
            text-align: left;
        }

        th {
            background: #34495e;
            color: white;
            font-weight: 600;
            font-size: 16px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }

        td strong {
            color: #2980b9;
        }

        * {
            box-sizing: border-box;
        }

        @media (max-width: 600px) {

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
                width: 100%;
            }

            thead {
                display: none;
            }

            tr {
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 6px;
                padding: 10px;
                background: white;
            }

            td {
                text-align: right;
                padding-left: 50%;
                position: relative;
                padding-top: 8px;
                padding-bottom: 8px;
                border-bottom: 1px solid #eee;
            }

            td::before {
                content: attr(data-label);
                position: absolute;
                left: 15px;
                width: 45%;
                padding-left: 15px;
                font-weight: bold;
                text-align: left;
                color: #555;
            }
        }
    </style>
</head>

<body>

    <h1>Live Scoreboard</h1>

    <table>
        <thead>
            <tr>
                <th>Participant</th>
                <th>Total Points</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $results->fetch_assoc()): ?>
                <tr>
                    <td data-label="Participant"><?= htmlspecialchars($row['name']) ?></td>
                    <td data-label="Total Points"><strong><?= $row['total_points'] ?></strong></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>

</html>