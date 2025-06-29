# Mon Projet PHP

Un projet PHP moderne et fonctionnel avec une interface utilisateur élégante et des fonctionnalités complètes.

## 🚀 Fonctionnalités

- **Interface moderne** : Design responsive avec animations CSS
- **Navigation intuitive** : Menu de navigation avec pages multiples
- **Formulaire de contact** : Avec validation côté client et serveur
- **API REST** : Endpoints pour gérer les messages et statistiques
- **Base de données** : Configuration MySQL avec PDO
- **Sécurité** : Protection CSRF, validation des données
- **Responsive** : Compatible mobile et desktop

## 📁 Structure du projet

```
/
├── index.php              # Page d'accueil
├── about.php              # Page à propos
├── contact.php            # Page de contact
├── assets/
│   ├── css/
│   │   └── style.css      # Styles CSS
│   └── js/
│       └── script.js      # Scripts JavaScript
├── config/
│   └── database.php       # Configuration base de données
├── includes/
│   └── functions.php      # Fonctions utilitaires
├── api/
│   ├── messages.php       # API pour les messages
│   └── stats.php          # API pour les statistiques
└── nbproject/             # Configuration NetBeans
```

## 🛠️ Installation

1. **Cloner le projet** dans votre serveur web local
2. **Configurer la base de données** :
   - Créer une base de données MySQL nommée `mon_projet_php`
   - Modifier les paramètres dans `config/database.php` si nécessaire
3. **Démarrer votre serveur web** (Apache/Nginx avec PHP 8.3+)
4. **Accéder au site** via votre navigateur

## 🔧 Configuration

### Base de données

Modifiez les paramètres dans `config/database.php` :

```php
private $host = 'localhost';
private $db_name = 'mon_projet_php';
private $username = 'root';
private $password = '';
```

### Serveur web

Le projet est configuré pour fonctionner sur le port 8000 par défaut (voir `nbproject/private/private.properties`).

## 📱 Pages disponibles

- **Accueil** (`index.php`) : Page principale avec démonstrations PHP
- **À propos** (`about.php`) : Informations techniques et système
- **Contact** (`contact.php`) : Formulaire de contact fonctionnel

## 🔌 API Endpoints

### Messages
- `GET /api/messages.php` : Récupérer tous les messages
- `POST /api/messages.php` : Envoyer un nouveau message

### Statistiques
- `GET /api/stats.php` : Obtenir les statistiques du site

## 🎨 Fonctionnalités CSS

- Design moderne avec dégradés
- Animations et transitions fluides
- Système de grille responsive
- Effets de survol interactifs
- Thème cohérent avec variables CSS

## ⚡ Fonctionnalités JavaScript

- Animations au scroll
- Validation de formulaire en temps réel
- Effets de parallaxe
- Mise à jour de l'heure en temps réel
- Particules d'animation

## 🔒 Sécurité

- Protection CSRF
- Validation et nettoyage des données
- Requêtes préparées (PDO)
- Échappement HTML
- Validation côté serveur

## 📊 Fonctionnalités avancées

- Logging des erreurs
- Suivi des visiteurs
- Statistiques en temps réel
- API REST complète
- Gestion des sessions

## 🌐 Compatibilité

- **PHP** : 8.3+ (compatible versions antérieures)
- **Base de données** : MySQL 5.7+
- **Navigateurs** : Tous les navigateurs modernes
- **Responsive** : Mobile, tablette, desktop

## 📝 Utilisation

1. **Page d'accueil** : Présente les fonctionnalités avec des démonstrations PHP dynamiques
2. **Page à propos** : Affiche les informations techniques et système
3. **Page contact** : Permet aux visiteurs d'envoyer des messages via un formulaire sécurisé

## 🚀 Développement

Le projet utilise une architecture modulaire avec :
- Séparation des préoccupations
- Code réutilisable
- Configuration centralisée
- API REST pour l'extensibilité

## 📞 Support

Pour toute question ou problème, utilisez le formulaire de contact du site ou consultez la documentation dans le code.

---

**Développé avec ❤️ en PHP**