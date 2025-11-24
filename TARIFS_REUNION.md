# 🍕 PIZZA CLUB LA RÉUNION - TARIFS À AJUSTER

## ⚠️ IMPORTANT
Les prix dans `data.js` sont des EXEMPLES.
Vous devez les remplacer par VOS VRAIS TARIFS selon votre menu.

---

## 📋 PIZZAS PAR CATÉGORIE

### 🥛 PIZZAS CRÈME (6 pizzas)
| ID | Nom | Prix actuel | À modifier dans data.js |
|----|-----|-------------|------------------------|
| 1 | Carbonara | 10.00€ | ✏️ Ligne ~7 |
| 2 | Raclette | 11.00€ | ✏️ Ligne ~14 |
| 3 | Tartiflette | 11.00€ | ✏️ Ligne ~21 |
| 4 | Chavignol | 11.00€ | ✏️ Ligne ~28 |
| 5 | Forestière | 10.00€ | ✏️ Ligne ~35 |
| 6 | Fermière | 10.00€ | ✏️ Ligne ~42 |

### 🍗 PIZZAS POULET (3 pizzas)
| ID | Nom | Prix actuel | À modifier dans data.js |
|----|-----|-------------|------------------------|
| 7 | Poulet | 10.00€ | ✏️ Ligne ~51 |
| 8 | Créole | 10.50€ | ✏️ Ligne ~58 |
| 9 | Asiatique | 10.50€ | ✏️ Ligne ~65 |

### 🥩 PIZZAS BŒUF (4 pizzas)
| ID | Nom | Prix actuel | À modifier dans data.js |
|----|-----|-------------|------------------------|
| 10 | Bœuf | 10.00€ | ✏️ Ligne ~74 |
| 11 | Bolognaise | 10.00€ | ✏️ Ligne ~81 |
| 12 | Burger | 10.50€ | ✏️ Ligne ~88 |
| 13 | Mexicaine | 10.50€ | ✏️ Ligne ~95 |

### 🥓 PIZZAS PORC (15 pizzas)
| ID | Nom | Prix actuel | À modifier dans data.js |
|----|-----|-------------|------------------------|
| 14 | Margherita | 7.00€ | ✏️ Ligne ~104 |
| 15 | Reine | 9.00€ | ✏️ Ligne ~111 |
| 16 | Quatre Fromages | 10.00€ | ✏️ Ligne ~118 |
| 17 | Chorizo | 9.50€ | ✏️ Ligne ~125 |
| 18 | Hawaïenne | 9.50€ | ✏️ Ligne ~132 |
| 19 | Campagnarde | 10.00€ | ✏️ Ligne ~139 |
| 20 | Complète | 10.00€ | ✏️ Ligne ~146 |
| 21 | Pizza Club | 11.50€ | ✏️ Ligne ~153 |
| 22 | Orientale | 10.50€ | ✏️ Ligne ~160 |
| 23 | Spéciale | 10.50€ | ✏️ Ligne ~167 |
| 24 | Totale | 11.00€ | ✏️ Ligne ~174 |
| 25 | Paysanne | 10.50€ | ✏️ Ligne ~181 |
| 26 | Sarcive | 10.50€ | ✏️ Ligne ~188 |
| 27 | Mixte | 10.00€ | ✏️ Ligne ~195 |
| 28 | Chocho | 11.00€ | ✏️ Ligne ~202 |

### 🦐 PIZZAS MER (7 pizzas)
| ID | Nom | Prix actuel | À modifier dans data.js |
|----|-----|-------------|------------------------|
| 29 | Thon | 9.50€ | ✏️ Ligne ~211 |
| 30 | Buffle | 11.50€ | ✏️ Ligne ~218 |
| 31 | Saumon | 12.50€ | ✏️ Ligne ~225 |
| 32 | Fruits de Mer | 12.50€ | ✏️ Ligne ~232 |
| 33 | Crevettes | 12.00€ | ✏️ Ligne ~239 |
| 34 | Océane | 13.50€ | ✏️ Ligne ~246 |
| 35 | Atlantide | 13.00€ | ✏️ Ligne ~253 |

### 🥗 PIZZAS VÉGÉTARIENNES (2 pizzas)
| ID | Nom | Prix actuel | À modifier dans data.js |
|----|-----|-------------|------------------------|
| 36 | Végétarienne | 9.50€ | ✏️ Ligne ~262 |
| 37 | Champignons | 8.50€ | ✏️ Ligne ~269 |

---

## 📊 RÉCAPITULATIF
- **Total : 37 pizzas**
- Crème : 6
- Poulet : 3
- Bœuf : 4
- Porc : 15
- Mer : 7
- Végétarienne : 2

---

## ✏️ COMMENT MODIFIER LES PRIX

### Méthode :
1. Ouvrez le fichier `data.js`
2. Trouvez la pizza concernée (utilisez Ctrl+F / Cmd+F)
3. Changez la valeur du champ `price:`

### Exemple :
```javascript
{
    id: 1,
    name: 'Carbonara',
    category: 'creme',
    ingredients: ['Crème fraîche', 'Mozzarella', 'Lardons', 'Œuf', 'Parmesan'],
    price: 10.00, // ← CHANGEZ ICI avec votre vrai prix
    image: 'img/SHOOT JULIEN 2021/Carbo.png',
    badge: null
}
```

---

## 💡 CONSEIL
Regardez votre menu papier/PDF et remplissez les prix :
1. Commencez par les Crème
2. Puis les Poulet
3. Puis les Bœuf
4. Puis les Porc
5. Puis les Mer
6. Enfin les Végétariennes

---

## ✅ MODIFICATIONS DÉJÀ FAITES

### ✅ Livraison GRATUITE
- Frais de livraison = 0€
- Configuration dans `config.js`

### ✅ Personnalisation obligatoire
- Plus de bouton "Ajouter direct"
- Toujours passer par la personnalisation
- Le panier s'ouvre automatiquement après ajout

### ✅ Logo Pizza Club
- Logo noir affiché
- Fichier : `img/New logo noir 2022.png`

### ✅ Catégories La Réunion
- Crème, Poulet, Bœuf, Porc, Mer, Végétarienne
- Filtres mis à jour dans le menu

---

## 🎯 PROCHAINES ÉTAPES

1. ✏️ Ajuster tous les prix dans `data.js`
2. 📧 Configurer EmailJS (voir `GUIDE_EMAILJS.md`)
3. 🧪 Tester le site
4. 🚀 Mettre en ligne !

---

**🍕 Tout est prêt pour La Réunion ! Plus qu'à ajuster les prix !**
