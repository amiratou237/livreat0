<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=restaurant',
'root', '');
// Récupération des données du formulaire
$nom_utilisateur = $_POST['nom_utilisateur'];
$mot_de_passe = $_POST['mot_de_passe'];
// Requête pour récupérer l'ID de l'utilisateur en fonction du nom d'utilisateur et du mot de passe
$stmt = $pdo->prepare('SELECT id_utilisateur FROM utilisateur WHERE nom_utilisateur = :nom_utilisateur
AND mot_de_passe = :mot_de_passe');
$stmt->execute(['nom_utilisateur' => $nom_utilisateur, 'mot_de_passe' => $mot_de_passe]);
$user = $stmt->fetch();
// Vérification si l'utilisateur a été trouvé
if ($user) {
 // Démarrage de la session
 session_start();
 // Enregistrement de l'ID de l'utilisateur dans une variable de session
 $_SESSION['id_utilisateur'] = $user['id_utilisateur'];
 // Redirection vers la page d'accueil
 header('Location: index.php');
 exit;
} else {
 // Si l'utilisateur n'est pas trouvé, retourner à la page de connexion avec un message d'erreur
 header('Location: login.php?error=1');
 exit;
}
?>
