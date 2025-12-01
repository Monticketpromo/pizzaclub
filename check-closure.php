<?php
/**
 * API pour vérifier si le restaurant est fermé
 * Utilisé par le formulaire de commande pour bloquer les commandes si nécessaire
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

define('JSON_FILE', __DIR__ . '/unavailability.json');

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

// Retourner le statut
$status = isRestaurantClosed();
echo json_encode($status);
