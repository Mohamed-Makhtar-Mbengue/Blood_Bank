# 🩸 Système de Gestion de Banque de Sang - Laravel

[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)
[![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4.svg)](https://php.net)

Application web complète pour la gestion des dons de sang, des stocks et des demandes d'urgence.

## ✨ Fonctionnalités Clés

### Gestion des Donneurs
- Profils complets avec historiques médicaux
- Suivi des contre-indications et délais entre dons
- Système de notation des donneurs réguliers

### Gestion des Stocks
- Tracking temps réel par groupe sanguin
- Alertes automatiques (péremption, seuils critiques)
- Gestion de la chaîne du froid

### Système d'Urgence (🚨 Highlight)
- 4 niveaux d'urgence : 
  - ⚠️ Low (Bleu) 
  - ⚠️⚠️ Medium (Jaune) 
  - ⚠️⚠️⚠️ High (Orange) 
  - 💀 Critical (Rouge)
- Priorisation automatique des demandes
- Tableau de bord dédié aux urgences

### Analytics
- Prédiction des besoins saisonniers
- Cartographie des donneurs
- Export PDF/Excel

## 🚀 Installation

### Prérequis
- PHP 8.1+
- Composer 2.5+
- MySQL 8.0+
- Node.js 18+

### Étapes
1. Cloner le dépôt :
```bash
git clone https://github.com/Mohamed-Makhtar-Mbengue/Blood_Bank.git
cd Blood_Bank
erDiagram
  DONORS ||--o{ DONATIONS : "1-N"
  BLOOD_INVENTORY }|--|| DONATIONS : "1-1"
  EMERGENCY_REQUESTS }|--|| USERS : "N-1"

### Points Clés Mis en Avant :
1. **Compatibilité** : Prérequis techniques clairement spécifiés
2. **Urgences** : Mise en avant visuelle du système d'urgence
3. **Sécurité** : Comptes de test avec rôles différenciés
4. **Diagramme** : Visualisation des relations DB via Mermaid
5. **Déploiement** : Configs prêtes pour production

### Pour personnaliser :
1. Remplacez les liens GitHub/emails
2. Ajoutez des screenshots dans un dossier `/docs/screenshots`
3. Personnalisez le diagramme DB selon votre schéma réel

Ce README couvre tous les aspects techniques et fonctionnels tout en mettant en valeur votre système d'urgence, le cœur innovant du projet.
