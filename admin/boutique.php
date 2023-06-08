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
                    session_start(); // Démarrage de la session

                    // Vérification de la connexion de l'utilisateur
                    if (!isset($_SESSION['id'])) {
                    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
                    header('Location: login.php');
                    exit();
                    }
                    // Connexion à la base de données
                    $pdo = new PDO('mysql:host=localhost;dbname=restaurant', 'root', '');

                    // Récupération des plats de la base de données
                    $plats = $pdo->query('SELECT * FROM plats')->fetchAll();

                    // Affichage des plats sous forme de table Bootstrap
                    echo '<table class="table">';
                    echo '<thead><tr><th>ID</th><th>Nom du plat</th><th>Image</th><th>Description</th><th>Prix</th><th>Commentaire</th><th>Actions</th></tr></thead>';
                    echo '<tbody>';
                    foreach ($plats as $plat) {
                    echo '<tr>';
                    echo '<td>' . $plat['id'] . '</td>';
                    echo '<td>' . $plat['nom_plat'] . '</td>';
                    echo '<td><img src="images/' . $plat['image'] . '" width="100"></td>';
                    echo '<td>' . $plat['description'] . '</td>';
                    echo '<td>' . $plat['prix'] . ' F</td>';
                    echo '<td>' . $plat['commentaire'] . '</td>';
                    echo '<td>';
                    echo '<a href="modifier.php?id=' . $plat['id'] . '" class="btn btn-primary">Modifier</a> ';
                    echo '<a href="supprimer.php?id=' . $plat['id'] . '" class="btn btn-danger">Supprimer</a>';
                    echo '</td>';
                    echo '</tr>';
                    }
                    echo '</tbody>';
                    echo '</table>';
                    

                    // Bouton "Ajouter" en bas de la table
                    echo '<a href="ajouter.php" class="btn btn-success">Ajouter</a>';
                    ?>

                
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





