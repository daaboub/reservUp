<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateforme de Réservation des Salles</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <style>
        /* Custom Styles */
        .hero-image {
            background-image: url('https://via.placeholder.com/1500x600/87CEEB/FFFFFF?text=Plateforme+R%C3%A9servation+Salles');
            background-size: cover;
            background-position: center;
            height: 600px;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .navbar {
            background-color: #343a40;
        }

        .navbar .navbar-brand, .navbar .nav-link {
            color: #fff !important;
        }

        .navbar .nav-link:hover {
            color: #FFD700 !important;
        }

        .service-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            background-color: #fff;
        }

        .service-card img {
            max-height: 200px;
            object-fit: cover;
            width: 100%;
            border-radius: 8px;
        }

        .service-card h3 {
            margin-top: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .section-title {
            margin-top: 50px;
            margin-bottom: 30px;
            font-weight: bold;
            text-align: center;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }

        .hero-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .hero-text h1 {
            font-size: 3rem;
            font-weight: 700;
        }

        .hero-text p {
            font-size: 1.5rem;
        }


        /* Cardes de témoignages */
.testimonial-card {
    background-color: #f8f9fa;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
}

.testimonial-card:hover {
    transform: translateY(-10px);
}

/* Image de témoignage */
.testimonial-img {
    border-radius: 50%;
    width: 120px;
    height: 120px;
    object-fit: cover;
    margin-bottom: 15px;
}

/* Position et style du nom */
.testimonial-position {
    font-size: 14px;
    color: #888;
    margin-bottom: 10px;
}

/* Texte des témoignages */
.testimonial-card p {
    font-size: 16px;
    color: #333;
    font-style: italic;
    line-height: 1.5;
}

    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Plateforme de Réservation des Salles</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Nos Salles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">À Propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Se Connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">S'inscrire</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-image d-flex justify-content-center align-items-center text-white">
        <div class="hero-text">
            <h1>Bienvenue sur la Plateforme de Réservation des Salles</h1>
            <p>Accédez facilement à nos salles modernes et équipées pour vos réunions internes et événements.</p>
        </div>
    </div>

    <!-- Services Section -->
    <div class="container mt-5" id="services">
        <h2 class="section-title">Nos Salles à Louer</h2>
        <div class="row">

            <!-- Salle 1 -->
            <div class="col-md-4">
                <div class="service-card">
                    <img src="https://via.placeholder.com/500x300/87CEEB/FFFFFF?text=Salle+de+R%C3%A9union" alt="Salle de Réunion">
                    <h3>Salle de Réunion</h3>
                    <p>Conçue pour des réunions d'affaires productives avec une capacité de 10 à 20 personnes.</p>
                    <a href="#" class="btn btn-primary">Réserver Maintenant</a>
                </div>
            </div>

            <!-- Salle 2 -->
            <div class="col-md-4">
                <div class="service-card">
                    <img src="https://via.placeholder.com/500x300/FFD700/FFFFFF?text=Salle+de+Conf%C3%A9rence" alt="Salle de Conférence">
                    <h3>Salle de Conférence</h3>
                    <p>Idéale pour les événements plus grands avec une capacité de 50 à 100 personnes.</p>
                    <a href="#" class="btn btn-primary">Réserver Maintenant</a>
                </div>
            </div>

            <!-- Salle 3 -->
            <div class="col-md-4">
                <div class="service-card">
                    <img src="https://via.placeholder.com/500x300/32CD32/FFFFFF?text=Salle+de+Formation" alt="Salle de Formation">
                    <h3>Salle de Formation</h3>
                    <p>Pour des sessions de formation en groupe, avec tout le nécessaire pour une expérience interactive.</p>
                    <a href="#" class="btn btn-primary">Réserver Maintenant</a>
                </div>
            </div>

        </div>
    </div>

    <!-- À Propos Section -->
<!-- Pourquoi Utiliser Notre Plateforme ? -->
<div class="container mt-5" id="about">
    <h2 class="section-title">Pourquoi Choisir Notre Plateforme ?</h2>
    <div class="row">

        <!-- Avantage 1 -->
        <div class="col-md-4">
            <div class="service-card">
                <h4><i class="fa fa-calendar-check"></i> Réservation Simple et Instantanée</h4>
                <p>Notre plateforme vous permet de réserver une salle en quelques clics, 24h/24 et 7j/7, selon votre disponibilité. Plus besoin de longs échanges pour trouver une plage horaire, tout se fait en ligne de manière intuitive.</p>
            </div>
        </div>

        <!-- Avantage 2 -->
        <div class="col-md-4">
            <div class="service-card">
                <h4><i class="fa fa-users"></i> Exclusivement pour le Personnel de l'Organisation</h4>
                <p>Accédez à la plateforme en tant que membre de notre organisation, avec un accès sécurisé et personnalisé. Nous vous offrons un environnement privé pour une gestion optimale des réservations et des ressources internes.</p>
            </div>
        </div>

        <!-- Avantage 3 -->
        <div class="col-md-4">
            <div class="service-card">
                <h4><i class="fa fa-video-camera"></i> Salles Équipées pour Vos Réunions et Événements</h4>
                <p>Nos salles sont dotées de matériel de pointe (projecteurs, écrans, microphones) pour garantir la réussite de vos réunions, formations ou conférences. Un cadre optimal pour un environnement de travail productif et moderne.</p>
            </div>
        </div>

        <!-- Avantage 4 -->
        <div class="col-md-4">
            <div class="service-card">
                <h4><i class="fa fa-cogs"></i> Gestion Facile des Réservations</h4>
                <p>Suivez et gérez facilement toutes vos réservations en ligne. Modifiez, annulez ou reprogrammez vos réservations directement depuis la plateforme, sans contraintes administratives.</p>
            </div>
        </div>

        <!-- Avantage 5 -->
        <div class="col-md-4">
            <div class="service-card">
                <h4><i class="fa fa-trophy"></i> Optimisation des Espaces de Travail</h4>
                <p>Notre plateforme permet une gestion optimale des espaces, afin d'éviter la double réservation et de maximiser l'utilisation de chaque salle. Cela garantit un environnement de travail bien organisé et sans conflits.</p>
            </div>
        </div>

        <!-- Avantage 6 -->
        <div class="col-md-4">
            <div class="service-card">
                <h4><i class="fa fa-shield-alt"></i> Sécurité et Confidentialité</h4>
                <p>Toutes vos données et réservations sont traitées en toute sécurité grâce à nos protocoles de confidentialité. Votre vie privée et la sécurité des informations de votre organisation sont notre priorité.</p>
            </div>
        </div>

    </div>
</div>


<!-- Témoignages et Avis -->
<div class="container mt-5" id="testimonials">
    <h2 class="section-title text-center">Ce Que Disent Nos Utilisateurs</h2>
    <div class="row">
        <!-- Témoignage 1 -->
        <div class="col-md-4">
            <div class="testimonial-card">
                <img src="https://via.placeholder.com/150" alt="User 1" class="testimonial-img">
                <h4>Ahmed Ben Ali</h4>
                <p class="testimonial-position">Responsable des Ressources Humaines</p>
                <p>"Grâce à cette plateforme, la gestion des réservations de salles est devenue un jeu d'enfant. Elle est rapide, simple à utiliser, et extrêmement pratique pour notre équipe."</p>
            </div>
        </div>

        <!-- Témoignage 2 -->
        <div class="col-md-4">
            <div class="testimonial-card">
                <img src="https://via.placeholder.com/150" alt="User 2" class="testimonial-img">
                <h4>Salma Idrissi</h4>
                <p class="testimonial-position">Responsable Marketing</p>
                <p>"Nous avons gagné un temps considérable dans l'organisation de nos réunions. La plateforme nous permet de gérer les salles efficacement et de planifier à l'avance. Une solution indispensable !" </p>
            </div>
        </div>

        <!-- Témoignage 3 -->
        <div class="col-md-4">
            <div class="testimonial-card">
                <img src="https://via.placeholder.com/150" alt="User 3" class="testimonial-img">
                <h4>Youssef El Ghazali</h4>
                <p class="testimonial-position">Chef de Projet</p>
                <p>"La facilité d'utilisation et l'interface intuitive font de cette plateforme un outil essentiel pour notre organisation. Nous pouvons nous concentrer sur nos tâches sans nous soucier de la logistique des salles."</p>
            </div>
        </div>
    </div>
</div>


    <!-- Footer -->
    <div class="footer mt-5">
        <p>&copy; 2025 ReservUp. Tous droits réservés.</p>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
