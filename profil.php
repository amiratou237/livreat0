<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--========== BOX ICONS ==========-->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="assets/css/styles.css">

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
                    <li class="nav__item"><a href="index.php" class="nav__link active-link">Acceuil</a></li>
                        <li class="nav__item"><a href="menu.php" class="nav__link active-link">Menu</a></li>
                        <li class="nav__item"><a href="panier.php" class="nav__link active-link">Panier</a></li>
                        <li class="nav__item"><a href="contact.php" class="nav__link active-link">Contact</a></li>
                        <li class="nav__item"><a href="profil.php" class="nav__link">Profil</a></li>
                        <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
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
                <!-- <div class="profil" style="
                        padding:3em;
                        border: 1px solid #707070;
                        display: flex;
                        align-content: center;
                                            ">
                    <div class="infomation">
                        <ul>
                            <li>Votre NOM :</li>
                            <li>Votre TELEPHONE :</li>
                            <li>Votre Email :</li>
                            <li>Votre Adresse de Livraison :</li>
                        </ul>
                    </div>
                    <div class="info2">
                        <ul>
                            <li>amir</li>
                            <li>691534023</li>
                            <li>amir@gmail.com</li>
                            <li>nkolbisson</li>
                        </ul>
                    </div>
                </div> -->
                <?php
                    session_start();
                    // Vérifier si l'utilisateur est connecté
                    if(isset($_SESSION['id'])) {
                    // Récupérer les informations de l'utilisateur depuis la base de données
                    $id = $_SESSION['id'];
                    // Connexion à la base de données
                    $pdo = new PDO('mysql:host=localhost;dbname=restaurant',
                    'root', '');
                    // Préparation de la requête SQL
                    $stmt = $pdo->prepare('SELECT nom, telephone, email, adresse, nom_utilisateur FROM utilisateur WHERE id
                    = :id');
                    $stmt->execute(['id' => $id]);
                    // Récupération des résultats
                    $user = $stmt->fetch();
                    // Afficher les informations de l'utilisateur
                    echo 'Nom: ' . $user['nom'] . '<br>';
                    echo 'Adresse: ' . $user['adresse'] . '<br>';
                    echo 'Téléphone: ' . $user['telephone'] . '<br>';
                    echo 'email: ' . $user['email'] . '<br>';
                    } else {
                    // Rediriger l'utilisateur vers la page de connexion
                    header('Location: login.html');
                    exit;
                    }
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
