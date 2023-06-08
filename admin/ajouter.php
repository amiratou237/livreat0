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
                <?php
                    session_start(); // Démarrage de la session

                    // Vérification de la connexion de l'utilisateur
                    if (!isset($_SESSION['id'])) {
                    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
                    header('Location: login.php');
                    exit();
                    }

                    // Connexion à la base de données
                    $pdo = new PDO('mysql:host=localhost;dbname=restaurant', 'root', '');

                    // Traitement du formulaire d'ajout de plat
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Vérification des champs obligatoires
                    if (!isset($_POST['nom_plat']) || !isset($_FILES['image']) || !isset($_POST['prix']) || !isset($_POST['description'])) {
                        echo '<div class="alert alert-danger">Veuillez remplir tous les champs obligatoires.</div>';
                    } else {
                        // Vérification de la validité du fichier image
                        $allowed_types = ['jpg', 'jpeg', 'png'];
                        $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                        if (!in_array($extension, $allowed_types)) {
                        echo '<div class="alert alert-danger">Le fichier image doit être au format JPG, JPEG ou PNG.</div>';
                        } else {
                        // Insertion du nouveau plat dans la base de données
                        $stmt = $pdo->prepare('INSERT INTO plats (nom_plat, image, prix, description, commentaire) VALUES (?, ?, ?, ?, ?)');
                        $stmt->execute([$_POST['nom_plat'], $_FILES['image']['name'], $_POST['prix'], $_POST['description'], $_POST['commentaire']]);
                        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                            // Déplacement du fichier téléchargé vers le dossier "images"
                            $filename = $_FILES['image']['name'];
                            $path = 'images/' . $filename;
                            move_uploaded_file($_FILES['image']['tmp_name'], $path);
                        } else {
                            // Le fichier n'a pas été téléchargé avec succès
                            $path = '';
                        }
                        
                        // Enregistrement du fichier image dans le dossier "images"
                        move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $_FILES['image']['name']);
                        
                        echo '<div class="alert alert-success">Le plat a été ajouté avec succès !</div>';
                        }
                    }
                    }
                ?>
                

  <div class="container mt-5">
    <h1>Ajouter un plat</h1>
        <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nom_plat">Nom du plat :</label>
            <input type="text" name="nom_plat" id="nom_plat" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Fichier image :</label>
            <input type="file" name="image" id="image" accept="image/jpeg,image/png" class="form-control-file" required>
        </div>
        <div class="form-group">
            <label for="prix">Prix :</label>
            <input type="number" name="prix" id="prix" step="0.01" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description :</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="commentaire">Commentaire :</label>
            <textarea name="commentaire" id="commentaire" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
  </div>



                
            </section>

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









