# 📧 CONFIGURATION EMAILJS - GUIDE COMPLET

## 🎯 Objectif
Recevoir les commandes par email automatiquement quand un client valide sa commande.

---

## 📝 ÉTAPE 1 : Créer un compte EmailJS

1. Allez sur [https://www.emailjs.com/](https://www.emailjs.com/)
2. Cliquez sur **"Sign Up"** (gratuit jusqu'à 200 emails/mois)
3. Créez votre compte avec votre email

---

## 📬 ÉTAPE 2 : Ajouter un service email

1. Dans le dashboard EmailJS, allez dans **"Email Services"**
2. Cliquez sur **"Add New Service"**
3. Choisissez votre fournisseur d'email :
   - **Gmail** (recommandé si vous avez Gmail)
   - Outlook
   - Yahoo
   - Autre

4. **Pour Gmail :**
   - Cliquez sur Gmail
   - Connectez votre compte Google
   - Autorisez EmailJS
   - Notez votre **Service ID** (exemple : `service_abc1234`)

---

## 📄 ÉTAPE 3 : Créer un template d'email

1. Allez dans **"Email Templates"**
2. Cliquez sur **"Create New Template"**
3. Utilisez ce template :

### Template d'email pour les commandes :

**Subject (Sujet) :**
```
🍕 Nouvelle commande Pizza Club - {{order_number}}
```

**Content (Corps de l'email) :**
```
🍕 NOUVELLE COMMANDE PIZZA CLUB

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
📋 NUMÉRO DE COMMANDE
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
{{order_number}}

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
👤 INFORMATIONS CLIENT
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
Nom : {{customer_name}}
Email : {{customer_email}}
Téléphone : {{customer_phone}}

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
🚚 MODE DE COMMANDE
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
{{delivery_mode}}

{{#if_delivery}}
📍 Adresse de livraison :
{{delivery_address}}
{{/if_delivery}}

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
🛒 DÉTAIL DE LA COMMANDE
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
{{order_items}}

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
💰 MONTANT TOTAL
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
{{total}}€

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
⏰ TEMPS ESTIMÉ
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
{{estimated_time}}

{{#if_comments}}
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
💬 COMMENTAIRE CLIENT
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
{{customer_comments}}
{{/if_comments}}

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Cette commande a été passée depuis le site Pizza Club.

Bonne préparation ! 🍕
```

4. Sauvegardez le template
5. Notez votre **Template ID** (exemple : `template_xyz5678`)

---

## 🔑 ÉTAPE 4 : Récupérer votre clé publique

1. Allez dans **"Account"** (compte)
2. Section **"API Keys"**
3. Copiez votre **Public Key** (exemple : `abcDEF123456GHI`)

---

## ⚙️ ÉTAPE 5 : Configurer votre site

### 1. Ajoutez le script EmailJS dans `index.html`

Ouvrez `index.html` et ajoutez ce code **juste avant la balise `</body>`** :

```html
    <!-- EmailJS SDK -->
    <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
    <script>
        (function() {
            emailjs.init('VOTRE_PUBLIC_KEY'); // ← Remplacez par votre clé
        })();
    </script>

    <!-- Config & Scripts -->
    <script src="config.js"></script>
    <script src="data.js"></script>
    <script src="script.js"></script>
</body>
</html>
```

### 2. Modifiez `config.js`

Ouvrez `config.js` et remplacez les valeurs :

```javascript
email: {
    serviceId: 'service_abc1234',        // ← Votre Service ID
    templateId: 'template_xyz5678',      // ← Votre Template ID
    publicKey: 'abcDEF123456GHI',       // ← Votre Public Key
    recipientEmail: 'votre@email.com'   // ← Votre email pour recevoir les commandes
}
```

---

## ✅ ÉTAPE 6 : Tester

1. Ouvrez votre site
2. Ajoutez une pizza au panier
3. Validez une commande test
4. Vérifiez votre boîte email !

---

## 🐛 DÉPANNAGE

### ❌ Les emails n'arrivent pas

**Vérifications :**
1. Regardez la console du navigateur (F12) pour voir les erreurs
2. Vérifiez que EmailJS est bien initialisé
3. Vérifiez vos identifiants dans `config.js`
4. Vérifiez vos spams

**Si vous voyez dans la console :**
```
=== EMAIL SIMULÉ ===
```
C'est que votre configuration n'est pas encore faite (valeurs par défaut).

### ❌ Erreur "Service ID not found"
- Vérifiez votre Service ID dans EmailJS
- Assurez-vous qu'il est actif

### ❌ Erreur "Template ID not found"
- Vérifiez votre Template ID
- Assurez-vous que le template est publié

### ❌ Les variables {{xxx}} apparaissent vides
- Vérifiez que le nom des variables correspond exactement
- Variables disponibles :
  - `order_number`
  - `customer_name`
  - `customer_email`
  - `customer_phone`
  - `delivery_mode`
  - `order_items`
  - `total`
  - `estimated_time`

---

## 🎯 EXEMPLE COMPLET

### Dans index.html (avant `</body>`) :
```html
<!-- EmailJS SDK -->
<script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
<script>
    (function() {
        emailjs.init('YOUR_PUBLIC_KEY_HERE');
    })();
</script>
```

### Dans config.js :
```javascript
const CONFIG = {
    email: {
        serviceId: 'service_12ab34cd',
        templateId: 'template_56ef78gh',
        publicKey: 'YOUR_PUBLIC_KEY_HERE',
        recipientEmail: 'contact@pizzaclub.fr'
    },
    // ... reste de la config
};
```

---

## 📱 RECEVOIR LES COMMANDES SUR TÉLÉPHONE

### Option 1 : Email push
- Activez les notifications email sur votre téléphone
- Vous recevrez les commandes instantanément

### Option 2 : Gmail App
- Installez l'app Gmail
- Activez les notifications

---

## 💡 ASTUCES

### Template alternatif simple :
```
Nouvelle commande : {{order_number}}

Client : {{customer_name}}
Tel : {{customer_phone}}
Total : {{total}}€

{{order_items}}
```

### Pour plusieurs destinataires :
Ajoutez dans les settings EmailJS, pas dans le code.

---

## 📊 LIMITES GRATUITES

- **200 emails/mois** avec le plan gratuit
- **1000 emails/mois** avec le plan payant (à partir de 7$/mois)

---

## 🔒 SÉCURITÉ

✅ **EmailJS est sécurisé** :
- La Public Key peut être publique (d'où son nom)
- Pas besoin de backend
- Respecte les normes de sécurité

⚠️ **À NE PAS FAIRE** :
- Ne mettez JAMAIS votre Private Key dans le code frontend
- N'utilisez que la Public Key

---

## 📞 SUPPORT EMAILJS

- Documentation : [https://www.emailjs.com/docs/](https://www.emailjs.com/docs/)
- Support : contact@emailjs.com

---

## ✨ Vous êtes prêt !

Une fois configuré, chaque commande sera automatiquement envoyée par email !

🍕 Bon succès avec Pizza Club !
