<?php
//verifier si le formulaire à ete soumis
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Connexion à la base de données
    $pdo = new PDO('mysql:host=localhost;dbname=restaurant','root', '');
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $mot_de_passe = $_POST['mot_de_passe'];
    // Requête pour récupérer l'ID de l'admin en fonction du nom  et du mot de passe
    $stmt = $pdo->prepare('SELECT id FROM administrateurs WHERE nom = :nom AND mot_de_passe = :mot_de_passe');
    $stmt->execute(['nom' => $nom, 'mot_de_passe' => $mot_de_passe]);
    $user = $stmt->fetch();
    // Vérification si l'utilisateur a été trouvé
    if ($user) {
    // Démarrage de la session
    session_start();
    // Enregistrement de l'ID de l'utilisateur dans une variable de session
    $_SESSION['id'] = $user['id'];
    // Redirection vers la page d'accueil
    header('Location: boutique.php');
    exit;
    } else {
    // Si l'utilisateur n'est pas trouvé, retourner à la page de connexion avec un message d'erreur
    header('Location: login.php?error=1');
    exit;
    }
}

?>









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
                        <li class="nav__item"><a href="index.html#home" class="nav__link active-link">Acceuil</a></li>
                        <li class="nav__item"><a href="index.html#about" class="nav__link">A propos</a></li>
                        <li class="nav__item"><a href="index.html#menu" class="nav__link">Menu</a></li>
                        <li class="nav__item"><a href="index.html#contact" class="nav__link">Contact</a></li>
                        <li class="nav__item"><a href="login.html" class="nav__link">Connexion</a></li>


                        <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                    </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-menu'></i>
                </div>
            </nav>
        </header>
        <main class="l-main">
            <section class="login">
                <!--formulaire de connexion-->
                <form    method="post">
                    <h2 class="second-title">Connexion</h2>
                        <?php if(isset($error)): ?>
                        <p><?php echo $error; ?></p>
                        <?php endif; ?>
                    <label for="nom">Nom : </label>
                    <input type="text" name="nom" id="nom" required><br>
                    <label for="mot_de_passe">Mot de passe: </label>
                    <input type="password" name="mot_de_passe" id="mot_de_passe" required> <br>
                    <button type="submit">Se connecter</button>
                </form>

            </section>

        </main>   
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
                        <li><a href="menu.html" class="footer__link">Commander un plat</a></li>
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
