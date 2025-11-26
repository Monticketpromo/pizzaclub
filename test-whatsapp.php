<?php
/**
 * Test WhatsApp API - Diagnostic
 * Accéder via: http://votre-site.com/test-whatsapp.php
 */

// Charger la configuration
$config = require __DIR__ . '/whatsapp-config.php';

echo "<h1>🔍 Test WhatsApp Business API</h1>";

// Vérifier la configuration
echo "<h2>1. Configuration</h2>";
echo "<pre>";
echo "Phone Number ID: " . $config['phone_number_id'] . "\n";
echo "API Version: " . $config['api_version'] . "\n";
echo "Recipient: " . $config['recipient_number'] . "\n";
echo "Token: " . substr($config['access_token'], 0, 20) . "..." . substr($config['access_token'], -10) . "\n";
echo "</pre>";

// Test 1: Vérifier que le token est valide
echo "<h2>2. Test du token (GET request)</h2>";
$testUrl = "https://graph.facebook.com/{$config['api_version']}/{$config['phone_number_id']}";
$ch = curl_init($testUrl);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $config['access_token']
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);

echo "<pre>";
echo "HTTP Code: " . $httpCode . "\n";
if ($curlError) {
    echo "CURL Error: " . $curlError . "\n";
}
echo "Response: " . $response . "\n";
echo "</pre>";

if ($httpCode === 200) {
    echo "✅ <strong style='color: green;'>Token valide !</strong><br>";
} else {
    echo "❌ <strong style='color: red;'>Token invalide ou expiré</strong><br>";
    $errorData = json_decode($response, true);
    if (isset($errorData['error'])) {
        echo "<p style='color: red;'>Erreur: " . $errorData['error']['message'] . "</p>";
        echo "<p><strong>Solution:</strong> Génère un nouveau token sur Facebook Developers</p>";
    }
}

// Test 2: Envoyer un message de test
if ($httpCode === 200) {
    echo "<h2>3. Envoi d'un message de test</h2>";
    
    $messageUrl = "https://graph.facebook.com/{$config['api_version']}/{$config['phone_number_id']}/messages";
    $messageData = [
        'messaging_product' => 'whatsapp',
        'to' => $config['recipient_number'],
        'type' => 'text',
        'text' => [
            'body' => '🧪 Message de test - ' . date('d/m/Y H:i:s')
        ]
    ];
    
    $ch = curl_init($messageUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($messageData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $config['access_token'],
        'Content-Type: application/json'
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $msgResponse = curl_exec($ch);
    $msgHttpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $msgCurlError = curl_error($ch);
    curl_close($ch);
    
    echo "<pre>";
    echo "HTTP Code: " . $msgHttpCode . "\n";
    if ($msgCurlError) {
        echo "CURL Error: " . $msgCurlError . "\n";
    }
    echo "Response: " . $msgResponse . "\n";
    echo "</pre>";
    
    if ($msgHttpCode === 200) {
        echo "✅ <strong style='color: green;'>Message envoyé avec succès !</strong><br>";
        echo "<p>Vérifie WhatsApp sur le numéro {$config['recipient_number']}</p>";
    } else {
        echo "❌ <strong style='color: red;'>Échec de l'envoi</strong><br>";
        $errorData = json_decode($msgResponse, true);
        if (isset($errorData['error'])) {
            echo "<p style='color: red;'>Code: " . $errorData['error']['code'] . "</p>";
            echo "<p style='color: red;'>Message: " . $errorData['error']['message'] . "</p>";
            
            // Solutions courantes
            if ($errorData['error']['code'] == 131026) {
                echo "<p><strong>Solution:</strong> Le numéro destinataire doit être vérifié dans Meta Business Suite</p>";
            }
            if ($errorData['error']['code'] == 133) {
                echo "<p><strong>Solution:</strong> Le numéro n'est pas au bon format. Utilise le format international: 262xxxxxxxxx</p>";
            }
        }
    }
}

echo "<hr>";
echo "<h2>📋 Checklist</h2>";
echo "<ol>";
echo "<li>✓ Compte WhatsApp Business créé sur Meta Business Suite</li>";
echo "<li>✓ Numéro de téléphone vérifié et connecté</li>";
echo "<li>✓ Token d'accès généré (valide 24h pour token temporaire)</li>";
echo "<li>✓ Numéro destinataire ajouté aux \"Recipient Phone Numbers\" dans l'API Setup</li>";
echo "<li>✓ App en mode production (pas development)</li>";
echo "</ol>";

echo "<hr>";
echo "<p><small>Test effectué le " . date('d/m/Y à H:i:s') . "</small></p>";
?>
