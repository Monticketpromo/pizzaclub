# Mise à jour du système de Formules

## ✅ Modifications effectuées

### 1. **Nouvelles Formules** (data.js)

#### Formule Midi - 10.90€
- Pizza 26cm au choix (sauf Burger et Américaine +1€)
- Boisson 33cl offerte
- IDs pizzas exclues: 17 (Burger), 26 (Américaine)

#### Menu Pâtes/Salade
- Pâte L ou Salade + Dessert + Boisson offerte: **12.80€**
- Pâte XL ou Salade + Dessert + Boisson offerte: **15.80€**
- Différence de 3€ pour la taille XL

#### Promo 2 Pizzas - AUTOMATIQUE
- Valable tous les soirs uniquement
- Se déclenche automatiquement quand 2 pizzas sont dans le panier
- Le client choisit:
  - 🍕 1 Pizza Margherita OFFERTE
  - 🥤 OU 2 Boissons 33cl OFFERTES

---

### 2. **Interface HTML** (index.html)

✅ Section formules mise à jour avec les 3 nouvelles cartes
✅ Design moderne avec badges (MIDI, PROMO SOIR)
✅ Affichage du double prix pour Menu Pâtes/Salade (12.80€ / 15.80€)
✅ Notes explicatives sur les exclusions
✅ Nouveau modal de sélection promo (`#promoModal`)

#### Modal Promo 2 Pizzas
- Design attrayant avec icônes
- 2 boutons de choix (Margherita / Boissons)
- Message clair sur l'automatisation
- Indication "Offre soir uniquement"

---

### 3. **Logique JavaScript** (script.js)

#### Fonction `addFormuleToCart(formuleType)`
- Support des nouvelles formules (midi, patesSalade)
- Gestion des prix différents selon la taille

#### Fonction `checkPromo2Pizzas()`
- Compte automatiquement les pizzas dans le panier
- Détecte quand le client atteint 2 pizzas
- Ouvre le modal de sélection automatiquement
- Ne se déclenche qu'une seule fois par session panier

#### Fonction `selectPromo(type)`
- Ajoute au panier le cadeau choisi (Margherita ou Boissons)
- Prix: 0€ (gratuit)
- Badge "🎁 OFFERTE - Promo 2 Pizzas"

#### Intégration dans `updateCartUI()`
- Appelle `checkPromo2Pizzas()` à chaque mise à jour du panier
- Surveillance en temps réel du nombre de pizzas

---

### 4. **Styles CSS** (style.css)

✅ `.price-variant` - Affichage du prix alternatif (ou 15.80€)
✅ `.promo-info` - Encart informatif avec fond rouge léger
✅ `.promo-option-btn:hover` - Animation au survol des options promo
✅ Bordures et ombres pour mettre en valeur les choix

---

## 🎯 Fonctionnement

### Scénario 1: Formule Midi
1. Client clique sur "Ajouter au panier" → Formule Midi
2. Le système ajoute la formule à 10.90€
3. Le client peut ensuite personnaliser (à implémenter: sélection pizza)

### Scénario 2: Menu Pâtes/Salade
1. Client clique sur "Ajouter au panier" → Menu Pâtes/Salade
2. Le système ajoute à 12.80€ (L) ou 15.80€ (XL)
3. Le client peut personnaliser (à implémenter: sélection pâte/salade + dessert)

### Scénario 3: Promo 2 Pizzas (Automatique)
1. Client ajoute 1ère pizza → Normal
2. Client ajoute 2ème pizza → **Modal promo s'ouvre automatiquement**
3. Client voit 2 options:
   - "1 Pizza Margherita OFFERTE"
   - "2 Boissons 33cl OFFERTES"
4. Client clique sur son choix
5. Cadeau ajouté au panier avec prix 0€
6. Message de confirmation "🎉 Cadeau ajouté au panier !"

---

## 📝 Notes importantes

### Promo 2 Pizzas
- ✅ Détection automatique fonctionnelle
- ✅ Modal de sélection créé
- ✅ Ajout au panier avec prix 0€
- ⏳ À faire: Vérifier l'heure pour "soir uniquement" (optionnel)

### Formules avec sélection
- Les formules Midi et Pâtes/Salade ont `needsSelection: true`
- Permet d'implémenter plus tard un système de sélection d'éléments
- Actuellement: Ajout direct au panier avec prix fixe

### Variables promo
- `promoApplied` - Flag pour éviter d'ouvrir le modal plusieurs fois
- Réinitialisé quand le panier est vidé
- Une seule promo par session panier

---

## 🧪 Tests à effectuer

1. ✅ Vérifier l'affichage des 3 formules
2. ✅ Tester l'ajout de Formule Midi au panier
3. ✅ Tester l'ajout de Menu Pâtes/Salade
4. ✅ Ajouter 2 pizzas et vérifier l'ouverture du modal promo
5. ✅ Sélectionner "Margherita offerte" et vérifier l'ajout
6. ✅ Sélectionner "2 Boissons offertes" et vérifier l'ajout
7. ✅ Vérifier que le prix total ne compte pas la promo (0€)
8. ⏳ Vider le panier et vérifier la réinitialisation du flag promo

---

## 🚀 Prochaines améliorations possibles

1. **Restriction horaire "soir"**
   - Détecter l'heure actuelle
   - Désactiver la promo en journée
   - Message: "Promo valable à partir de 18h30"

2. **Sélection interactive formules**
   - Modal pour choisir la pizza (Formule Midi)
   - Modal pour choisir pâte/salade + dessert (Menu)
   - Validation des exclusions (Burger, Américaine)

3. **Badge "PROMO" dans le panier**
   - Afficher clairement les articles offerts
   - Design distinct (fond vert, texte gratuit)

4. **Calcul intelligent**
   - Retirer automatiquement la promo si < 2 pizzas
   - Proposer plusieurs promos si 4+ pizzas
