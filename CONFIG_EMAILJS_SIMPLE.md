# 📧 Configuration EmailJS - Guide Simplifié

## 🎯 Ce qu'il faut faire

Vous devez configurer EmailJS pour recevoir les commandes sur **contact@pizzaclub.re**

---

## ⏱️ Temps nécessaire : 10 minutes

---

## 📝 ÉTAPES À SUIVRE

### 1️⃣ Créer un compte EmailJS (GRATUIT)

1. Allez sur **https://www.emailjs.com/**
2. Cliquez sur **"Sign Up"**
3. Créez votre compte (gratuit jusqu'à 200 emails/mois)

---

### 2️⃣ Connecter votre email

1. Dans le dashboard, allez dans **"Email Services"**
2. Cliquez sur **"Add New Service"**
3. Choisissez **Gmail** (ou votre fournisseur)
4. Connectez votre compte email
5. **NOTEZ le Service ID** → ex: `service_abc1234`

---

### 3️⃣ Créer le template d'email

1. Allez dans **"Email Templates"**
2. Cliquez sur **"Create New Template"**
3. Configurez :

**To Email (destinataire) :**
```
contact@pizzaclub.re
```

**Subject (sujet) :**
```
🍕 Nouvelle commande #{{order_number}} - {{from_name}}
```

**Message (corps) :**
```
🍕 NOUVELLE COMMANDE PIZZA CLUB
━━━━━━━━━━━━━━━━━━━━━━━━━━━━

📋 Commande : {{order_number}}
📅 Date : {{order_date}}

👤 CLIENT
━━━━━━━━━━━━━━━━━━━━━━━━━━━━
Nom : {{from_name}}
Téléphone : {{customer_phone}}
Email : {{customer_email}}

🚚 LIVRAISON
━━━━━━━━━━━━━━━━━━━━━━━━━━━━
Type : {{order_type}}
Adresse : {{delivery_address}}

🛒 COMMANDE
━━━━━━━━━━━━━━━━━━━━━━━━━━━━
{{order_items}}

💰 MONTANT
━━━━━━━━━━━━━━━━━━━━━━━━━━━━
Sous-total : {{subtotal}}
Livraison : {{delivery_fee}}
─────────────
TOTAL : {{total}}

💬 Commentaire :
{{comments}}

━━━━━━━━━━━━━━━━━━━━━━━━━━━━
Pizza Club - La Réunion
📞 0262 66 82 30
```

4. Sauvegardez
5. **NOTEZ le Template ID** → ex: `template_xyz5678`

---

### 4️⃣ Récupérer votre clé publique

1. Allez dans **"Account"** (menu de gauche)
2. Section **"General"**
3. **COPIEZ votre Public Key** → ex: `abcDEF123456`

---

### 5️⃣ Configurer le site

Ouvrez le fichier **`emailjs-config.js`** et remplacez :

```javascript
const EMAILJS_CONFIG = {
    USER_ID: 'abcDEF123456',        // ← Votre Public Key
    SERVICE_ID: 'service_abc1234',   // ← Votre Service ID
    TEMPLATE_ID: 'template_xyz5678'  // ← Votre Template ID
};
```

**Sauvegardez le fichier !**

---

## ✅ TESTER

1. Ouvrez votre site web
2. Ajoutez des articles au panier
3. Validez une commande test
4. Vérifiez votre email **contact@pizzaclub.re**

---

## 🐛 Problèmes ?

### Email non reçu ?
- Vérifiez vos **spams**
- Vérifiez que le Service est **activé** dans EmailJS
- Regardez la **console du navigateur** (F12) pour voir les erreurs

### "EmailJS n'est pas encore configuré" ?
- Vous n'avez pas modifié le fichier `emailjs-config.js`
- Les valeurs sont toujours par défaut

### "Service ID not found" ?
- Vérifiez votre Service ID dans EmailJS
- Copiez-le exactement

---

## 💰 Prix

✅ **GRATUIT** jusqu'à 200 emails/mois
💵 **7$/mois** pour 1000 emails/mois

---

## 📞 Support EmailJS

Documentation : https://www.emailjs.com/docs/

---

## ✨ C'est tout !

Une fois configuré, toutes vos commandes arriveront automatiquement par email ! 🎉
