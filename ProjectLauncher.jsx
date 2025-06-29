import React, { useState } from 'react';
import './ProjectLauncher.css';

const ProjectLauncher = () => {
  const [isModalOpen, setIsModalOpen] = useState(false);
  const [isLoading, setIsLoading] = useState(false);

  const projectUrl = 'https://votre-projet.up.railway.app'; // À remplacer par votre URL Railway

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
      {/* Carte du projet */}
      <div className="project-card">
        <div className="project-header">
          <h3>Mon Projet PHP (Node.js)</h3>
          <div className="project-badges">
            <span className="badge">Node.js</span>
            <span className="badge">Express</span>
            <span className="badge">SQLite</span>
          </div>
        </div>
        
        <div className="project-description">
          <p>Application web complète avec :</p>
          <ul>
            <li>✅ Interface responsive moderne</li>
            <li>✅ Formulaire de contact fonctionnel</li>
            <li>✅ API REST complète</li>
            <li>✅ Base de données SQLite</li>
            <li>✅ Animations et interactions</li>
          </ul>
        </div>

        <div className="project-actions">
          <button 
            onClick={openProject} 
            className="btn-launch primary"
          >
            🚀 Lancer le projet
          </button>
          <button 
            onClick={openInNewTab} 
            className="btn-launch secondary"
          >
            🔗 Ouvrir dans un nouvel onglet
          </button>
        </div>
      </div>

      {/* Modal avec iframe */}
      {isModalOpen && (
        <div className="project-modal" onClick={closeProject}>
          <div className="modal-content" onClick={(e) => e.stopPropagation()}>
            <div className="modal-header">
              <h4>Mon Projet PHP (Node.js)</h4>
              <button className="close-btn" onClick={closeProject}>
                ✕
              </button>
            </div>
            
            <div className="modal-body">
              {isLoading && (
                <div className="loading-spinner">
                  <div className="spinner"></div>
                  <p>Chargement du projet...</p>
                </div>
              )}
              
              <iframe
                src={projectUrl}
                width="100%"
                height="600"
                frameBorder="0"
                title="Mon Projet PHP"
                onLoad={handleIframeLoad}
                style={{ display: isLoading ? 'none' : 'block' }}
              />
            </div>
            
            <div className="modal-footer">
              <button onClick={openInNewTab} className="btn-external">
                Ouvrir en plein écran
              </button>
            </div>
          </div>
        </div>
      )}
    </div>
  );
};

export default ProjectLauncher;