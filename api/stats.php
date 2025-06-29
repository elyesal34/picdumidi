<?php
/**
 * API pour obtenir les statistiques du site
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

require_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['error' => 'Méthode non autorisée']);
    exit();
}

try {
    $stats = obtenir_statistiques();
    
    // Ajouter des statistiques supplémentaires
    $stats['php_version'] = phpversion();
    $stats['serveur'] = $_SERVER['SERVER_SOFTWARE'] ?? 'Inconnu';
    $stats['date_actuelle'] = date('Y-m-d H:i:s');
    $stats['fuseau_horaire'] = date_default_timezone_get();
    $stats['memoire_utilisee'] = memory_get_usage(true);
    $stats['memoire_pic'] = memory_get_peak_usage(true);
    
    echo json_encode([
        'success' => true,
        'data' => $stats
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Erreur lors de la récupération des statistiques'
    ]);
}
?>