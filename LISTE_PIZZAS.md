# 🍕 LISTE DES PIZZAS - PIZZA CLUB

## 📝 Instructions
- Modifiez les prix dans le fichier `data.js`
- Tous les noms et images sont déjà configurés
- Les ingrédients peuvent être personnalisés selon vos recettes exactes

---

## 📋 PIZZAS CLASSIQUES (8 pizzas)

| ID | Nom | Prix actuel | Image |
|----|-----|-------------|-------|
| 1 | Margherita | 8.90€ | ✅ Margherita.png |
| 2 | Reine | 10.90€ | ✅ Reine.png |
| 3 | Quatre Fromages | 11.90€ | ✅ 4 fromage.png |
| 4 | Chorizo | 11.50€ | ✅ Chorizo.png |
| 5 | Hawaïenne | 11.50€ | ✅ Hawaï.png |
| 6 | Thon | 11.90€ | ✅ Thon.png |
| 7 | Campagnarde | 12.50€ | ✅ Campagnarde.png |
| 8 | Complète | 12.90€ | ✅ Complète.png |
| 33 | Paysanne | 13.50€ | ✅ Paysanne.png |
| 34 | Fermière | 13.50€ | ✅ Fermiére.png |
| 36 | Mixte | 12.50€ | ✅ Mixte.png |

---

## ⭐ SIGNATURES PIZZA CLUB (20 pizzas)

| ID | Nom | Prix actuel | Badge | Image |
|----|-----|-------------|-------|-------|
| 9 | Pizza Club | 14.90€ | Signature | ✅ Pizza Club.png |
| 10 | Orientale | 13.50€ | - | ✅ Orientale.png |
| 11 | Spéciale | 13.50€ | - | ✅ Spéciale .png |
| 12 | Totale | 14.50€ | - | ✅ Totale.png |
| 13 | Mexicaine | 13.90€ | - | ✅ Mexicaine.png |
| 14 | Créole | 13.90€ | - | ✅ Créole.png |
| 15 | Burger | 13.90€ | - | ✅ Burger.png |
| 16 | Asiatique | 13.90€ | - | ✅ Asiatique.png |
| 17 | Bœuf | 12.90€ | - | ✅ Boeuf.png |
| 18 | Poulet | 12.90€ | - | ✅ Poulet.png |
| 19 | Bolognaise | 12.90€ | - | ✅ Bolo.png |
| 20 | Chavignol | 13.90€ | - | ✅ Chavignol.png |
| 21 | Raclette | 14.50€ | Populaire | ✅ Raclette.png |
| 22 | Tartiflette | 14.50€ | Best-seller | ✅ Tartiflette.png |
| 23 | Carbonara | 13.50€ | - | ✅ Carbo.png |
| 24 | Buffle | 14.90€ | Premium | ✅ Buffle.png |
| 25 | Saumon | 15.90€ | Premium | ✅ Saumon.png |
| 26 | Fruits de Mer | 15.90€ | - | ✅ Mer.png |
| 27 | Crevettes | 15.50€ | - | ✅ Crevette.png |
| 28 | Océane | 16.90€ | Premium | ✅ Océane.png |
| 29 | Atlantide | 16.50€ | - | ✅ Atlantide.png |
| 35 | Sarcive | 13.90€ | - | ✅ Sarcive.png |
| 37 | Chocho | 14.50€ | - | ✅ Chocho.png |

---

## 🌱 PIZZAS VÉGÉTARIENNES (3 pizzas)

| ID | Nom | Prix actuel | Badge | Image |
|----|-----|-------------|-------|-------|
| 30 | Végétarienne | 11.90€ | Veggie | ✅ Végétarienne.png |
| 31 | Champignons | 10.50€ | - | ✅ Champi.png |
| 32 | Forestière | 12.50€ | - | ✅ Forestière.png |

---

## 📊 STATISTIQUES

- **Total : 37 pizzas**
- Classiques : 11 pizzas
- Signatures : 23 pizzas
- Végétariennes : 3 pizzas

---

## 🎯 BADGES UTILISÉS

- **Signature** : Pizza Club
- **Populaire** : Reine, Raclette
- **Best-seller** : Tartiflette
- **Premium** : Buffle, Saumon, Océane
- **Veggie** : Végétarienne
- **Classique** : Margherita

---

## ✏️ MODIFIER LES PRIX

1. Ouvrez le fichier `data.js`
2. Trouvez la pizza par son ID ou son nom
3. Changez la valeur du champ `price`
4. Sauvegardez le fichier

**Exemple :**
```javascript
{
    id: 1,
    name: 'Margherita',
    category: 'classique',
    ingredients: ['Sauce tomate', 'Mozzarella', 'Origan'],
    price: 8.90, // ← MODIFIER ICI
    image: 'img/SHOOT JULIEN 2021/Margherita.png',
    badge: 'Classique'
}
```

---

## 🖼️ IMAGES DISPONIBLES

Toutes vos pizzas ont 3 types de photos :
- **Photo normale** : `Nom.png` (utilisée actuellement)
- **Photo part** : `Nom part.png`
- **Vue du haut** : Dans le dossier `vue haut/`

Vous pouvez changer le type d'image dans `data.js` si vous préférez.

---

## 🆕 AJOUTER UNE NOUVELLE PIZZA

Ajoutez ce code dans `data.js` dans le tableau `PIZZAS_DATA` :

```javascript
{
    id: 38, // Prochain ID disponible
    name: 'Nom de votre pizza',
    category: 'classique', // ou 'signature' ou 'vegetarienne'
    ingredients: ['Ingrédient 1', 'Ingrédient 2', 'Ingrédient 3'],
    price: 12.90,
    image: 'img/SHOOT JULIEN 2021/VotrePizza.png',
    badge: null // ou 'Nouveau', 'Best-seller', etc.
}
```

---

## 🎨 MODIFIER LES INGRÉDIENTS

Les ingrédients affichés actuellement sont des exemples.
Personnalisez-les dans `data.js` selon vos recettes exactes.

**Par exemple pour la Pizza Club :**
```javascript
ingredients: ['Sauce tomate', 'Mozzarella', 'Viande hachée', 'Merguez', 'Chorizo', 'Oignons']
```

---

**✅ Toutes vos images sont déjà configurées et prêtes à l'emploi !**
