<?php

// 1. Connexion à la base
$conn = new mysqli("localhost", "root", "", "portfolio_db");

if($conn->connect_error){
    die("Connexion échouée : " . $conn->connect_error);
}

// 2. Récupération des données du formulaire
$nom = $_POST['nom'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$sujet = $_POST['sujet'];
$message = $_POST['message'];

// 3. Insertion en base
$sql = "INSERT INTO contacts (nom, email, telephone, sujet, message) 
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nom, $email, $telephone, $sujet, $message);

if($stmt->execute()){

    // 4. Envoi email automatique au propriétaire du portfolio
    $to = "developpeurwebetmobilefawaz@gmail.com";
    $subject = "Nouveau Message de votre Portfolio - $sujet";

    $content = "
    Nouveau message reçu :

    Nom : $nom
    Email : $email
    Téléphone : $telephone
    Sujet : $sujet
    Message :
    $message
    ";

    $headers = "From: $email";

    mail($to, $subject, $content, $headers);

    // 5. Message de confirmation au visiteur
    echo "<script>
alert('Message envoyé ! Je vous répondrai dans les plus brefs délais.');
window.location.href='index.html';
</script>";
} 
else {
    echo "Erreur : " . $conn->error;
}

$stmt->close();
$conn->close();
?>