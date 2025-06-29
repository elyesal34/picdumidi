<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Projet PHP</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="nav-container">
                <h1 class="nav-logo">Mon Site PHP</h1>
                <ul class="nav-menu">
                    <li><a href="index.php" class="nav-link">Accueil</a></li>
                    <li><a href="about.php" class="nav-link">À propos</a></li>
                    <li><a href="contact.php" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Bienvenue sur mon site PHP</h1>
                <p>Un projet PHP moderne et fonctionnel</p>
                <div class="hero-stats">
                    <div class="stat">
                        <h3><?php echo date('Y'); ?></h3>
                        <p>Année actuelle</p>
                    </div>
                    <div class="stat">
                        <h3><?php echo date('H:i'); ?></h3>
                        <p>Heure actuelle</p>
                    </div>
                    <div class="stat">
                        <h3><?php echo phpversion(); ?></h3>
                        <p>Version PHP</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="features">
            <div class="container">
                <h2>Fonctionnalités</h2>
                <div class="features-grid">
                    <div class="feature-card">
                        <h3>PHP Moderne</h3>
                        <p>Utilise PHP 8.3 avec les dernières fonctionnalités</p>
                    </div>
                    <div class="feature-card">
                        <h3>Design Responsive</h3>
                        <p>Interface adaptée à tous les écrans</p>
                    </div>
                    <div class="feature-card">
                        <h3>Structure Modulaire</h3>
                        <p>Code organisé et maintenable</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="demo">
            <div class="container">
                <h2>Démonstration PHP</h2>
                <div class="demo-content">
                    <?php
                    // Démonstration de fonctionnalités PHP
                    $fruits = ['Pomme', 'Banane', 'Orange', 'Fraise', 'Kiwi'];
                    $colors = ['#ff6b6b', '#4ecdc4', '#45b7d1', '#96ceb4', '#feca57'];
                    
                    echo "<h3>Liste de fruits dynamique :</h3>";
                    echo "<div class='fruit-list'>";
                    foreach ($fruits as $index => $fruit) {
                        $color = $colors[$index % count($colors)];
                        echo "<span class='fruit-tag' style='background-color: $color'>$fruit</span>";
                    }
                    echo "</div>";
                    
                    // Calcul simple
                    $nombre1 = 15;
                    $nombre2 = 25;
                    $resultat = $nombre1 + $nombre2;
                    
                    echo "<div class='calculation'>";
                    echo "<h3>Calcul dynamique :</h3>";
                    echo "<p>$nombre1 + $nombre2 = <strong>$resultat</strong></p>";
                    echo "</div>";
                    ?>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Mon Projet PHP. Tous droits réservés.</p>
        </div>
    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>