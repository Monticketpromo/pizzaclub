<?php
/**
 * API pour vérifier si le restaurant est fermé
 * Utilisé par le formulaire de commande pour bloquer les commandes si nécessaire
 * Peut être inclus comme module (require_once) ou appelé directement comme API
 */

// Ne définir JSON_FILE que s'il n'est pas déjà défini
if (!defined('JSON_FILE')) {
    define('JSON_FILE', __DIR__ . '/unavailability.json');
}

function isRestaurantClosed() {
    if (!file_exists(JSON_FILE)) {
        return [
            'isClosed' => false,
            'reason' => null
        ];
    }
    
    $data = json_decode(file_get_contents(JSON_FILE), true);
    
    if (!isset($data['closures'])) {
        return [
            'isClosed' => false,
            'reason' => null
        ];
    }
    
    $now = new DateTime();
    $today = $now->format('Y-m-d');
    $currentTime = $now->format('H:i:s');
    $dayOfWeek = (int)$now->format('N'); // 1 = Lundi, 7 = Dimanche
    
    // ========================================
    // JOURS DE FERMETURE RÉGULIERS
    // ========================================
    // Lundi = jour de fermeture (N = 1)
    if ($dayOfWeek === 1) {
        return [
            'isClosed' => true,
            'reason' => 'Jour de fermeture hebdomadaire',
            'type' => 'weekly',
            'message' => '🔒 Restaurant fermé le lundi. Réouverture mardi !'
        ];
    }
    
    // Vérifier la fermeture d'urgence
    if (isset($data['closures']['emergency']) && $data['closures']['emergency'] !== null) {
        $emergency = $data['closures']['emergency'];
        $emergencyDate = $emergency['date'];
        
        // Si la fermeture d'urgence est pour aujourd'hui
        if ($emergencyDate === $today) {
            return [
                'isClosed' => true,
                'reason' => $emergency['reason'],
                'type' => 'emergency',
                'message' => '🚨 Restaurant fermé : ' . $emergency['reason']
            ];
        }
    }
    
    // Vérifier les fermetures programmées
    if (isset($data['closures']['scheduled']) && is_array($data['closures']['scheduled'])) {
        foreach ($data['closures']['scheduled'] as $closure) {
            if ($closure['date'] === $today) {
                // Si c'est une fermeture toute la journée
                if ($closure['fullDay']) {
                    return [
                        'isClosed' => true,
                        'reason' => $closure['reason'],
                        'type' => 'scheduled',
                        'fullDay' => true,
                        'message' => '🔒 Restaurant fermé aujourd\'hui : ' . $closure['reason']
                    ];
                }
                
                // Si c'est une fermeture partielle, vérifier les horaires
                $startTime = $closure['startTime'] ?? '00:00:00';
                $endTime = $closure['endTime'] ?? '23:59:59';
                
                if ($currentTime >= $startTime && $currentTime <= $endTime) {
                    return [
                        'isClosed' => true,
                        'reason' => $closure['reason'],
                        'type' => 'scheduled',
                        'fullDay' => false,
                        'startTime' => $startTime,
                        'endTime' => $endTime,
                        'message' => '🔒 Restaurant fermé : ' . $closure['reason'] . ' (jusqu\'à ' . substr($endTime, 0, 5) . ')'
                    ];
                }
            }
        }
    }
    
    return [
        'isClosed' => false,
        'reason' => null
    ];
}

// Si appelé directement comme API (pas inclus comme module)
// Vérifier si on est dans un contexte d'appel direct
if (basename($_SERVER['SCRIPT_FILENAME']) === 'check-closure.php') {
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    
    $status = isRestaurantClosed();
    echo json_encode($status);
}
