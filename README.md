Sonarqube-docker


1. Project description

En tant que développeur occasionnel, j'ai souvent eu l'occasion de travailler sur des projets d'applications web en PHP et Python. étant donné que ces projets étaient relativement larges et destinés à être disponibles sur internet, les questions de maintenance sur le long terme et la cybersécurité se sont imposés. Il était donc important de pouvoir compter sur un outil afin d'analyser le code et déterminer comment l'améliorer, tant sur le plan de la sécurité que de la robustesse. C'est ainsi que Sonarqube a été choisi comme moyen de vérifier la qualité du code. Dans un objectif de portabilité et de réplication le projet se base sur Docker. Dans ce projet est inclus un dossier d'exemple (sonarqube-docker/project/restaurant) afin d'avoir une première vue d'exemple. 

Languages supportés (Azure Resource Manager, CloudFormation, C#, CSS, Docker, Flex, Go, HTML, Java, JavaCript, Kotlin, Kubernetes/Helm, PHP, Python, Ruby, Scala, Secrets, Terraform, TypeScript, VB.NET, XML






2. Table of contents

3. how to install and run the project

   Mise en place de Sonarqube et test 

   <img width="1037" height="27" alt="image" src="https://github.com/user-attachments/assets/454da387-3044-4cc6-9638-b4cee8cc436a" />


5. How to use the project


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
