<?php
session_start();

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérification de la connexion
if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: login.php');
    exit();
}

// Vérifier si l'ID du plat à supprimer est passé en paramètre dans l'URL
if (!isset($_GET['id'])) {
    // Rediriger vers la page de liste des plats si l'ID n'est pas spécifié
    header('Location: membre.php');
    exit();
}

// Récupérer l'ID du plat à supprimer
$id = $_GET['id'];

// Supprimer le plat correspondant à l'ID donné dans la base de données
$query = "DELETE FROM utilisateur WHERE id = $id";
mysqli_query($conn, $query);

// Rediriger vers la page de liste des plats après la suppression
header('Location: membre.php');
exit();

// Fermer la connexion à la base de données
mysqli_close($conn);
?>