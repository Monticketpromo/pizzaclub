# 🚫 GUIDE : Gestion des Produits Indisponibles

## 📋 Vue d'ensemble

Ce système vous permet de marquer des pizzas, pâtes, salades, desserts ou ingrédients comme **indisponibles** sur votre site. Les clients verront un badge "Indisponible" et ne pourront pas les commander.

---

## 🎯 Méthode 1 : Interface Admin (RECOMMANDÉ)

### Étapes :

1. **Ouvrez** `admin-indispos.html` dans votre navigateur
   - Directement depuis votre ordinateur (double-clic)
   - Ou sur votre serveur : `https://votre-site.com/admin-indispos.html`

2. **Cliquez** sur les produits/ingrédients à rendre indisponibles
   - Les cartes deviennent grisées
   - Le statut passe à "Indisponible"
   - Recliquez pour rendre à nouveau disponible

3. **Cliquez** sur "Générer le code pour data.js"
   - Le code JavaScript est généré automatiquement

4. **Copiez** le code généré

5. **Ouvrez** `data.js` et **remplacez** la section :
   ```javascript
   // ========================================
   // GESTION DES INDISPONIBILITÉS
   // ========================================
   const UNAVAILABLE_ITEMS = {
       // ... votre ancien code
   };
   
   const UNAVAILABLE_INGREDIENTS = {
       // ... votre ancien code
   };
   ```
   
   Par le nouveau code généré

6. **Sauvegardez** `data.js`

7. **Rafraîchissez** votre site → Les produits sont maintenant indisponibles ! ✅

---

## 🛠️ Méthode 2 : Modifier data.js directement

### Pour marquer une PIZZA indisponible :

Trouvez l'ID de la pizza dans `data.js` (exemple : Burger = ID 17)

```javascript
const UNAVAILABLE_ITEMS = {
    'pizza-17': true,  // Pizza Burger indisponible
};
```

### Pour marquer une PÂTE indisponible :

```javascript
const UNAVAILABLE_ITEMS = {
    'pate-101': true,  // Pâte Carbonara indisponible
};
```

### Pour marquer une SALADE indisponible :

```javascript
const UNAVAILABLE_ITEMS = {
    'salade-201': true,  // Salade César indisponible
};
```

### Pour marquer un DESSERT indisponible :

```javascript
const UNAVAILABLE_ITEMS = {
    'dessert-401': true,  // Crème Brûlée indisponible
};
```

### Pour marquer un INGRÉDIENT indisponible :

```javascript
const UNAVAILABLE_INGREDIENTS = {
    'champignons': true,  // Champignons indisponibles
    'saumon': true,       // Saumon indisponible
};
```

**⚠️ Impact des ingrédients indisponibles :**
- Les clients ne pourront pas les ajouter en supplément
- Cela n'affecte PAS les pizzas qui les contiennent de base

---

## 📝 Exemple Complet

```javascript
// ========================================
// GESTION DES INDISPONIBILITÉS
// ========================================
const UNAVAILABLE_ITEMS = {
    // Pizzas
    'pizza-17': true,        // Pizza Burger indisponible
    'pizza-32': true,        // Pizza 4 Fromages indisponible
    
    // Pâtes
    'pate-104': true,        // Pâte Saumon indisponible
    
    // Desserts
    'dessert-401': true,     // Crème Brûlée indisponible
};

const UNAVAILABLE_INGREDIENTS = {
    // Ingrédients indisponibles
    'champignons': true,     // Champignons indisponibles
    'saumon': true,          // Saumon indisponible
    'poulet': true,          // Poulet indisponible
};
```

---

## 🎨 Ce que voit le client

### Produit disponible :
- ✅ Carte normale avec couleurs
- ✅ Bouton "Personnaliser & Commander" actif
- ✅ Prix affiché normalement

### Produit indisponible :
- ⛔ Badge rouge "Indisponible" sur l'image
- ⛔ Carte légèrement grisée
- ⛔ Bouton "Indisponible" désactivé (gris)
- ⛔ Impossible de commander

