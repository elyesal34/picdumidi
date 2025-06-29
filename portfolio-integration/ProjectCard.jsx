import React, { useState } from 'react';
import './ProjectCard.css';

const ProjectCard = () => {
  const [isModalOpen, setIsModalOpen] = useState(false);
  const [isLoading, setIsLoading] = useState(false);

  // ⚠️ IMPORTANT: Remplacez par votre URL Railway après déploiement
  const projectUrl = 'https://votre-projet.up.railway.app';

  const openProject = () => {
    setIsModalOpen(true);
    setIsLoading(true);
  };

  const closeProject = () => {
    setIsModalOpen(false);
    setIsLoading(false);
  };

  const handleIframeLoad = () => {
    setIsLoading(false);
  };

  const openInNewTab = () => {
    window.open(projectUrl, '_blank', 'noopener,noreferrer');
  };

  return (
    <>
      {/* Carte projet pour la section "Productions & Réalisations" */}
      <div className="project-card-portfolio">
        <div className="project-image">
          <div className="project-overlay">
            <div className="project-tech-stack">
              <span className="tech-badge">Node.js</span>
              <span className="tech-badge">Express</span>
              <span className="tech-badge">SQLite</span>
            </div>
          </div>
          <div className="project-icon-large">
            <span>🚀</span>
          </div>
        </div>
        
        <div className="project-content">
          <h3 className="project-title">Application Web PHP → Node.js</h3>
          <p className="project-description">
            Conversion complète d'une application PHP vers Node.js avec Express, 
            incluant formulaire de contact, API REST et interface responsive moderne.
          </p>
          
          <div className="project-features">
            <div className="feature-item">
              <span className="feature-icon">✓</span>
              <span>Interface responsive avec animations</span>
            </div>
            <div className="feature-item">
              <span className="feature-icon">✓</span>
              <span>API REST complète</span>
            </div>
            <div className="feature-item">
              <span className="feature-icon">✓</span>
              <span>Base de données SQLite</span>
            </div>
          </div>
          
          <div className="project-actions">
            <button 
              onClick={openProject} 
              className="btn-demo"
            >
              <span className="btn-icon">👁️</span>
              Voir la démo
            </button>
            <button 
              onClick={openInNewTab} 
              className="btn-live"
            >
              <span className="btn-icon">🔗</span>
              Site live
            </button>
          </div>
        </div>
      </div>

      {/* Modal de démonstration */}
      {isModalOpen && (
        <div className="demo-modal" onClick={closeProject}>
          <div className="modal-container" onClick={(e) => e.stopPropagation()}>
            <div className="modal-header">
              <div className="modal-title-section">
                <h4>Application Web PHP → Node.js</h4>
                <p>Démonstration interactive</p>
              </div>
              <button className="modal-close" onClick={closeProject}>
                ✕
              </button>
            </div>
            
            <div className="modal-body">
              {isLoading && (
                <div className="loading-screen">
                  <div className="loading-animation">
                    <div className="loading-spinner"></div>
                    <h3>Chargement de l'application...</h3>
                    <p>Initialisation du serveur Node.js</p>
                  </div>
                </div>
              )}
              
              <iframe
                src={projectUrl}
                width="100%"
                height="100%"
                frameBorder="0"
                title="Application Web PHP → Node.js"
                onLoad={handleIframeLoad}
                style={{ display: isLoading ? 'none' : 'block' }}
                allow="fullscreen"
              />
            </div>
            
            <div className="modal-footer">
              <div className="project-info">
                <div className="status-online">
                  <span className="status-dot"></span>
                  Application en ligne
                </div>
                <div className="tech-info">
                  Node.js • Express • SQLite • EJS
                </div>
              </div>
              <button onClick={openInNewTab} className="btn-fullscreen">
                Ouvrir en plein écran
              </button>
            </div>
          </div>
        </div>
      )}
    </>
  );
};

export default ProjectCard;