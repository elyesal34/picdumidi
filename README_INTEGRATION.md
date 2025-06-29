# Intégration dans votre portfolio React/Vite

## 📋 Instructions d'intégration

### 1. Ajouter les fichiers dans votre projet React

Copiez ces fichiers dans votre projet portfolio :
- `ProjectLauncher.jsx` → dans votre dossier `src/components/`
- `ProjectLauncher.css` → dans le même dossier

### 2. Importer et utiliser le composant

Dans votre fichier principal (ex: `App.jsx` ou dans une page de projets) :

```jsx
import ProjectLauncher from './components/ProjectLauncher';

function App() {
  return (
    <div className="App">
      {/* Vos autres composants */}
      
      <section className="projects-section">
        <h2>Mes Projets</h2>
        <ProjectLauncher />
        {/* Vos autres projets */}
      </section>
    </div>
  );
}
```

### 3. Mettre à jour l'URL du projet

Dans `ProjectLauncher.jsx`, ligne 7, remplacez :
```jsx
const projectUrl = 'https://votre-projet.up.railway.app';
```

Par votre vraie URL Railway une fois déployé.

### 4. Personnalisation (optionnel)

Vous pouvez personnaliser :
- Les couleurs dans le CSS pour matcher votre thème
- Le texte de description
- Les badges de technologies
- Les animations

## 🎨 Variantes d'intégration

### Option A : Dans une grille de projets
```jsx
<div className="projects-grid">
  <ProjectLauncher />
  <AutreProjet />
  <EncoreUnAutreProjet />
</div>
```

### Option B : Page dédiée
```jsx
// pages/MonProjetPHP.jsx
import ProjectLauncher from '../components/ProjectLauncher';

export default function MonProjetPHP() {
  return (
    <div className="project-page">
      <h1>Mon Projet PHP (Node.js)</h1>
      <ProjectLauncher />
    </div>
  );
}
```

### Option C : Modal uniquement
Si vous voulez juste un bouton simple :

```jsx
const openProject = () => {
  window.open('https://votre-projet.up.railway.app', '_blank');
};

<button onClick={openProject} className="simple-launch-btn">
  🚀 Voir le projet
</button>
```

## 🔧 Configuration Vite (si nécessaire)

Si vous avez des problèmes de CORS, ajoutez dans `vite.config.js` :

```js
export default defineConfig({
  // ... votre config existante
  server: {
    proxy: {
      '/api': {
        target: 'https://votre-projet.up.railway.app',
        changeOrigin: true,
        secure: true,
      }
    }
  }
});
```

## 📱 Responsive

Le composant est entièrement responsive et s'adapte :
- Desktop : Modal large avec iframe
- Tablet : Modal adaptée
- Mobile : Boutons empilés, modal optimisée

## ✨ Fonctionnalités incluses

- ✅ Aperçu en modal avec iframe
- ✅ Ouverture dans nouvel onglet
- ✅ Indicateur de chargement
- ✅ Design responsive
- ✅ Animations fluides
- ✅ Fermeture par clic extérieur
- ✅ Badges de technologies
- ✅ Description détaillée

## 🚀 Déploiement

1. **Déployez d'abord votre projet Node.js** sur Railway
2. **Mettez à jour l'URL** dans le composant
3. **Testez localement** avec `npm run dev`
4. **Déployez votre portfolio** sur Netlify

Votre portfolio sera alors accessible avec le projet intégré !