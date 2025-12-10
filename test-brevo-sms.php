<?php
/**
 * TEST SMS BREVO
 * Upload ce fichier sur ton serveur et accède à : https://tonsite.com/test-brevo-sms.php
 */

// Afficher toutes les erreurs
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Test SMS Brevo</h1>";
echo "<hr>";

// 1. Vérifier si le fichier config existe
echo "<h2>1. Vérification fichier config</h2>";

// Chercher dans plusieurs emplacements
$configPaths = [
    __DIR__ . '/config/brevo-config.php',  // Dossier config (priorité)
    __DIR__ . '/brevo-config.php'          // Racine (fallback)
];

$configFound = false;
$configPath = '';

foreach ($configPaths as $path) {
    if (file_exists($path)) {
        echo "✅ Config trouvé: " . basename(dirname($path)) . "/" . basename($path) . "<br>";
        $brevoConfig = require $path;
        $configFound = true;
        $configPath = $path;
        break;
    }
}

if (!$configFound) {
    echo "❌ brevo-config.php INTROUVABLE dans :<br>";
    echo "- config/brevo-config.php<br>";
    echo "- brevo-config.php (racine)<br>";
    die("STOP: Upload brevo-config.php dans le dossier config/");
}

echo "✅ Config chargée depuis: $configPath<br>";
echo "Sender: " . $brevoConfig['sender_name'] . "<br>";
echo "Recipient: " . $brevoConfig['recipient_number'] . "<br>";
echo "API Key: " . substr($brevoConfig['api_key'], 0, 20) . "...<br>";

// 2. Vérifier CURL
echo "<h2>2. Vérification CURL</h2>";
if (function_exists('curl_init')) {
    echo "✅ CURL disponible<br>";
} else {
    echo "❌ CURL non disponible - contacte ton hébergeur<br>";
    die("STOP");
}

// 3. Tester l'API Brevo
echo "<h2>3. Test envoi SMS</h2>";

$brevoApiKey = $brevoConfig['api_key'];
$brevoSender = $brevoConfig['sender_name'];
$brevoRecipient = $brevoConfig['recipient_number'];
$brevoUrl = "https://api.brevo.com/v3/transactionalSMS/sms";

$smsMessage = "TEST SMS Pizza Club - " . date('H:i:s');

$brevoData = [
    'sender' => $brevoSender,
    'recipient' => $brevoRecipient,
    'content' => $smsMessage,
    'type' => 'transactional'
];

echo "Message: " . $smsMessage . "<br>";
echo "Données envoyées:<br><pre>" . json_encode($brevoData, JSON_PRETTY_PRINT) . "</pre>";

$ch = curl_init($brevoUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($brevoData));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'api-key: ' . $brevoApiKey,
    'Content-Type: application/json',
    'Accept: application/json'
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$brevoResponse = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);

echo "<h2>4. Résultat</h2>";
echo "HTTP Code: " . $httpCode . "<br>";

if ($curlError) {
    echo "❌ CURL Error: " . $curlError . "<br>";
}

if ($httpCode === 201 || $httpCode === 200) {
    echo "✅ <strong>SMS ENVOYÉ AVEC SUCCÈS !</strong><br>";
    echo "Vérifie ton téléphone<br>";
} else {
    echo "❌ <strong>ÉCHEC</strong><br>";
}

echo "<h3>Réponse Brevo:</h3>";
echo "<pre>" . htmlspecialchars($brevoResponse) . "</pre>";

// Décoder pour plus de détails
$responseData = json_decode($brevoResponse, true);
if ($responseData) {
    echo "<h3>Détails:</h3>";
    echo "<pre>" . print_r($responseData, true) . "</pre>";
    
    if (isset($responseData['message'])) {
        echo "<p><strong>Message:</strong> " . htmlspecialchars($responseData['message']) . "</p>";
    }
    
    if (isset($responseData['code'])) {
        echo "<p><strong>Code erreur:</strong> " . htmlspecialchars($responseData['code']) . "</p>";
    }
}

echo "<hr>";
echo "<h2>Actions si ça ne marche pas:</h2>";
echo "<ul>";
echo "<li>Vérifie sur <a href='https://app.brevo.com/sms/history' target='_blank'>https://app.brevo.com/sms/history</a></li>";
echo "<li>Vérifie tes crédits SMS sur Brevo</li>";
echo "<li>Vérifie que le numéro +262692630364 est au bon format</li>";
echo "<li>Vérifie que ton compte Brevo est vérifié (SMS activé)</li>";
echo "</ul>";
?>
