<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--========== BOX ICONS ==========-->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css">


        <title>LivrEat</title>
    </head>
    <body>

        <!--========== SCROLL TOP ==========-->
        <a href="#" class="scrolltop" id="scroll-top">
            <i class='bx bx-chevron-up scrolltop__icon'></i>
        </a>

        <!--========== HEADER ==========-->
        <header class="l-header" id="header">
            <nav class="nav bd-container">
                <a href="#" class="nav__logo">LivrEat</a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                    <li class="nav__item"><a href="membre.php" class="nav__link active-link">Membres</a></li>
                        <li class="nav__item"><a href="boutique.php" class="nav__link active-link">Boutique</a></li>
                    </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-menu'></i>
                </div>
            </nav>
        </header>


            <!--========== MENU ==========-->
            <section class="menu section bd-container" id="">
                <span class="section-subtitle"></span>
                <h2 class="section-title">Bienvenu</h2>

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

// Vérifier si l'ID du plat à modifier est passé en paramètre dans l'URL
if (!isset($_GET['id'])) {
    // Rediriger vers la page de liste des plats si l'ID n'est pas spécifié
    header('Location: boutique.php');
    exit();
}

// Récupérer l'ID du plat à modifier
$id = $_GET['id'];

// Récupérer les informations du plat à partir de la base de données
$query = "SELECT * FROM plats WHERE id = $id";
$result = mysqli_query($conn, $query);
$plat = mysqli_fetch_assoc($result);

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les informations du formulaire
    $nom_plat = $_POST['nom_plat'];
    $prix = $_POST['prix'];
    $description = $_POST['description'];
    $commentaire = $_POST['commentaire'];

    // Vérifier si un nouveau fichier image a été téléchargé
    if ($_FILES['image']['name']) {
        // Supprimer l'ancien fichier image
        unlink('images/' . $plat['image']);

        // Télécharger le nouveau fichier image
        $filename = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $filename);
    } else {
        // Conserver l'ancien fichier image
        $filename = $plat['image'];
    }

    // Mettre à jour les informations du plat dans la base de données
    $query = "UPDATE plats SET nom_plat = '$nom_plat', image = '$filename', prix = $prix, description = '$description', commentaire = '$commentaire' WHERE id = $id";
    mysqli_query($conn, $query);

    // Rediriger vers la page de liste des plats après la modification
    header('Location: boutique.php');
    exit();
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
<div class="container mt-5">
    <h1>Modifier un plat</h1>
        <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nom_plat">Nom du plat :</label>
            <input type="text" name="nom_plat" id="nom_plat" class="form-control" value="<?php echo $plat['nom_plat']; ?>" required>
        </div>
        <div class="form-group">
            <label for="image">Fichier image :</label>
            <input type="file" name="image" id="image" accept="image/jpeg,image/png" class="form-control-file">
            <img src="images/<?php echo $plat['image']; ?>" class="mt-2" width="200">
        </div>
        <div class="form-group">
            <label for="prix">Prix :</label>
            <input type="number" name="prix" id="prix" step="0.01" class="form-control" value="<?php echo $plat['prix']; ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description :</label>
            <textarea name="description" id="description" class="form-control" required><?php echo $plat['description']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="commentaire">Commentaire :</label>
            <textarea name="commentaire" id="commentaire" class="form-control"><?php echo $plat['commentaire']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
  </div>
 <!--========== FOOTER ==========-->
 <footer class="footer section bd-container">
            <div class="footer__container bd-grid">
                <div class="footer__content">
                    <a href="#" class="footer__logo">LivrEat</a>
                    <span class="footer__description">Restaurant</span>
                    <div>
                        <a href="#" class="footer__social"><i class='bx bxl-facebook'></i></a>
                        <a href="#" class="footer__social"><i class='bx bxl-instagram'></i></a>
                        <a href="#" class="footer__social"><i class='bx bxl-twitter'></i></a>
                    </div>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Services</h3>
                    <ul>
                        <li><a href="#" class="footer__link">Excellent</a></li>
                        <li><a href="#" class="footer__link">Fresh</a></li>
                        <li><a href="#" class="footer__link">Rapide</a></li>
                        <li><a href="#" class="footer__link">Commander un plat</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Information</h3>
                    <ul>
                        <li><a href="#" class="footer__link">Event</a></li>
                        <li><a href="#" class="footer__link">Contact us</a></li>
                        <li><a href="#" class="footer__link">Privacy policy</a></li>
                        <li><a href="#" class="footer__link">Terms of services</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Adress</h3>
                    <ul>
                        <li>Yaoundé - Cameroun</li>
                        <li>Bastos</li>
                        <li>690 80 70 58</li>
                        <li>livreat@email.com</li>
                    </ul>
                </div>
            </div>

            <p class="footer__copy">&#169; 2022 Coding Team. All right reserved</p>
        </footer>

        <!--========== SCROLL REVEAL ==========-->
        <script src="https://unpkg.com/scrollreveal"></script>

        <!--========== MAIN JS ==========-->
        <script src="assets/js/main.js"></script>
    </body>
</html>





