<?php
session_start();
if (!isset($_SESSION["admin"])) header("Location: login.php");

require "../config.php";

$result = $conn->query("SELECT * FROM contacts ORDER BY id DESC");
?>

<h2>Messages Reçus</h2>

<table class="msg-table">
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
        <td><?= $m['nom'] ?></td>
        <td><?= $m['email'] ?></td>
        <td><?= $m['sujet'] ?></td>
        <td><?= nl2br($m['message']) ?></td>
        <td><?= $m['created_at'] ?></td>
        <td><a href="reply.php?id=<?= $m['id'] ?>">📩</a></td>
    </tr>
    <?php endwhile; ?>

</table>