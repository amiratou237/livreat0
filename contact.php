<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- swiper css link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- cusom css file link  -->
    <link rel="stylesheet" href="assets/css/styles.css">

</head>
<body>
    
<!-- header section starts  -->

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

<!-- header section ends -->


<!-- contact info section starts  -->

<section class="info-container">

    <div class="box-container">

        <div class="box">
            <i class="fas fa-map"></i>
            <h3>Adresse</h3>
            <p>Yaoundé-cameroun</p>
        </div>

        <div class="box">
            <i class="fas fa-envelope"></i>
            <h3>Email</h3>
            <p>livreat@gmail.com</p>
        </div>

        <div class="box">
            <i class="fas fa-phone"></i>
            <h3>Numéro</h3>
            <p>+237 691 28 25 45</p>
        </div>

    </div>

</section>

<!-- contact info section ends -->

<!-- contact section starts  -->

<section class="contact">

    <form action="">
        <h3>Envoyez nous un message</h3>
        <div class="inputBox">
            <input type="text" placeholder="Nom">
            <input type="email" placeholder="Email">
        </div>
        <div class="inputBox">
            <input type="number" placeholder="Numéro">
            <input type="text" placeholder="Objet">
        </div>
        <textarea name="" placeholder="Message" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="Envoyez le message" class="btn">
    </form>


</section>

<!-- contact section ends -->



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




<!-- swiper js link      -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
        <!--========== SCROLL REVEAL ==========-->
        <script src="https://unpkg.com/scrollreveal"></script>

        <!--========== MAIN JS ==========-->
        <script src="assets/js/main.js"></script>

</body>
</html>
