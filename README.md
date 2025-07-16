🚀 SonarQube Docker Project

Ce projet permet de déployer rapidement une instance SonarQube avec Docker Compose, accompagnée d’un exemple de configuration pour scanner un projet.

🎟️ Prérequis

Docker

Docker Compose

📝 Contenu du projet

docker-compose.yml : Configuration Docker Compose pour SonarQube et SonarScanner

.env.example : Exemple de fichier d’environnement

sonar-project.properties : Exemple de configuration SonarScanner

.gitignore : Fichiers/dossiers ignorés dans le repo Git

report-task.txt : Rapport d'analyse SonarScanner

⚙️ Déploiement rapide

1️⃣ Cloner ce dépôt :

git clone https://github.com/<ton-utilisateur>/sonarqube-docker.git
cd sonarqube-docker

2️⃣ Démarrer les services :

docker compose up --build

3️⃣ Attendre que SonarQube soit prêt :

Vérifier les logs du conteneur sonarscanner :

docker logs sonarscanner

Attendre les messages :

INFO ANALYSIS SUCCESSFUL, you can find the results at: http://sonarqube:9000/dashboard?id=test
INFO EXECUTION SUCCESS

4️⃣ Accéder à l'interface web :

http://<ip_serveur>:9000

5️⃣ Connexion initiale :

Login : admin

Password : admin

👉 À la première connexion :

SonarQube demande de changer le mot de passe. Exemple :

Nouveau mot de passe : Admin1234567?

6️⃣ Consulter l’analyse :

Accéder au tableau de bord du projet :Tableau de bord SonarQube (local)

🔐 Remarques de sécurité

Important : Ne jamais utiliser admin/admin en production.

Préférer l’utilisation de tokens d’analyse pour authentifier SonarScanner.

📂 Structure recommandée

sonarqube-docker/
├── .env.example
├── .gitignore
├── docker-compose.yml
├── sonar-project.properties
├── report-task.txt
└── README.md

💍 .gitignore

Le fichier .gitignore ignore notamment :

.env
*.log
*.tmp
node_modules/
__pycache__/
.DS_Store

📝 Auteur

Projet maintenu par [Ton Nom ou Organisation].
