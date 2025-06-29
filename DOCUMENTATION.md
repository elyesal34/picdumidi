# Documentation Complète - Mon Projet PHP (Node.js)

## 📋 Table des matières

1. [Vue d'ensemble](#vue-densemble)
2. [Architecture du projet](#architecture-du-projet)
3. [Installation et démarrage](#installation-et-démarrage)
4. [Structure des fichiers](#structure-des-fichiers)
5. [Fonctionnalités détaillées](#fonctionnalités-détaillées)
6. [API REST](#api-rest)
7. [Base de données](#base-de-données)
8. [Interface utilisateur](#interface-utilisateur)
9. [Sécurité](#sécurité)
10. [Maintenance et développement](#maintenance-et-développement)

---

## 🎯 Vue d'ensemble

Ce projet est une application web moderne développée en **Node.js avec Express.js**, convertie depuis un projet PHP original. Il s'agit d'un site web complet avec un système de gestion de contenu, un formulaire de contact fonctionnel, une API REST et une interface utilisateur responsive.

### Caractéristiques principales :
- **Framework** : Express.js (Node.js)
- **Moteur de templates** : EJS
- **Base de données** : SQLite
- **Frontend** : HTML5, CSS3, JavaScript vanilla
- **Architecture** : MVC (Model-View-Controller)

---

## 🏗️ Architecture du projet

Le projet suit une architecture **MVC** avec séparation claire des responsabilités :

```
├── server.js              # Point d'entrée principal (Controller)
├── config/
│   └── database.js         # Gestion base de données (Model)
├── views/                  # Templates EJS (View)
├── assets/                 # Ressources statiques
└── package.json           # Configuration Node.js
```

### Flux de données :
1. **Requête HTTP** → `server.js` (routeur principal)
2. **Traitement** → Logique métier + Base de données
3. **Rendu** → Templates EJS avec données
4. **Réponse** → HTML + CSS + JS au client

---

## 🚀 Installation et démarrage

### Prérequis
- **Node.js** version 16+ 
- **npm** (inclus avec Node.js)

### Installation

1. **Cloner ou télécharger le projet**
```bash
# Si vous avez git
git clone [url-du-projet]
cd mon-projet-php-nodejs
```

2. **Installer les dépendances**
```bash
npm install
```

3. **Démarrer le serveur**
```bash
# Mode production
npm start

# Mode développement (avec rechargement automatique)
npm run dev
```

4. **Accéder à l'application**
- Ouvrir votre navigateur
- Aller à : `http://localhost:8000`

### Vérification de l'installation
Si tout fonctionne correctement, vous devriez voir :
- ✅ Message "Serveur démarré sur http://localhost:8000"
- ✅ Message "Base de données initialisée"
- ✅ Page d'accueil accessible dans le navigateur

---

## 📁 Structure des fichiers

### Fichiers principaux

#### `server.js` - Serveur principal
**Rôle** : Point d'entrée de l'application, gestion des routes et middleware

**Fonctionnalités** :
- Configuration Express.js
- Définition des routes (`/`, `/about`, `/contact`)
- API REST (`/api/messages`, `/api/stats`)
- Middleware de sécurité (Helmet, CORS)
- Fonctions utilitaires intégrées

**Code clé** :
```javascript
// Configuration du serveur
const app = express();
const PORT = process.env.PORT || 8000;

// Routes principales
app.get('/', (req, res) => { /* Page d'accueil */ });
app.get('/about', (req, res) => { /* Page à propos */ });
app.get('/contact', (req, res) => { /* Formulaire contact */ });
```

#### `config/database.js` - Gestion base de données
**Rôle** : Interface avec la base de données SQLite

**Fonctionnalités** :
- Connexion SQLite
- Création automatique des tables
- Méthodes CRUD (Create, Read, Update, Delete)
- Gestion des erreurs

**Méthodes principales** :
```javascript
init()              // Initialisation de la DB
createTables()      // Création des tables
saveMessage()       // Sauvegarder un message
getMessages()       // Récupérer les messages
getStats()          // Statistiques du site
```

#### `package.json` - Configuration Node.js
**Rôle** : Définition du projet et des dépendances

**Dépendances principales** :
- `express` : Framework web
- `ejs` : Moteur de templates
- `sqlite3` : Base de données
- `body-parser` : Parsing des requêtes
- `cors` : Gestion CORS
- `helmet` : Sécurité HTTP

### Dossier `views/` - Templates

#### `index.ejs` - Page d'accueil
- Hero section avec statistiques dynamiques
- Démonstration de fonctionnalités JavaScript
- Calculs dynamiques côté serveur

#### `about.ejs` - Page à propos
- Informations techniques du système
- Liste des technologies utilisées
- Statistiques du projet

#### `contact.ejs` - Formulaire de contact
- Formulaire avec validation
- Gestion des messages d'erreur/succès
- Informations de contact statiques

### Dossier `assets/` - Ressources statiques

#### `assets/css/style.css` - Styles CSS
**Fonctionnalités** :
- Design responsive (mobile-first)
- Animations CSS3 et transitions
- Système de grille moderne
- Variables CSS pour la cohérence
- Thème sombre/clair

**Sections principales** :
```css
/* Navigation sticky */
.navbar { /* ... */ }

/* Hero section avec dégradés */
.hero { /* ... */ }

/* Cartes de fonctionnalités */
.feature-card { /* ... */ }

/* Formulaires stylisés */
.contact-form { /* ... */ }
```

#### `assets/js/script.js` - JavaScript frontend
**Fonctionnalités** :
- Animations au scroll (Intersection Observer)
- Validation de formulaire en temps réel
- Effets visuels (parallaxe, particules)
- Mise à jour de l'heure en direct
- Smooth scrolling

---

## ⚡ Fonctionnalités détaillées

### 1. Page d'accueil (`/`)
**Objectif** : Présenter le projet avec des démonstrations interactives

**Fonctionnalités** :
- **Hero section** : Titre animé avec statistiques en temps réel
- **Cartes de fonctionnalités** : Présentation des capacités
- **Démonstration JavaScript** : 
  - Liste de fruits avec couleurs dynamiques
  - Calculs mathématiques côté serveur
- **Animations** : Effets de scroll et transitions

**Données dynamiques** :
```javascript
// Générées côté serveur
currentYear: 2024
currentTime: "14:30:25"
nodeVersion: "v18.17.0"
fruits: ['Pomme', 'Banane', 'Orange', 'Fraise', 'Kiwi']
```

### 2. Page à propos (`/about`)
**Objectif** : Informations techniques et système

**Sections** :
- **Technologies utilisées** : Node.js, Express, EJS, etc.
- **Informations système** : OS, version Node.js, serveur
- **Statistiques projet** : Nombre de fichiers, lignes de code

**Données système récupérées** :
```javascript
process.platform    // Système d'exploitation
process.version     // Version Node.js
process.memoryUsage() // Utilisation mémoire
```

### 3. Formulaire de contact (`/contact`)
**Objectif** : Permettre aux visiteurs d'envoyer des messages

**Fonctionnalités** :
- **Validation côté client** : JavaScript en temps réel
- **Validation côté serveur** : Sécurisation des données
- **Sauvegarde en base** : Messages stockés dans SQLite
- **Feedback utilisateur** : Messages de succès/erreur
- **Persistance des données** : Formulaire pré-rempli en cas d'erreur

**Processus de traitement** :
1. Soumission du formulaire (POST `/contact`)
2. Validation des champs obligatoires
3. Nettoyage et sécurisation des données
4. Sauvegarde en base de données
5. Affichage du message de confirmation

---

## 🔌 API REST

L'application expose une API REST complète pour l'intégration avec d'autres services.

### Endpoints disponibles

#### `GET /api/messages`
**Objectif** : Récupérer tous les messages de contact

**Réponse** :
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "nom": "Jean Dupont",
      "email": "jean@example.com",
      "sujet": "Question technique",
      "message": "Bonjour, j'ai une question...",
      "date_creation": "2024-01-15 14:30:25"
    }
  ],
  "total": 1
}
```

#### `POST /api/messages`
**Objectif** : Envoyer un nouveau message

**Données requises** :
```json
{
  "nom": "string (requis)",
  "email": "string (requis, format email)",
  "sujet": "string (optionnel)",
  "message": "string (requis)"
}
```

**Réponse succès** :
```json
{
  "success": true,
  "message": "Message envoyé avec succès",
  "id": 2
}
```

**Réponse erreur** :
```json
{
  "success": false,
  "errors": ["Le nom est requis", "Un email valide est requis"]
}
```

#### `GET /api/stats`
**Objectif** : Obtenir les statistiques du site

**Réponse** :
```json
{
  "success": true,
  "data": {
    "total_messages": 5,
    "total_visites": 150,
    "visites_aujourd_hui": 12,
    "node_version": "v18.17.0",
    "serveur": "Express.js",
    "date_actuelle": "2024-01-15T14:30:25.000Z",
    "memoire_utilisee": 25165824,
    "memoire_pic": 50331648
  }
}
```

### Utilisation de l'API

**Avec JavaScript (fetch)** :
```javascript
// Récupérer les messages
fetch('/api/messages')
  .then(response => response.json())
  .then(data => console.log(data));

// Envoyer un message
fetch('/api/messages', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json'
  },
  body: JSON.stringify({
    nom: 'Jean Dupont',
    email: 'jean@example.com',
    message: 'Mon message'
  })
});
```

**Avec curl** :
```bash
# GET messages
curl http://localhost:8000/api/messages

# POST nouveau message
curl -X POST http://localhost:8000/api/messages \
  -H "Content-Type: application/json" \
  -d '{"nom":"Jean","email":"jean@test.com","message":"Test"}'
```

---

## 🗄️ Base de données

### Système utilisé : SQLite
**Avantages** :
- ✅ Pas de serveur séparé requis
- ✅ Fichier unique (`database.sqlite`)
- ✅ Parfait pour le développement
- ✅ Performances excellentes pour ce type d'application

### Structure des tables

#### Table `messages`
```sql
CREATE TABLE messages (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom TEXT NOT NULL,
    email TEXT NOT NULL,
    sujet TEXT,
    message TEXT NOT NULL,
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

**Utilisation** : Stockage des messages du formulaire de contact

#### Table `visiteurs`
```sql
CREATE TABLE visiteurs (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    ip_address TEXT,
    user_agent TEXT,
    page_visitee TEXT,
    date_visite DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

**Utilisation** : Tracking des visites (fonctionnalité préparée)

### Gestion des données

**Création automatique** :
- Les tables sont créées automatiquement au démarrage
- Pas de migration manuelle nécessaire

**Sauvegarde** :
- Le fichier `database.sqlite` contient toutes les données
- Sauvegarde simple : copier ce fichier

**Réinitialisation** :
- Supprimer `database.sqlite` pour repartir à zéro
- Les tables seront recréées au prochain démarrage

---

## 🎨 Interface utilisateur

### Design System

#### Couleurs principales
```css
:root {
  --primary: #667eea;      /* Bleu principal */
  --secondary: #764ba2;    /* Violet secondaire */
  --success: #28a745;      /* Vert succès */
  --error: #dc3545;        /* Rouge erreur */
  --background: #f8f9fa;   /* Fond clair */
  --text: #333;            /* Texte principal */
}
```

#### Typographie
- **Police principale** : 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
- **Hiérarchie** : H1 (3rem) → H2 (2.5rem) → H3 (1.3rem)
- **Espacement** : Line-height 1.6 pour la lisibilité

#### Responsive Design
```css
/* Mobile first */
@media (max-width: 768px) { /* Tablettes */ }
@media (max-width: 480px) { /* Mobiles */ }
```

### Composants UI

#### Navigation
- **Sticky header** : Reste visible au scroll
- **Active state** : Indication de la page courante
- **Hover effects** : Transitions fluides

#### Cartes (Feature Cards)
- **Shadow system** : Élévation progressive
- **Hover animations** : Transform et shadow
- **Grid responsive** : Auto-fit avec minmax

#### Formulaires
- **Validation visuelle** : Bordures colorées (vert/rouge)
- **Focus states** : Indication claire du champ actif
- **Error handling** : Messages contextuels

### Animations et interactions

#### Scroll animations
```javascript
// Intersection Observer pour les animations
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.style.opacity = '1';
      entry.target.style.transform = 'translateY(0)';
    }
  });
});
```

#### Effets visuels
- **Parallax** : Hero section avec défilement différentiel
- **Particules** : Animation de fond subtile
- **Typing effect** : Animation du titre principal
- **Smooth scroll** : Navigation fluide entre sections

---

## 🔒 Sécurité

### Mesures implémentées

#### Helmet.js
```javascript
app.use(helmet());
```
**Protection contre** :
- XSS (Cross-Site Scripting)
- Clickjacking
- MIME type sniffing
- DNS prefetch control

#### CORS (Cross-Origin Resource Sharing)
```javascript
app.use(cors());
```
**Permet** : Requêtes API depuis d'autres domaines

#### Validation des données
```javascript
// Nettoyage des entrées utilisateur
securizeData: (data) => {
    return data.trim().replace(/[<>]/g, '');
}

// Validation email
validateEmail: (email) => {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}
```

#### Requêtes préparées
```javascript
// Protection contre l'injection SQL
this.db.run(query, [nom, email, sujet, message], callback);
```

### Bonnes pratiques appliquées

1. **Validation côté client ET serveur**
2. **Échappement des données HTML**
3. **Limitation des données acceptées**
4. **Gestion d'erreurs sécurisée** (pas d'exposition d'informations sensibles)
5. **Headers de sécurité HTTP**

---

## 🛠️ Maintenance et développement

### Structure de développement

#### Mode développement
```bash
npm run dev
```
**Avantages** :
- Rechargement automatique (nodemon)
- Messages de debug détaillés
- Pas de cache agressif

#### Mode production
```bash
npm start
```
**Optimisations** :
- Gestion d'erreurs robuste
- Logging minimal
- Performance optimisée

### Ajout de fonctionnalités

#### Nouvelle route
```javascript
// Dans server.js
app.get('/nouvelle-page', (req, res) => {
    res.render('nouvelle-page', {
        title: 'Nouvelle Page',
        data: 'vos données'
    });
});
```

#### Nouveau template
```html
<!-- views/nouvelle-page.ejs -->
<!DOCTYPE html>
<html>
<head>
    <title><%= title %></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <!-- Votre contenu -->
</body>
</html>
```

#### Nouvelle méthode base de données
```javascript
// Dans config/database.js
async nouvelleMethode(parametres) {
    return new Promise((resolve, reject) => {
        const query = 'SELECT * FROM table WHERE condition = ?';
        this.db.all(query, [parametres], (err, rows) => {
            if (err) reject(err);
            else resolve(rows);
        });
    });
}
```

### Débogage

#### Logs utiles
```javascript
console.log('Serveur démarré sur port:', PORT);
console.log('Base de données initialisée');
console.error('Erreur:', error.message);
```

#### Vérification base de données
```bash
# Installer sqlite3 CLI
npm install -g sqlite3

# Examiner la base
sqlite3 database.sqlite
.tables
SELECT * FROM messages;
```

### Déploiement

#### Préparation
1. **Variables d'environnement** :
```javascript
const PORT = process.env.PORT || 8000;
```

2. **Optimisation des assets** :
- Minification CSS/JS
- Compression des images
- Cache headers

#### Plateformes recommandées
- **Heroku** : Déploiement simple avec git
- **Railway** : Alternative moderne
- **DigitalOcean** : VPS avec plus de contrôle

### Monitoring

#### Métriques importantes
- Temps de réponse des pages
- Nombre de messages reçus
- Erreurs serveur (500)
- Utilisation mémoire

#### Outils recommandés
- **PM2** : Gestionnaire de processus
- **Winston** : Logging avancé
- **New Relic** : Monitoring APM

---

## 📞 Support et ressources

### Documentation officielle
- [Node.js](https://nodejs.org/docs/)
- [Express.js](https://expressjs.com/)
- [EJS Templates](https://ejs.co/)
- [SQLite](https://www.sqlite.org/docs.html)

### Commandes utiles
```bash
# Vérifier la version Node.js
node --version

# Installer les dépendances
npm install

# Démarrer en mode développement
npm run dev

# Vérifier les vulnérabilités
npm audit

# Mettre à jour les dépendances
npm update
```

### Résolution de problèmes courants

#### "Port already in use"
```bash
# Trouver le processus utilisant le port 8000
lsof -i :8000
# Tuer le processus
kill -9 [PID]
```

#### "Module not found"
```bash
# Réinstaller les dépendances
rm -rf node_modules package-lock.json
npm install
```

#### Base de données corrompue
```bash
# Supprimer et recréer
rm database.sqlite
npm start
```

---

**Cette documentation couvre tous les aspects du projet. Pour toute question spécifique, consultez le code source ou utilisez le formulaire de contact de l'application.**