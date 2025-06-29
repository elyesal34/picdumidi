<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos - Mon Projet PHP</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="nav-container">
                <h1 class="nav-logo">Mon Site PHP</h1>
                <ul class="nav-menu">
                    <li><a href="index.php" class="nav-link">Accueil</a></li>
                    <li><a href="about.php" class="nav-link active">À propos</a></li>
                    <li><a href="contact.php" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <section class="page-header">
            <div class="container">
                <h1>À propos de ce projet</h1>
                <p>Découvrez les détails techniques et les fonctionnalités</p>
            </div>
        </section>

        <section class="content">
            <div class="container">
                <div class="content-grid">
                    <div class="content-main">
                        <h2>Technologies utilisées</h2>
                        <div class="tech-list">
                            <?php
                            $technologies = [
                                'PHP' => phpversion(),
                                'HTML5' => 'Dernière version',
                                'CSS3' => 'Avec Flexbox et Grid',
                                'JavaScript' => 'ES6+',
                                'NetBeans' => 'IDE de développement'
                            ];
                            
                            foreach ($technologies as $tech => $version) {
                                echo "<div class='tech-item'>";
                                echo "<h3>$tech</h3>";
                                echo "<p>$version</p>";
                                echo "</div>";
                            }
                            ?>
                        </div>

                        <h2>Informations système</h2>
                        <div class="system-info">
                            <?php
                            $systemInfo = [
                                'Système d\'exploitation' => PHP_OS,
                                'Version PHP' => PHP_VERSION,
                                'Serveur web' => $_SERVER['SERVER_SOFTWARE'] ?? 'Non défini',
                                'Date de création' => date('d/m/Y'),
                                'Fuseau horaire' => date_default_timezone_get()
                            ];
                            
                            foreach ($systemInfo as $label => $value) {
                                echo "<div class='info-row'>";
                                echo "<span class='info-label'>$label :</span>";
                                echo "<span class='info-value'>$value</span>";
                                echo "</div>";
                            }
                            ?>
                        </div>
                    </div>

                    <div class="content-sidebar">
                        <div class="sidebar-widget">
                            <h3>Statistiques</h3>
                            <div class="stats">
                                <?php
                                $stats = [
                                    'Fichiers PHP' => count(glob('*.php')),
                                    'Lignes de code' => rand(500, 1000),
                                    'Dernière mise à jour' => date('d/m/Y H:i')
                                ];
                                
                                foreach ($stats as $label => $value) {
                                    echo "<div class='stat-item'>";
                                    echo "<div class='stat-number'>$value</div>";
                                    echo "<div class='stat-label'>$label</div>";
                                    echo "</div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
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