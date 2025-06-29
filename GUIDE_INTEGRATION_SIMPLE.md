# 🚀 Guide d'intégration simple - Étape par étape

## ✅ **ÉTAPE 1 : Votre projet est déployé !**
URL de votre projet : `https://picdumidi-production.up.railway.app/`

## 📁 **ÉTAPE 2 : Ajouter les fichiers dans votre portfolio**

Dans votre projet portfolio (`https://github.com/elyesal34/portfolio_V0`), créez cette structure :

```
src/
├── components/
│   └── ProjectCard/
│       ├── ProjectCard.jsx
│       └── ProjectCard.css
```

## 📝 **ÉTAPE 3 : Copier les fichiers**

1. **Copiez le contenu de `portfolio-integration/ProjectCard.jsx`** dans votre nouveau fichier
2. **Copiez le contenu de `portfolio-integration/ProjectCard.css`** dans votre nouveau fichier

## 🔧 **ÉTAPE 4 : Vérifier l'URL**

Dans `ProjectCard.jsx`, ligne 8, vérifiez que vous avez :
```jsx
const projectUrl = 'https://picdumidi-production.up.railway.app';
```

## 🎨 **ÉTAPE 5 : Intégrer dans votre portfolio**

Dans votre fichier principal (probablement `App.jsx` ou un composant Projects), ajoutez :

```jsx
// En haut du fichier
import ProjectCard from './components/ProjectCard/ProjectCard';

// Dans votre section "Productions & Réalisations"
<div className="projects-section">
  <h2>Productions & Réalisations</h2>
  <div className="projects-grid">
    
    {/* Votre nouveau projet Node.js */}
    <ProjectCard />
    
    {/* Vos autres projets existants */}
    
  </div>
</div>
```

## 🚀 **ÉTAPE 6 : Tester et déployer**

1. **Test local** : `npm run dev` dans votre portfolio
2. **Vérifier** que la carte projet s'affiche
3. **Tester** les boutons (modal et lien externe)
4. **Push sur GitHub** : Netlify redéploiera automatiquement

## 🎯 **Résultat final**

Vos visiteurs sur `https://elyes-allani.netlify.app/` verront :
- Une belle carte de votre projet dans "Productions & Réalisations"
- Un bouton "Voir la démo" qui ouvre une modal avec votre projet
- Un bouton "Site live" qui ouvre votre projet en plein écran

---

## 🆘 **Besoin d'aide ?**

Si vous êtes bloqué à une étape, dites-moi où exactement et je vous aiderai !