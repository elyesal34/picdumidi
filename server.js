const express = require('express');
const bodyParser = require('body-parser');
const path = require('path');
const cors = require('cors');
const helmet = require('helmet');
const Database = require('./config/database');

const app = express();
const PORT = process.env.PORT || 8000;

// Configuration de la base de données
const db = new Database();

// Middleware
app.use(helmet());
app.use(cors());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());
app.use(express.static('assets'));

// Configuration du moteur de template
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));

// Fonctions utilitaires
const utils = {
    getCurrentYear: () => new Date().getFullYear(),
    getCurrentTime: () => new Date().toLocaleTimeString('fr-FR'),
    getPhpVersion: () => 'Node.js ' + process.version,
    formatDate: (date = new Date()) => {
        return date.toLocaleDateString('fr-FR', {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        });
    },
    securizeData: (data) => {
        if (typeof data !== 'string') return data;
        return data.trim().replace(/[<>]/g, '');
    },
    validateEmail: (email) => {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
};

// Routes principales
app.get('/', (req, res) => {
    const fruits = ['Pomme', 'Banane', 'Orange', 'Fraise', 'Kiwi'];
    const colors = ['#ff6b6b', '#4ecdc4', '#45b7d1', '#96ceb4', '#feca57'];
    
    const nombre1 = 15;
    const nombre2 = 25;
    const resultat = nombre1 + nombre2;
    
    res.render('index', {
        title: 'Mon Projet PHP',
        currentYear: utils.getCurrentYear(),
        currentTime: utils.getCurrentTime(),
        nodeVersion: process.version,
        fruits,
        colors,
        nombre1,
        nombre2,
        resultat
    });
});

app.get('/about', (req, res) => {
    const technologies = {
        'Node.js': process.version,
        'HTML5': 'Dernière version',
        'CSS3': 'Avec Flexbox et Grid',
        'JavaScript': 'ES6+',
        'Express': 'Framework web'
    };
    
    const systemInfo = {
        'Système d\'exploitation': process.platform,
        'Version Node.js': process.version,
        'Serveur web': 'Express.js',
        'Date de création': utils.formatDate(),
        'Fuseau horaire': Intl.DateTimeFormat().resolvedOptions().timeZone
    };
    
    const stats = {
        'Fichiers JS': '10+',
        'Lignes de code': Math.floor(Math.random() * 500) + 500,
        'Dernière mise à jour': utils.formatDate()
    };
    
    res.render('about', {
        title: 'À propos - Mon Projet PHP',
        technologies,
        systemInfo,
        stats,
        currentYear: utils.getCurrentYear()
    });
});

app.get('/contact', (req, res) => {
    res.render('contact', {
        title: 'Contact - Mon Projet PHP',
        message: '',
        messageType: '',
        formData: {},
        currentYear: utils.getCurrentYear(),
        serverTime: utils.formatDate()
    });
});

app.post('/contact', async (req, res) => {
    const { nom, email, sujet, message } = req.body;
    let responseMessage = '';
    let messageType = '';
    
    // Validation
    if (!nom || !email || !message) {
        responseMessage = 'Veuillez remplir tous les champs obligatoires.';
        messageType = 'error';
    } else if (!utils.validateEmail(email)) {
        responseMessage = 'Veuillez entrer une adresse email valide.';
        messageType = 'error';
    } else {
        try {
            // Sauvegarder le message en base de données
            await db.saveMessage({
                nom: utils.securizeData(nom),
                email: utils.securizeData(email),
                sujet: utils.securizeData(sujet || ''),
                message: utils.securizeData(message)
            });
            
            responseMessage = `Merci ${nom} ! Votre message a été envoyé avec succès.`;
            messageType = 'success';
        } catch (error) {
            console.error('Erreur lors de la sauvegarde:', error);
            responseMessage = 'Une erreur est survenue lors de l\'envoi du message.';
            messageType = 'error';
        }
    }
    
    res.render('contact', {
        title: 'Contact - Mon Projet PHP',
        message: responseMessage,
        messageType,
        formData: req.body,
        currentYear: utils.getCurrentYear(),
        serverTime: utils.formatDate()
    });
});

// API Routes
app.get('/api/messages', async (req, res) => {
    try {
        const messages = await db.getMessages();
        res.json({
            success: true,
            data: messages,
            total: messages.length
        });
    } catch (error) {
        res.status(500).json({
            success: false,
            error: 'Erreur lors de la récupération des messages'
        });
    }
});

app.post('/api/messages', async (req, res) => {
    const { nom, email, sujet, message } = req.body;
    
    // Validation
    const errors = [];
    if (!nom) errors.push('Le nom est requis');
    if (!email || !utils.validateEmail(email)) errors.push('Un email valide est requis');
    if (!message) errors.push('Le message est requis');
    
    if (errors.length > 0) {
        return res.status(400).json({
            success: false,
            errors
        });
    }
    
    try {
        const messageId = await db.saveMessage({
            nom: utils.securizeData(nom),
            email: utils.securizeData(email),
            sujet: utils.securizeData(sujet || ''),
            message: utils.securizeData(message)
        });
        
        res.json({
            success: true,
            message: 'Message envoyé avec succès',
            id: messageId
        });
    } catch (error) {
        res.status(500).json({
            success: false,
            error: 'Erreur lors de l\'envoi du message'
        });
    }
});

app.get('/api/stats', async (req, res) => {
    try {
        const stats = await db.getStats();
        
        res.json({
            success: true,
            data: {
                ...stats,
                node_version: process.version,
                serveur: 'Express.js',
                date_actuelle: new Date().toISOString(),
                fuseau_horaire: Intl.DateTimeFormat().resolvedOptions().timeZone,
                memoire_utilisee: process.memoryUsage().heapUsed,
                memoire_pic: process.memoryUsage().heapTotal
            }
        });
    } catch (error) {
        res.status(500).json({
            success: false,
            error: 'Erreur lors de la récupération des statistiques'
        });
    }
});

// Démarrage du serveur
app.listen(PORT, () => {
    console.log(`Serveur démarré sur http://localhost:${PORT}`);
    db.init().then(() => {
        console.log('Base de données initialisée');
    }).catch(err => {
        console.error('Erreur d\'initialisation de la base de données:', err);
    });
});