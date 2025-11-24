<?php
$email = $_GET['email'];
$nom = $_GET['nom'];
?>

<h2>Répondre à <?= $nom ?></h2>

<form action="send_reply.php" method="POST">
    <input type="hidden" name="email" value="<?= $email ?>">
    <textarea name="reply" cols="40" rows="10" placeholder="Votre réponse..." required></textarea>
    <br><br>
    <button type="submit">Envoyer Réponse</button>
</form>