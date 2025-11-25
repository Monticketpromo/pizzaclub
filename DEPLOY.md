# Déploiement automatique GitHub → Hostinger

Ce projet utilise GitHub Actions pour déployer automatiquement le site sur Hostinger à chaque push sur la branche `main`.

## 🔧 Configuration requise (À faire UNE SEULE FOIS)

### 1. Récupérer les informations FTP Hostinger

Connectez-vous à votre panneau Hostinger :

1. Allez dans **Fichiers** → **Gestionnaire de fichiers** → **Compte FTP**
2. Notez ces 3 informations :
   - **Serveur FTP** : Ex: `ftp.pizzaclub.re` ou `123.456.789.10`
   - **Nom d'utilisateur** : Ex: `u123456789` ou `pizzaclub@pizzaclub.re`
   - **Mot de passe** : Votre mot de passe FTP

### 2. Ajouter les secrets dans GitHub

1. Allez sur https://github.com/Monticketpromo/pizzaclub/settings/secrets/actions
2. Cliquez sur **New repository secret**
3. Ajoutez ces 3 secrets :

**Secret 1 :**
- Name : `FTP_SERVER`
- Value : Votre serveur FTP (ex: `ftp.pizzaclub.re`)

**Secret 2 :**
- Name : `FTP_USERNAME`
- Value : Votre nom d'utilisateur FTP

**Secret 3 :**
- Name : `FTP_PASSWORD`
- Value : Votre mot de passe FTP

### 3. C'est tout ! 🎉

Une fois les secrets configurés :
- Chaque `git push` déploiera automatiquement sur Hostinger
- Le déploiement prend environ 30 secondes à 1 minute
- Vous verrez le statut dans l'onglet **Actions** de GitHub

## 📊 Vérifier le déploiement

1. Allez sur https://github.com/Monticketpromo/pizzaclub/actions
2. Vous verrez l'historique de tous les déploiements
3. ✅ = Déploiement réussi
4. ❌ = Erreur (vérifiez les logs)

## ⚠️ Important

- Les secrets ne sont jamais visibles après création (sécurité)
- Si vous changez de mot de passe FTP, mettez à jour le secret `FTP_PASSWORD`
- Le dossier de destination est `/public_html/` (modifiable dans `.github/workflows/deploy.yml` ligne 20)

## 🔍 Dépannage

**Le déploiement échoue ?**
1. Vérifiez que les 3 secrets sont bien configurés
2. Testez votre connexion FTP avec un client (FileZilla)
3. Vérifiez le chemin `/public_html/` (peut être `/` sur certains hébergeurs)

**Les fichiers n'apparaissent pas ?**
- Attendez 1-2 minutes (cache serveur)
- Videz le cache de votre navigateur (Cmd+Shift+R)
- Vérifiez dans Hostinger File Manager que les fichiers sont bien là
