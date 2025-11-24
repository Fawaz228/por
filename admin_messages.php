<?php
$conn = new mysqli("localhost", "root", "", "portfolio_db");
$result = $conn->query("SELECT * FROM contacts ORDER BY id DESC");
?>

<h2>Messages reçus</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th>Sujet</th>
        <th>Message</th>
        <th>Date</th>
        <th>Répondre</th>
    </tr>

    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['nom'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['telephone'] ?></td>
        <td><?= $row['sujet'] ?></td>
        <td><?= nl2br($row['message']) ?></td>
        <td><?= $row['created_at'] ?></td>
        <td><a href="repondre.php?email=<?= $row['email'] ?>&nom=<?= $row['nom'] ?>">Répondre</a></td>
    </tr>
    <?php endwhile; ?>
</table>