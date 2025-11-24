<?php
require "../config.php";

$id = $_GET["id"];
$msg = $conn->query("SELECT * FROM contacts WHERE id=$id")->fetch_assoc();
?>

<h2>Répondre à <?= $msg['nom'] ?></h2>

<form method="POST" action="send_reply.php">
    <input type="hidden" name="email" value="<?= $msg['email'] ?>">
    <textarea name="reply" placeholder="Votre réponse..." required></textarea>
    <button>Envoyer</button>
</form>