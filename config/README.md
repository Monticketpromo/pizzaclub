# Configuration persistante

Le dossier `config/` contient les fichiers de configuration avec clés API.

**Ce dossier est ignoré par Git** pour éviter qu'il soit écrasé lors des déploiements.

## Fichiers à placer ici :

- `brevo-config.php` - Configuration SMS Brevo
- Autres fichiers de config sensibles

## Upload sur Hostinger :

1. Créer le dossier `config/` à la racine du site
2. Uploader `brevo-config.php` dedans via FTP/cPanel
3. Le fichier restera intact même après les git push
