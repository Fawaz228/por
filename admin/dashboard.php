<?php
session_start();
if (!isset($_SESSION["admin"])) header("Location: login.php");

require "../config.php";

$result = $conn->query("SELECT * FROM contacts ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        display: flex;
        background: #f4f6f9;
    }

    /* SIDEBAR */
    .sidebar {
        width: 250px;
        background: #111827;
        height: 100vh;
        color: white;
        padding: 20px;
        position: fixed;
    }

    .sidebar h2 {
        margin-bottom: 30px;
        font-size: 22px;
        text-align: center;
        color: #38bdf8;
    }

    .sidebar a {
        display: block;
        padding: 12px 15px;
        margin: 10px 0;
        text-decoration: none;
        color: #e5e7eb;
        background: #1f2937;
        border-radius: 6px;
        transition: 0.3s;
    }

    .sidebar a:hover {
        background: #38bdf8;
        color: #111827;
    }

    /* MAIN CONTENT */
    .main {
        margin-left: 250px;
        padding: 25px;
        width: calc(100% - 250px);
    }

    h1 {
        margin-bottom: 20px;
        color: #111827;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
        padding: 12px 15px;
        border-bottom: 1px solid #eee;
        text-align: left;
    }

    th {
        background: #38bdf8;
        color: white;
        font-size: 15px;
    }

    tr:hover {
        background: #f1faff;
    }

    .reply-btn {
        background: #0ea5e9;
        padding: 8px 12px;
        color: white;
        border-radius: 5px;
        text-decoration: none;
        font-size: 14px;
    }

    .reply-btn:hover {
        background: #0369a1;
    }

    /* MOBILE */
    @media (max-width: 768px) {
        .sidebar {
            width: 200px;
        }

        .main {
            margin-left: 200px;
        }
    }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>ADMIN PANEL</h2>

        <a href="dashboard.php">📥 Messages</a>
        <a href="logout.php" style="background:#ef4444;">🚪 Déconnexion</a>
    </div>

    <!-- MAIN -->
    <div class="main">
        <h1>📥 Messages Reçus</h1>

        <table>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Sujet</th>
                <th>Message</th>
                <th>Date</th>
                <th>Répondre</th>
            </tr>

            <?php while($m = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($m['nom']) ?></td>
                <td><?= htmlspecialchars($m['email']) ?></td>
                <td><?= htmlspecialchars($m['sujet']) ?></td>
                <td><?= nl2br(htmlspecialchars($m['message'])) ?></td>
                <td><?= $m['created_at'] ?></td>
                <td><a class="reply-btn" href="reply.php?id=<?= $m['id'] ?>">Répondre</a></td>
            </tr>
            <?php endwhile; ?>

        </table>
    </div>

    <script>
    // Petite animation lors du chargement
    document.querySelector(".main").style.opacity = 0;
    setTimeout(() => {
        document.querySelector(".main").style.transition = "0.7s";
        document.querySelector(".main").style.opacity = 1;
    }, 100);
    </script>

</body>

</html>