---

## 🔄 Rendre un produit à nouveau disponible

### Avec l'interface admin :
1. Ouvrez `admin-indispos.html`
2. Cliquez sur le produit indisponible
3. Il redevient disponible (coloré)
4. Générez et copiez le nouveau code
5. Mettez à jour `data.js`

### En modifiant data.js :
Supprimez ou commentez la ligne :

```javascript
const UNAVAILABLE_ITEMS = {
    // 'pizza-17': true,  // ← Ligne commentée = pizza disponible
};
```

Ou supprimez complètement la ligne.

---

## 🚀 Déploiement

### En local :
Les changements sont immédiats après sauvegarde de `data.js`

### Sur serveur :
1. Uploadez le fichier `data.js` modifié
2. Les clients devront rafraîchir la page (F5)
3. Changement instantané ✅

---

## 📱 Cas d'usage typiques

### 🍄 Ingrédient en rupture
**Problème :** Plus de champignons en stock

**Solution :**
```javascript
const UNAVAILABLE_INGREDIENTS = {
    'champignons': true
};
```

**Résultat :** Les clients ne peuvent plus ajouter de champignons en supplément

---

### 🍕 Pizza du jour épuisée
**Problème :** La pizza signature est épuisée ce soir

**Solution :**
```javascript
const UNAVAILABLE_ITEMS = {
    'pizza-17': true  // ID de votre pizza signature
};
```

**Résultat :** Badge "Indisponible" + impossible de commander

---

### 🐟 Problème fournisseur
**Problème :** Livraison de poisson reportée

**Solution :**
```javascript
const UNAVAILABLE_ITEMS = {
    'pizza-33': true,  // Pizza Thon
    'pizza-37': true,  // Pizza Saumon
};

const UNAVAILABLE_INGREDIENTS = {
    'thon': true,
    'saumon': true,
    'anchois': true
};
```

**Résultat :** Toutes les pizzas mer indisponibles + ingrédients mer bloqués

---

## ⚡ Raccourcis Pratiques

### Tout marquer comme disponible :
```javascript
const UNAVAILABLE_ITEMS = {};
const UNAVAILABLE_INGREDIENTS = {};
```

### Fermeture temporaire d'une catégorie complète :
Utilisez l'interface admin pour sélectionner toutes les pizzas d'une catégorie

---

## 🎯 Bonnes Pratiques

✅ **Utilisez l'interface admin** pour éviter les erreurs de syntaxe

✅ **Testez** après chaque modification (rafraîchir le site)

✅ **Pensez à réactiver** les produits quand ils sont de nouveau disponibles

✅ **Informez votre équipe** des produits indisponibles

⚠️ **Ne supprimez pas** les produits de data.js, marquez-les juste indisponibles

⚠️ **Gardez une sauvegarde** de data.js avant modification

---

## 🆘 Dépannage

### Le produit apparaît toujours disponible ?
- Vérifiez que vous avez sauvegardé `data.js`
- Rafraîchissez la page (Ctrl+F5 ou Cmd+Shift+R)
- Vérifiez l'ID du produit (doit correspondre exactement)

### Erreur JavaScript ?
- Vérifiez la syntaxe : `'pizza-17': true,` (avec virgule)
- Dernière ligne SANS virgule
- Fermez bien avec `};`

### Badge n'apparaît pas ?
- Videz le cache du navigateur
- Vérifiez que `style.css` est bien à jour
- Vérifiez que `script.js` est bien à jour

---

## 📞 Support

Si vous rencontrez des problèmes :
1. Vérifiez la console du navigateur (F12)
2. Comparez avec les exemples ci-dessus
3. Utilisez l'interface admin pour éviter les erreurs

---

**✅ Système opérationnel !**

Vos produits indisponibles sont maintenant gérés automatiquement. Les clients voient clairement ce qui est disponible ou non. 🎉
