<?php
/**
 * VISUALISEUR DE COMMANDES
 * Affiche toutes les commandes enregistrées
 * URL: https://www.pizzaclub.re/orders-log.php?key=pizzaclub2024
 */

// Sécurité - nécessite une clé d'accès
$ACCESS_KEY = 'pizzaclub2024'; // Change cette clé !

if (!isset($_GET['key']) || $_GET['key'] !== $ACCESS_KEY) {
    http_response_code(403);
    die('Accès interdit');
}

date_default_timezone_set('Indian/Reunion');

// Lire le fichier de commandes
$ordersFile = __DIR__ . '/orders.json';
$debugFile = __DIR__ . '/debug-order.txt';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📋 Commandes Pizza Club</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: Arial, sans-serif; 
            background: #f5f5f5; 
            padding: 20px;
        }
        .container { 
            max-width: 1200px; 
            margin: 0 auto; 
            background: white; 
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 { 
            color: #FF0000; 
            margin-bottom: 30px;
            text-align: center;
        }
        .order { 
            border: 2px solid #e0e0e0; 
            padding: 20px; 
            margin: 20px 0;
            border-radius: 8px;
            background: #fafafa;
        }
        .order-header { 
            background: #FF0000; 
            color: white; 
            padding: 15px;
            margin: -20px -20px 15px -20px;
            border-radius: 6px 6px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .order-number { font-size: 20px; font-weight: bold; }
        .order-date { font-size: 14px; opacity: 0.9; }
        .customer-info { 
            background: #fff3cd; 
            padding: 15px; 
            border-left: 4px solid #ffc107;
            margin: 15px 0;
        }
        .customer-info strong { color: #000; }
        .items-list { 
            background: white; 
            padding: 15px;
            border: 1px solid #e0e0e0;
            margin: 15px 0;
        }
        .item { 
            padding: 10px; 
            border-bottom: 1px solid #f0f0f0;
            margin: 5px 0;
        }
        .item:last-child { border-bottom: none; }
        .item-name { 
            font-weight: bold; 
            color: #FF0000;
            font-size: 16px;
        }
        .item-details { 
            color: #666; 
            font-size: 14px;
            margin: 5px 0 5px 20px;
        }
        .total { 
            background: #28a745; 
            color: white; 
            padding: 15px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            border-radius: 5px;
            margin: 15px 0;
        }
        .mode-badge { 
            display: inline-block;
            padding: 5px 15px;
            background: #FFC107;
            color: #000;
            border-radius: 20px;
            font-weight: bold;
            font-size: 14px;
        }
        .no-orders { 
            text-align: center; 
            padding: 50px; 
            color: #999;
            font-size: 18px;
        }
        .debug-section { 
            margin-top: 50px; 
            padding-top: 30px; 
            border-top: 3px solid #e0e0e0;
        }
        .debug-content { 
            background: #2d2d2d; 
            color: #0f0; 
            padding: 20px;
            border-radius: 5px;
            font-family: 'Courier New', monospace;
            font-size: 12px;
            overflow-x: auto;
            white-space: pre-wrap;
            max-height: 500px;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📋 Historique des commandes Pizza Club</h1>
        
        <?php
        // Afficher les commandes du fichier JSON
        if (file_exists($ordersFile)) {
            $ordersJson = file_get_contents($ordersFile);
            $orders = json_decode($ordersJson, true);
            
            if ($orders && count($orders) > 0) {
                // Trier par date décroissante (plus récentes en premier)
                usort($orders, function($a, $b) {
                    return strtotime($b['timestamp']) - strtotime($a['timestamp']);
                });
                
                foreach ($orders as $order) {
                    $customer = $order['customer'];
                    $deliveryMode = $customer['deliveryMode'] === 'livraison' ? '🛵 LIVRAISON' : '🏃 À EMPORTER';
                    ?>
                    <div class="order">
                        <div class="order-header">
                            <span class="order-number"><?= htmlspecialchars($order['orderNumber']) ?></span>
                            <span class="order-date"><?= date('d/m/Y à H:i', strtotime($order['timestamp'])) ?></span>
                        </div>
                        
                        <span class="mode-badge"><?= $deliveryMode ?></span>
                        
                        <div class="customer-info">
                            <strong>Client:</strong> <?= htmlspecialchars($customer['firstName']) ?> <?= htmlspecialchars($customer['lastName']) ?><br>
                            <strong>Téléphone:</strong> <?= htmlspecialchars($customer['phone']) ?><br>
                            <?php if (!empty($customer['email'])): ?>
                                <strong>Email:</strong> <?= htmlspecialchars($customer['email']) ?><br>
                            <?php endif; ?>
                            <?php if ($customer['deliveryMode'] === 'livraison'): ?>
                                <strong>Adresse:</strong> <?= htmlspecialchars($customer['address']) ?>, <?= htmlspecialchars($customer['postalCode']) ?> <?= htmlspecialchars($customer['city']) ?>
                            <?php endif; ?>
                        </div>
                        
                        <div class="items-list">
                            <h3 style="margin-bottom: 15px; color: #FF0000;">📦 Articles commandés</h3>
                            <?php foreach ($order['items'] as $item): ?>
                                <div class="item">
                                    <div class="item-name">
                                        <?= htmlspecialchars($item['name']) ?> x<?= $item['quantity'] ?>
                                    </div>
                                    <?php if (isset($item['customization']) && !empty($item['customization'])): ?>
                                        <div class="item-details">
                                            <?php
                                            $custom = $item['customization'];
                                            if (!empty($custom['size'])) {
                                                echo "📏 Taille: " . htmlspecialchars($custom['size']) . "<br>";
                                            }
                                            if (!empty($custom['base'])) {
                                                echo "🍕 Base: " . htmlspecialchars($custom['base']) . "<br>";
                                            }
                                            if (!empty($custom['removedIngredients'])) {
                                                echo "❌ Retirer: " . htmlspecialchars(implode(', ', $custom['removedIngredients'])) . "<br>";
                                            }
                                            if (!empty($custom['addedIngredients'])) {
                                                echo "➕ Ajouter: " . htmlspecialchars(implode(', ', $custom['addedIngredients'])) . "<br>";
                                            }
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="item-details">
                                        💰 <?= number_format($item['totalPrice'], 2, ',', ' ') ?>€
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        
                        <div class="total">
                            TOTAL: <?= number_format($order['totalPrice'], 2, ',', ' ') ?>€
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<div class="no-orders">Aucune commande enregistrée</div>';
            }
        } else {
            echo '<div class="no-orders">Fichier de commandes introuvable</div>';
        }
        ?>
        
        <!-- Section DEBUG -->
        <div class="debug-section">
            <h2 style="color: #666; margin-bottom: 15px;">🔧 Debug - Dernières commandes brutes</h2>
            <div class="debug-content">
                <?php
                if (file_exists($debugFile)) {
                    // Lire les 50 dernières lignes
                    $lines = file($debugFile);
                    $lastLines = array_slice($lines, -200);
                    echo htmlspecialchars(implode('', $lastLines));
                } else {
                    echo "Fichier debug-order.txt introuvable";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
