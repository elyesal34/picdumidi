<?php
/**
 * API pour gérer les messages de contact
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Gérer les requêtes OPTIONS (CORS preflight)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

require_once '../config/database.php';
require_once '../includes/functions.php';

$database = new Database();
$db = $database->getConnection();

if (!$db) {
    http_response_code(500);
    echo json_encode(['error' => 'Erreur de connexion à la base de données']);
    exit();
}

// Créer les tables si elles n'existent pas
$database->createTables();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        // Récupérer tous les messages
        try {
            $query = "SELECT * FROM messages ORDER BY date_creation DESC";
            $stmt = $db->prepare($query);
            $stmt->execute();
            
            $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            echo json_encode([
                'success' => true,
                'data' => $messages,
                'total' => count($messages)
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Erreur lors de la récupération des messages']);
        }
        break;
        
    case 'POST':
        // Ajouter un nouveau message
        $input = json_decode(file_get_contents('php://input'), true);
        
        if (!$input) {
            $input = $_POST;
        }
        
        $nom = securiser_donnees($input['nom'] ?? '');
        $email = securiser_donnees($input['email'] ?? '');
        $sujet = securiser_donnees($input['sujet'] ?? '');
        $message = securiser_donnees($input['message'] ?? '');
        
        // Validation
        $erreurs = [];
        
        if (empty($nom)) {
            $erreurs[] = 'Le nom est requis';
        }
        
        if (empty($email) || !valider_email($email)) {
            $erreurs[] = 'Un email valide est requis';
        }
        
        if (empty($message)) {
            $erreurs[] = 'Le message est requis';
        }
        
        if (!empty($erreurs)) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'errors' => $erreurs
            ]);
            break;
        }
        
        try {
            $query = "INSERT INTO messages (nom, email, sujet, message) VALUES (?, ?, ?, ?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$nom, $email, $sujet, $message]);
            
            $message_id = $db->lastInsertId();
            
            echo json_encode([
                'success' => true,
                'message' => 'Message envoyé avec succès',
                'id' => $message_id
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'success' => false,
                'error' => 'Erreur lors de l\'envoi du message'
            ]);
        }
        break;
        
    default:
        http_response_code(405);
        echo json_encode(['error' => 'Méthode non autorisée']);
        break;
}
?>