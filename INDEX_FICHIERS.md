# 📦 FICHIERS DU PROJET PIZZA CLUB

## 📁 Structure complète

```
SITE INTERNET/
│
├── 📄 index.html                 ✅ Page principale du site
├── 🎨 style.css                  ✅ Tous les styles et design
├── ⚙️ script.js                  ✅ Logique JavaScript (panier, commandes, etc.)
├── 🔧 config.js                  ⚠️ À CONFIGURER (email, SMS, paramètres)
├── 📊 data.js                    ✅ Données des 37 pizzas
│
├── 📚 README.md                  📖 Documentation principale
├── 📋 LISTE_PIZZAS.md            📖 Liste complète des pizzas
├── 📧 GUIDE_EMAILJS.md           📖 Guide configuration email
├── 📝 CE_FICHIER.md              📖 Index des fichiers
│
├── 🚫 .gitignore                 ✅ Pour Git
│
└── 📂 img/                       🖼️ Toutes vos images
    ├── New logo blanc 2022.png   ✅ Logo blanc (utilisé)
    ├── New logo noir 2022.png    ✅ Logo noir
    ├── logo-Pizza Club-noir.png  ✅ Logo alternatif
    ├── Visuel pub produit facebook.png
    │
    └── 📂 SHOOT JULIEN 2021/
        ├── 37 photos de pizzas.png  ✅ Images principales
        ├── 37 photos part.png       ✅ Images portions
        │
        ├── 📂 Pizza photo/          🖼️ Photos alternatives
        └── 📂 vue haut/             🖼️ Photos vue du dessus
```

---

## 📄 DESCRIPTION DES FICHIERS

### 🌐 Fichiers Web (À NE PAS MODIFIER sauf personnalisation)

#### `index.html` - Structure du site
- Toutes les sections (Hero, Menu, Formules, Contact)
- Modals (Panier, Personnalisation, Checkout, Confirmation)
- Déjà configuré avec vos images

#### `style.css` - Design complet
- Couleurs rouge et blanc
- Responsive mobile/tablette/desktop
- Animations
- Design moderne "food tech"

#### `script.js` - Fonctionnalités
- Gestion du panier
- Personnalisation des pizzas
- Validation des commandes
- Envoi email/SMS
- LocalStorage (sauvegarde)

---

### ⚙️ Fichiers de Configuration (À MODIFIER)

#### `config.js` ⚠️ IMPORTANT
**Ce que vous devez modifier :**
```javascript
email: {
    serviceId: 'VOTRE_SERVICE_ID',      // EmailJS
    templateId: 'VOTRE_TEMPLATE_ID',    // EmailJS
    publicKey: 'VOTRE_PUBLIC_KEY',      // EmailJS
    recipientEmail: 'votre@email.com'   // Votre email
},

delivery: {
    fee: 3.50,                          // Vos frais de livraison
    freeDeliveryThreshold: 25           // Livraison gratuite à partir de...
},

restaurant: {
    name: 'Pizza Club',
    address: 'VOTRE_VRAIE_ADRESSE',
    phone: 'VOTRE_TÉLÉPHONE',
    email: 'VOTRE_EMAIL'
}
```

#### `data.js` ⚠️ PRIX À AJUSTER
**Ce que vous devez modifier :**
- Prix de chaque pizza (actuellement des exemples)
- Ingrédients exacts selon vos recettes
- Prix des formules
- Prix des extras

---

### 📚 Fichiers Documentation (À LIRE)

#### `README.md`
- Guide complet d'utilisation
- Installation
- Mise en ligne
- Dépannage

#### `LISTE_PIZZAS.md`
- Liste des 37 pizzas
- Prix actuels
- Comment les modifier

#### `GUIDE_EMAILJS.md`
- Configuration email étape par étape
- Template à utiliser
- Résolution de problèmes

---

### 🖼️ Fichiers Images

#### Images de pizzas utilisées actuellement :
- **37 pizzas complètes** dans `SHOOT JULIEN 2021/`
- Format : `NomPizza.png`

#### Images alternatives disponibles :
- **Photos portions** : `NomPizza part.png`
- **Photos vue haut** : Dans `vue haut/NomPizza haut.png`
- **Photos additionnelles** : Dans `Pizza photo/`

