<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Récupérer les données du formulaire
  $nom = $_POST['nom'];
  $telephone = $_POST['telephone'];
  $email = $_POST['email'];
  $adresse = $_POST['adresse'];
  $preferences = $_POST['preference'];
  $nom_utilisateur = $_POST['nom_utilisateur'];
  $mot_de_passe = $_POST['mot_de_passe'];

  // Valider les données du formulaire
  if (empty($nom) || empty($telephone) || empty($email) || empty($adresse) || empty($preferences) || empty($nom_utilisateur) || empty($mot_de_passe)) {
    $message = "Veuillez remplir tous les champs.";
  } else {
    // Connexion à la base de données
    $connexion = mysqli_connect('localhost', 'root', '', 'restaurant');

    // Vérification de la connexion
    if (!$connexion) {
      die("La connexion à la base de données a échoué : " . mysqli_connect_error());
    }

    // Vérification si l'utilisateur existe déjà dans la base de données
    $requete = "SELECT * FROM utilisateur WHERE email='$email'";
    $resultat = mysqli_query($connexion, $requete);

    if (mysqli_num_rows($resultat) > 0) {
      $message = "Cet e-mail est déjà utilisé.";
    } else {
      // Vérification si le mot de passe existe déjà dans la base de données
      $requete = "SELECT * FROM utilisateur WHERE mot_de_passe='$mot_de_passe'";
      $resultat = mysqli_query($connexion, $requete);

      if (mysqli_num_rows($resultat) > 0) {
        $message = "Ce mot de passe est déjà utilisé.";
      } else {
        // Insertion des données de l'utilisateur dans la base de données
        $requete = "INSERT INTO utilisateur (nom, telephone, email, adresse, preference, nom_utilisateur, mot_de_passe) VALUES ('$nom', '$telephone', '$email', '$adresse', '$preferences', '$nom_utilisateur', '$mot_de_passe')";
        $resultat = mysqli_query($connexion, $requete);

        if ($resultat) {
          // Redirection vers la page de connexion avec un message de succès
          header("Location: C:\wamp64\www\LivrEat\login.html?message=Inscription réussie. Vous pouvez maintenant vous connecter.");
          echo "Bienvenu ! actualise et connecte-toi.";
          exit();
        } else {
          $message = "Une erreur s'est produite lors de l'inscription.";
        }
      }
    }

    // Fermeture de la connexion à la base de données
    mysqli_close($connexion);
  }
}
?>
