<?php

$email = $_POST["email"];
$reply = $_POST["reply"];

mail($email, "Réponse à votre message", $reply, "From: developpeurwebetmobilefawaz@gmail.com");

echo "<script>
alert('Réponse envoyée ✔');
window.location.href='messages.php';
</script>";