---

## ✅ CHECKLIST DE MISE EN LIGNE

### Avant de mettre en ligne :

- [ ] **1. Configurer EmailJS**
  - Créer compte EmailJS
  - Modifier `config.js` avec vos IDs
  - Ajouter le script dans `index.html`
  - ➡️ Voir `GUIDE_EMAILJS.md`

- [ ] **2. Ajuster les prix**
  - Ouvrir `data.js`
  - Modifier le prix de chaque pizza
  - Modifier les prix des formules
  - ➡️ Voir `LISTE_PIZZAS.md`

- [ ] **3. Personnaliser les infos**
  - Ouvrir `config.js`
  - Mettre votre vraie adresse
  - Mettre votre vrai téléphone
  - Mettre votre vrai email

- [ ] **4. Tester localement**
  - Ouvrir `index.html` dans le navigateur
  - Tester l'ajout au panier
  - Tester une commande complète
  - Vérifier la réception d'email

- [ ] **5. Mettre en ligne**
  - Choisir un hébergement (GitHub Pages, Netlify, etc.)
  - Uploader tous les fichiers
  - Tester en ligne

---

## 🎯 FICHIERS À MODIFIER ABSOLUMENT

### Priorité 1 (Obligatoire) :
1. ✅ `config.js` - Configuration email et infos restaurant
2. ✅ `data.js` - Prix des pizzas

### Priorité 2 (Recommandé) :
3. ✅ `index.html` - Ajouter le script EmailJS
4. ✅ `data.js` - Ajuster les ingrédients selon vos recettes

### Priorité 3 (Optionnel) :
5. ⚪ Changer les images si vous préférez les "part" ou "vue haut"
6. ⚪ Personnaliser les textes dans `index.html`

---

## 🚫 FICHIERS À NE PAS TOUCHER

(Sauf si vous savez ce que vous faites)

- ❌ `script.js` (logique complexe)
- ❌ `style.css` (sauf changement de couleurs)
- ❌ `.gitignore`

---

## 📱 TESTER EN LOCAL

### Méthode 1 : Simple
Double-cliquez sur `index.html`

### Méthode 2 : Avec serveur (recommandé)
```bash
# Avec Python
python -m http.server 8000

# Avec Node.js
npx serve
```

Puis ouvrez : `http://localhost:8000`

---

## 🌐 METTRE EN LIGNE

### Option 1 : GitHub Pages (Gratuit)
1. Créez un compte GitHub
2. Créez un nouveau repository
3. Uploadez tous les fichiers
4. Activez GitHub Pages dans Settings
5. Site accessible à : `https://username.github.io/repo-name`

### Option 2 : Netlify (Gratuit, Recommandé)
1. Allez sur [netlify.com](https://www.netlify.com)
2. Glissez-déposez votre dossier
3. Site en ligne instantanément !

### Option 3 : Hébergement classique
Uploadez via FTP tous les fichiers.

---

## 💾 SAUVEGARDES

### Données stockées localement (navigateur) :
- Panier en cours
- Historique des commandes
- Base clients

### Pour exporter les données :
Ouvrez la console (F12) et tapez :
```javascript
// Voir les commandes
localStorage.getItem('pizzaclub_orders')

// Voir les clients
localStorage.getItem('pizzaclub_customers')
```

---

## 🆘 BESOIN D'AIDE ?

1. Consultez `README.md`
2. Consultez `GUIDE_EMAILJS.md`
3. Vérifiez la console navigateur (F12)
4. Vérifiez `config.js`

---

## 📊 STATISTIQUES DU PROJET

- **Pages** : 1 (One Page)
- **Pizzas** : 37
- **Photos** : 111+ (3 versions par pizza)
- **Lignes de code** : ~2000+
- **Responsive** : ✅ Mobile, Tablette, Desktop
- **Fonctionnalités** : Panier, Personnalisation, Commande, Email, SMS ready

---

**✨ Tout est prêt ! Il ne reste plus qu'à configurer EmailJS et ajuster vos prix !**

🍕 Bon succès avec Pizza Club !
