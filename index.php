<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - CTF Scoring</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background: #ecf0f1;
        }

        header {
            background: #34495e;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        .card {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .link-box {
            background: #2c3e50;
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            font-size: 18px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .link-box:hover {
            background: #3B536CFF;
        }
    </style>
</head>

<body>

    <header>
        <h2>CTF Event Admin Dashboard</h2>
    </header>

    <div class="container">
        <h1>Manage Scoring System</h1>
        <div class="card">
            <a href="admin/add_judge.php" class="link-box">Add New Judge</a>
            <a href="judge/score_user.php" class="link-box">Judge Panel (Score Submission)</a>
            <a href="public/scoreboard.php" class="link-box">View Public Scoreboard</a>
        </div>
    </div>

</body>

</html>