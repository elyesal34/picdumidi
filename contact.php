<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Mon Projet PHP</title>
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
                    <li><a href="contact.php" class="nav-link active">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <section class="page-header">
            <div class="container">
                <h1>Contactez-nous</h1>
                <p>N'hésitez pas à nous envoyer un message</p>
            </div>
        </section>

        <section class="contact-section">
            <div class="container">
                <?php
                $message = '';
                $messageType = '';
                
                if ($_POST) {
                    $nom = htmlspecialchars($_POST['nom'] ?? '');
                    $email = htmlspecialchars($_POST['email'] ?? '');
                    $sujet = htmlspecialchars($_POST['sujet'] ?? '');
                    $messageContent = htmlspecialchars($_POST['message'] ?? '');
                    
                    if (!empty($nom) && !empty($email) && !empty($messageContent)) {
                        // Ici, vous pourriez envoyer l'email ou sauvegarder en base de données
                        $message = "Merci $nom ! Votre message a été envoyé avec succès.";
                        $messageType = 'success';
                        
                        // Log du message (simulation)
                        $logEntry = date('Y-m-d H:i:s') . " - Message de $nom ($email): $messageContent\n";
                        file_put_contents('messages.log', $logEntry, FILE_APPEND | LOCK_EX);
                    } else {
                        $message = 'Veuillez remplir tous les champs obligatoires.';
                        $messageType = 'error';
                    }
                }
                ?>
                
                <?php if ($message): ?>
                    <div class="message <?php echo $messageType; ?>">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>

                <div class="contact-grid">
                    <div class="contact-form">
                        <h2>Formulaire de contact</h2>
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="nom">Nom *</label>
                                <input type="text" id="nom" name="nom" required 
                                       value="<?php echo htmlspecialchars($_POST['nom'] ?? ''); ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" id="email" name="email" required 
                                       value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="sujet">Sujet</label>
                                <input type="text" id="sujet" name="sujet" 
                                       value="<?php echo htmlspecialchars($_POST['sujet'] ?? ''); ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message" name="message" rows="5" required><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
                            </div>
                            
                            <button type="submit" class="btn-submit">Envoyer le message</button>
                        </form>
                    </div>

                    <div class="contact-info">
                        <h2>Informations de contact</h2>
                        <div class="info-list">
                            <div class="info-item">
                                <h3>Adresse</h3>
                                <p>123 Rue de la Programmation<br>75001 Paris, France</p>
                            </div>
                            
                            <div class="info-item">
                                <h3>Téléphone</h3>
                                <p>+33 1 23 45 67 89</p>
                            </div>
                            
                            <div class="info-item">
                                <h3>Email</h3>
                                <p>contact@monprojetphp.fr</p>
                            </div>
                            
                            <div class="info-item">
                                <h3>Horaires</h3>
                                <p>Lundi - Vendredi: 9h00 - 18h00<br>
                                   Samedi: 9h00 - 12h00</p>
                            </div>
                        </div>

                        <div class="server-time">
                            <h3>Heure du serveur</h3>
                            <p class="time-display"><?php echo date('d/m/Y H:i:s'); ?></p>
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