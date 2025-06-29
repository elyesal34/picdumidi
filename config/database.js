const sqlite3 = require('sqlite3').verbose();
const path = require('path');

class Database {
    constructor() {
        this.dbPath = path.join(__dirname, '..', 'database.sqlite');
        this.db = null;
    }
    
    async init() {
        return new Promise((resolve, reject) => {
            this.db = new sqlite3.Database(this.dbPath, (err) => {
                if (err) {
                    console.error('Erreur de connexion à la base de données:', err);
                    reject(err);
                } else {
                    console.log('Connecté à la base de données SQLite');
                    this.createTables().then(resolve).catch(reject);
                }
            });
        });
    }
    
    async createTables() {
        return new Promise((resolve, reject) => {
            const createMessagesTable = `
                CREATE TABLE IF NOT EXISTS messages (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    nom TEXT NOT NULL,
                    email TEXT NOT NULL,
                    sujet TEXT,
                    message TEXT NOT NULL,
                    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP
                )
            `;
            
            const createVisiteursTable = `
                CREATE TABLE IF NOT EXISTS visiteurs (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    ip_address TEXT,
                    user_agent TEXT,
                    page_visitee TEXT,
                    date_visite DATETIME DEFAULT CURRENT_TIMESTAMP
                )
            `;
            
            this.db.serialize(() => {
                this.db.run(createMessagesTable, (err) => {
                    if (err) {
                        console.error('Erreur création table messages:', err);
                        reject(err);
                        return;
                    }
                });
                
                this.db.run(createVisiteursTable, (err) => {
                    if (err) {
                        console.error('Erreur création table visiteurs:', err);
                        reject(err);
                        return;
                    }
                    resolve();
                });
            });
        });
    }
    
    async saveMessage(messageData) {
        return new Promise((resolve, reject) => {
            const query = `
                INSERT INTO messages (nom, email, sujet, message)
                VALUES (?, ?, ?, ?)
            `;
            
            this.db.run(query, [
                messageData.nom,
                messageData.email,
                messageData.sujet,
                messageData.message
            ], function(err) {
                if (err) {
                    reject(err);
                } else {
                    resolve(this.lastID);
                }
            });
        });
    }
    
    async getMessages() {
        return new Promise((resolve, reject) => {
            const query = 'SELECT * FROM messages ORDER BY date_creation DESC';
            
            this.db.all(query, [], (err, rows) => {
                if (err) {
                    reject(err);
                } else {
                    resolve(rows);
                }
            });
        });
    }
    
    async getStats() {
        return new Promise((resolve, reject) => {
            const queries = {
                totalMessages: 'SELECT COUNT(*) as count FROM messages',
                totalVisites: 'SELECT COUNT(*) as count FROM visiteurs',
                visitesAujourdhui: `SELECT COUNT(*) as count FROM visiteurs 
                                   WHERE date(date_visite) = date('now')`
            };
            
            const stats = {};
            let completed = 0;
            const total = Object.keys(queries).length;
            
            Object.entries(queries).forEach(([key, query]) => {
                this.db.get(query, [], (err, row) => {
                    if (err) {
                        stats[key] = 0;
                    } else {
                        stats[key] = row.count;
                    }
                    
                    completed++;
                    if (completed === total) {
                        resolve({
                            total_messages: stats.totalMessages,
                            total_visites: stats.totalVisites,
                            visites_aujourd_hui: stats.visitesAujourdhui
                        });
                    }
                });
            });
        });
    }
    
    async recordVisit(pageVisited, ipAddress, userAgent) {
        return new Promise((resolve, reject) => {
            const query = `
                INSERT INTO visiteurs (ip_address, user_agent, page_visitee)
                VALUES (?, ?, ?)
            `;
            
            this.db.run(query, [ipAddress, userAgent, pageVisited], function(err) {
                if (err) {
                    reject(err);
                } else {
                    resolve(this.lastID);
                }
            });
        });
    }
}

module.exports = Database;