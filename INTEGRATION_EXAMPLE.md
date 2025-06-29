# 🎯 Exemple d'intégration dans votre portfolio

## Code à ajouter dans votre App.jsx ou composant Projects

```jsx
import React from 'react';
import ProjectLauncher from './components/ProjectLauncher/ProjectLauncher';

// Option 1: Intégration dans une section projets existante
function Projects() {
  return (
    <section className="projects-section">
      <div className="container">
        <h2>Mes Projets</h2>
        <div className="projects-grid">
          
          {/* Votre projet Node.js */}
          <ProjectLauncher />
          
          {/* Vos autres projets existants */}
          <div className="project-card">
            <h3>Autre Projet</h3>
            {/* ... */}
          </div>
          
        </div>
      </div>
    </section>
  );
}

// Option 2: Page dédiée au projet
function MonProjetPHP() {
  return (
    <div className="project-page">
      <div className="container">
        <div className="page-header">
          <h1>Mon Projet PHP (Node.js)</h1>
          <p>Découvrez cette application web complète</p>
        </div>
        
        <ProjectLauncher />
        
        <div className="project-details">
          <h2>Détails techniques</h2>
          <p>Ce projet démontre mes compétences en développement full-stack...</p>
        </div>
      </div>
    </div>
  );
}

export default Projects; // ou MonProjetPHP
```

## CSS pour harmoniser avec votre portfolio

```css
/* Ajoutez ces styles dans votre CSS principal pour une meilleure intégration */

.projects-section {
  padding: 4rem 0;
  background: #f8f9fa;
}

.projects-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
  gap: 2rem;
  margin-top: 3rem;
}

.project-page {
  padding: 2rem 0;
  min-height: 100vh;
}

.page-header {
  text-align: center;
  margin-bottom: 3rem;
}

.page-header h1 {
  font-size: 2.5rem;
  color: #2d3748;
  margin-bottom: 1rem;
}

.page-header p {
  font-size: 1.2rem;
  color: #718096;
}

.project-details {
  margin-top: 4rem;
  padding: 2rem;
  background: white;
  border-radius: 16px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

/* Responsive */
@media (max-width: 768px) {
  .projects-grid {
    grid-template-columns: 1fr;
    gap: 1.5rem;
  }
  
  .page-header h1 {
    font-size: 2rem;
  }
}
```

## Structure de fichiers recommandée

```
src/
├── components/
│   ├── ProjectLauncher/
│   │   ├── ProjectLauncher.jsx
│   │   └── ProjectLauncher.css
│   └── ... (vos autres composants)
├── pages/
│   ├── Projects.jsx (ou MonProjetPHP.jsx)
│   └── ... (vos autres pages)
├── App.jsx
└── main.jsx
```

## Import dans votre App.jsx principal

```jsx
import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Projects from './pages/Projects';
// ou import MonProjetPHP from './pages/MonProjetPHP';

function App() {
  return (
    <Router>
      <div className="App">
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/projects" element={<Projects />} />
          {/* ou <Route path="/mon-projet-php" element={<MonProjetPHP />} /> */}
          <Route path="/about" element={<About />} />
          <Route path="/contact" element={<Contact />} />
        </Routes>
      </div>
    </Router>
  );
}

export default App;
```

## Navigation (si vous voulez ajouter un lien dans votre menu)

```jsx
// Dans votre composant Navigation
<nav>
  <Link to="/">Accueil</Link>
  <Link to="/projects">Projets</Link>
  {/* ou <Link to="/mon-projet-php">Mon Projet PHP</Link> */}
  <Link to="/about">À propos</Link>
  <Link to="/contact">Contact</Link>
</nav>
```

Cette intégration s'harmonisera parfaitement avec le style moderne de votre portfolio !