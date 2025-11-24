<?php
session_start();

if ($_POST) {
    if ($_POST["user"] === "fawaz" && $_POST["pass"] === "admin123") {
        $_SESSION["admin"] = true;
        header("Location: dashboard.php");
    } else {
        $error = "Identifiants incorrects";
    }
}
?>

<form method="POST" class="login-box">
    <h2>Admin Login</h2>
    <input type="text" name="user" placeholder="Utilisateur" required>
    <input type="password" name="pass" placeholder="Mot de passe" required>
    <button type="submit">Connexion</button>
    <p class="error"><?= $error ?? "" ?></p>
</form>