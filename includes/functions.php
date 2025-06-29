<?php
/**
 * Fonctions utilitaires pour le projet PHP
 */

/**
 * Sécuriser les données d'entrée
 */
function securiser_donnees($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * Valider une adresse email
 */
function valider_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * Générer un token CSRF
 */
function generer_token_csrf() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Vérifier le token CSRF
 */
function verifier_token_csrf($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Enregistrer une visite
 */
function enregistrer_visite($page) {
    require_once 'config/database.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    if ($db) {
        $query = "INSERT INTO visiteurs (ip_address, user_agent, page_visitee) VALUES (?, ?, ?)";
        $stmt = $db->prepare($query);
        
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'Inconnue';
        $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'Inconnu';
        
        $stmt->execute([$ip, $user_agent, $page]);
    }
}

/**
 * Obtenir les statistiques du site
 */
function obtenir_statistiques() {
    require_once 'config/database.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $stats = [
        'total_visites' => 0,
        'visites_aujourd_hui' => 0,
        'total_messages' => 0
    ];
    
    if ($db) {
        // Total des visites
        $query = "SELECT COUNT(*) as total FROM visiteurs";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stats['total_visites'] = $result['total'];
        
        // Visites d'aujourd'hui
        $query = "SELECT COUNT(*) as total FROM visiteurs WHERE DATE(date_visite) = CURDATE()";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stats['visites_aujourd_hui'] = $result['total'];
        
        // Total des messages
        $query = "SELECT COUNT(*) as total FROM messages";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stats['total_messages'] = $result['total'];
    }
    
    return $stats;
}

/**
 * Formater une date en français
 */
function formater_date($date, $format = 'd/m/Y H:i') {
    $mois = [
        1 => 'janvier', 2 => 'février', 3 => 'mars', 4 => 'avril',
        5 => 'mai', 6 => 'juin', 7 => 'juillet', 8 => 'août',
        9 => 'septembre', 10 => 'octobre', 11 => 'novembre', 12 => 'décembre'
    ];
    
    $jours = [
        1 => 'lundi', 2 => 'mardi', 3 => 'mercredi', 4 => 'jeudi',
        5 => 'vendredi', 6 => 'samedi', 0 => 'dimanche'
    ];
    
    $timestamp = is_string($date) ? strtotime($date) : $date;
    
    if ($format === 'complet') {
        $jour_semaine = $jours[date('w', $timestamp)];
        $jour = date('j', $timestamp);
        $mois_nom = $mois[date('n', $timestamp)];
        $annee = date('Y', $timestamp);
        $heure = date('H:i', $timestamp);
        
        return ucfirst($jour_semaine) . ' ' . $jour . ' ' . $mois_nom . ' ' . $annee . ' à ' . $heure;
    }
    
    return date($format, $timestamp);
}

/**
 * Générer un slug à partir d'une chaîne
 */
function generer_slug($texte) {
    $texte = strtolower($texte);
    $texte = preg_replace('/[^a-z0-9]+/', '-', $texte);
    $texte = trim($texte, '-');
    return $texte;
}

/**
 * Tronquer un texte
 */
function tronquer_texte($texte, $longueur = 100, $suffixe = '...') {
    if (strlen($texte) <= $longueur) {
        return $texte;
    }
    
    return substr($texte, 0, $longueur) . $suffixe;
}

/**
 * Obtenir l'adresse IP du visiteur
 */
function obtenir_ip_visiteur() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'] ?? 'Inconnue';
    }
}

/**
 * Vérifier si l'utilisateur est sur mobile
 */
function est_mobile() {
    return preg_match('/Mobile|Android|iPhone|iPad/', $_SERVER['HTTP_USER_AGENT'] ?? '');
}

/**
 * Générer une couleur aléatoire
 */
function couleur_aleatoire() {
    $couleurs = [
        '#ff6b6b', '#4ecdc4', '#45b7d1', '#96ceb4', '#feca57',
        '#ff9ff3', '#54a0ff', '#5f27cd', '#00d2d3', '#ff9f43',
        '#10ac84', '#ee5253', '#0abde3', '#3742fa', '#2f3542'
    ];
    
    return $couleurs[array_rand($couleurs)];
}

/**
 * Logger les erreurs
 */
function logger_erreur($message, $fichier = 'errors.log') {
    $timestamp = date('Y-m-d H:i:s');
    $log_message = "[$timestamp] $message" . PHP_EOL;
    file_put_contents($fichier, $log_message, FILE_APPEND | LOCK_EX);
}

/**
 * Rediriger vers une page
 */
function rediriger($url, $code = 302) {
    header("Location: $url", true, $code);
    exit();
}

/**
 * Vérifier si une requête est en AJAX
 */
function est_requete_ajax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
           strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}
?>