# Guide de déploiement sur Railway

## 🚀 Étapes de déploiement

### 1. Créer un compte Railway
- Aller sur [railway.app](https://railway.app)
- Se connecter avec GitHub

### 2. Déployer le projet
1. Cliquer sur "New Project"
2. Sélectionner "Deploy from GitHub repo"
3. Choisir votre repository
4. Railway détectera automatiquement Node.js

### 3. Configuration automatique
- Railway utilisera automatiquement `npm start`
- Le port sera configuré via `process.env.PORT`
- La base de données SQLite sera créée automatiquement

### 4. Obtenir l'URL de déploiement
- Une fois déployé, vous obtiendrez une URL comme :
  `https://votre-projet-production.up.railway.app`

## 🔗 Intégration dans votre portfolio

### Code HTML à ajouter dans votre portfolio :

```html
<!-- Bouton de lancement -->
<div class="project-launch">
    <h3>Mon Projet PHP (Node.js)</h3>
    <p>Application web complète avec formulaire de contact et API REST</p>
    <a href="https://votre-projet-production.up.railway.app" 
       target="_blank" 
       class="btn-launch-project">
        🚀 Lancer le projet
    </a>
</div>
```

### CSS pour le bouton :

```css
.btn-launch-project {
    display: inline-block;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 12px 24px;
    text-decoration: none;
    border-radius: 8px;
    font-weight: bold;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.btn-launch-project:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
}
```

## 🔧 Variables d'environnement (optionnel)

Si vous voulez ajouter des variables d'environnement :
1. Dans Railway, aller dans l'onglet "Variables"
2. Ajouter vos variables (ex: `NODE_ENV=production`)

## 📊 Monitoring

Railway fournit automatiquement :
- Logs en temps réel
- Métriques de performance
- Redémarrages automatiques
- SSL/HTTPS gratuit

## 💰 Coûts

- **Gratuit** : 500 heures/mois (suffisant pour un portfolio)
- **Pro** : $5/mois pour usage illimité

## 🔄 Mises à jour automatiques

Chaque push sur votre branche principale déclenchera automatiquement un nouveau déploiement.