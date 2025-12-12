<?php
/**
 * TEST ENVOI EMAIL PHP mail()
 * Upload sur Hostinger et accède à : https://www.pizzaclub.re/test-email.php
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('Indian/Reunion');

echo "<h1>🧪 Test envoi email PHP mail()</h1>";
echo "<p>Date: " . date('d/m/Y H:i:s') . "</p>";
echo "<hr>";

// Test 1: Email simple texte
echo "<h2>1️⃣ Test email texte simple</h2>";

$to = "commande@pizzaclub.re"; // Ton email restaurant
$subject = "TEST Email - " . date('H:i:s');
$message = "Ceci est un test d'envoi email via mail() PHP\n";
$message .= "Date: " . date('d/m/Y H:i:s') . "\n";
$message .= "Serveur: " . $_SERVER['SERVER_NAME'];

$headers = "From: Pizza Club <commande@pizzaclub.re>\r\n";
$headers .= "Reply-To: commande@pizzaclub.re\r\n";

$result = mail($to, $subject, $message, $headers);

echo "Destinataire: <strong>" . htmlspecialchars($to) . "</strong><br>";
echo "Sujet: <strong>" . htmlspecialchars($subject) . "</strong><br>";
echo "Résultat mail(): " . ($result ? "<span style='color: green;'>✅ TRUE</span>" : "<span style='color: red;'>❌ FALSE</span>") . "<br>";

if (!$result) {
    echo "<p style='color: red;'><strong>⚠️ La fonction mail() a retourné FALSE</strong></p>";
    echo "<p>Causes possibles:</p>";
    echo "<ul>";
    echo "<li>mail() désactivée par l'hébergeur</li>";
    echo "<li>SPF/DKIM manquants pour le domaine</li>";
    echo "<li>Limite d'envoi atteinte</li>";
    echo "<li>Configuration PHP incorrecte</li>";
    echo "</ul>";
}

echo "<hr>";

// Test 2: Email HTML
echo "<h2>2️⃣ Test email HTML</h2>";

$htmlMessage = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
</head>
<body style='font-family: Arial, sans-serif;'>
    <h2 style='color: #FF0000;'>Test Email HTML</h2>
    <p>Si tu reçois cet email, l'envoi HTML fonctionne.</p>
    <p>Date: " . date('d/m/Y H:i:s') . "</p>
</body>
</html>
";

$htmlHeaders = "From: Pizza Club <commande@pizzaclub.re>\r\n";
$htmlHeaders .= "Reply-To: commande@pizzaclub.re\r\n";
$htmlHeaders .= "MIME-Version: 1.0\r\n";
$htmlHeaders .= "Content-Type: text/html; charset=UTF-8\r\n";

$htmlResult = mail($to, "TEST Email HTML - " . date('H:i:s'), $htmlMessage, $htmlHeaders);

echo "Résultat HTML: " . ($htmlResult ? "<span style='color: green;'>✅ TRUE</span>" : "<span style='color: red;'>❌ FALSE</span>") . "<br>";

echo "<hr>";

// Test 3: Vérifier configuration PHP
echo "<h2>3️⃣ Configuration PHP</h2>";

$sendmailPath = ini_get('sendmail_path');
echo "sendmail_path: <code>" . ($sendmailPath ?: '(non défini)') . "</code><br>";

$mailFunction = function_exists('mail');
echo "Fonction mail() disponible: " . ($mailFunction ? "<span style='color: green;'>✅ OUI</span>" : "<span style='color: red;'>❌ NON</span>") . "<br>";

$smtpConfig = ini_get('SMTP');
echo "SMTP: <code>" . ($smtpConfig ?: '(non défini)') . "</code><br>";

$smtpPort = ini_get('smtp_port');
echo "smtp_port: <code>" . ($smtpPort ?: '(non défini)') . "</code><br>";

echo "<hr>";

// Conclusion
echo "<h2>📊 Conclusion</h2>";

if ($result || $htmlResult) {
    echo "<p style='color: green; font-size: 18px;'><strong>✅ L'envoi email fonctionne !</strong></p>";
    echo "<p>Vérifie ta boîte mail (et les spams) à: <strong>" . htmlspecialchars($to) . "</strong></p>";
} else {
    echo "<p style='color: red; font-size: 18px;'><strong>❌ L'envoi email ne fonctionne PAS</strong></p>";
    echo "<p><strong>Solutions:</strong></p>";
    echo "<ol>";
    echo "<li>Contacte le support Hostinger pour activer mail()</li>";
    echo "<li>Vérifie les enregistrements DNS (SPF, DKIM) pour pizzaclub.re</li>";
    echo "<li>Utilise un service SMTP externe (Gmail, Brevo SMTP, etc.)</li>";
    echo "</ol>";
}
?>
