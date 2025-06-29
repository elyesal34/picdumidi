import React, { useState } from 'react';
import './ProjectLauncher.css';

const ProjectLauncher = () => {
  const [isModalOpen, setIsModalOpen] = useState(false);
  const [isLoading, setIsLoading] = useState(false);

  // ⚠️ IMPORTANT: Remplacez cette URL par votre URL Railway après déploiement
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
    <div className="project-launcher">
      {/* Carte du projet - Style adapté à votre portfolio */}
      <div className="project-card">
        <div className="project-header">
          <div className="project-icon">
            <span className="icon">🚀</span>
          </div>
          <div className="project-title">
            <h3>Mon Projet PHP (Node.js)</h3>
            <p className="project-subtitle">Application web complète</p>
          </div>
        </div>
        
        <div className="project-badges">
          <span className="badge nodejs">Node.js</span>
          <span className="badge express">Express</span>
          <span className="badge sqlite">SQLite</span>
          <span className="badge responsive">Responsive</span>
        </div>
        
        <div className="project-description">
          <p>Une application web moderne développée en Node.js avec Express, convertie depuis PHP :</p>
          <div className="features-list">
            <div className="feature">
              <span className="check">✓</span>
              <span>Interface responsive avec animations CSS3</span>
            </div>
            <div className="feature">
              <span className="check">✓</span>
              <span>Formulaire de contact avec validation</span>
            </div>
            <div className="feature">
              <span className="check">✓</span>
              <span>API REST complète (messages, statistiques)</span>
            </div>
            <div className="feature">
              <span className="check">✓</span>
              <span>Base de données SQLite intégrée</span>
            </div>
            <div className="feature">
              <span className="check">✓</span>
              <span>Système de navigation multi-pages</span>
            </div>
          </div>
        </div>

        <div className="project-tech-details">
          <div className="tech-section">
            <h4>Technologies utilisées</h4>
            <div className="tech-grid">
              <span>Express.js</span>
              <span>EJS Templates</span>
              <span>SQLite</span>
              <span>CSS3 Animations</span>
              <span>JavaScript ES6+</span>
              <span>Responsive Design</span>
            </div>
          </div>
        </div>

        <div className="project-actions">
          <button 
            onClick={openProject} 
            className="btn-launch primary"
          >
            <span className="btn-icon">🚀</span>
            <span>Lancer le projet</span>
          </button>
          <button 
            onClick={openInNewTab} 
            className="btn-launch secondary"
          >
            <span className="btn-icon">🔗</span>
            <span>Ouvrir en plein écran</span>
          </button>
        </div>
      </div>

      {/* Modal avec iframe - Design moderne */}
      {isModalOpen && (
        <div className="project-modal" onClick={closeProject}>
          <div className="modal-content" onClick={(e) => e.stopPropagation()}>
            <div className="modal-header">
              <div className="modal-title">
                <span className="modal-icon">🚀</span>
                <div>
                  <h4>Mon Projet PHP (Node.js)</h4>
                  <p>Application web complète</p>
                </div>
              </div>
              <button className="close-btn" onClick={closeProject}>
                <span>✕</span>
              </button>
            </div>
            
            <div className="modal-body">
              {isLoading && (
                <div className="loading-overlay">
                  <div className="loading-content">
                    <div className="spinner"></div>
                    <h3>Chargement du projet...</h3>
                    <p>Initialisation de l'application Node.js</p>
                  </div>
                </div>
              )}
              
              <iframe
                src={projectUrl}
                width="100%"
                height="100%"
                frameBorder="0"
                title="Mon Projet PHP (Node.js)"
                onLoad={handleIframeLoad}
                style={{ display: isLoading ? 'none' : 'block' }}
                allow="fullscreen"
              />
            </div>
            
            <div className="modal-footer">
              <div className="modal-info">
                <span className="status-indicator online"></span>
                <span>Application en ligne</span>
              </div>
              <button onClick={openInNewTab} className="btn-external">
                <span>🔗</span>
                <span>Ouvrir en plein écran</span>
              </button>
            </div>
          </div>
        </div>
      )}
    </div>
  );
};

export default ProjectLauncher;