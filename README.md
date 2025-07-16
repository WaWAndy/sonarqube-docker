Sonarqube-docker


1. Project description

En tant que développeur occasionnel, j'ai souvent eu l'occasion de travailler sur des projets d'applications web en PHP et Python. étant donné que ces projets étaient relativement larges et destinés à être disponibles sur internet, les questions de maintenance sur le long terme et la cybersécurité se sont imposés. Il était donc important de pouvoir compter sur un outil afin d'analyser le code et déterminer comment l'améliorer, tant sur le plan de la sécurité que de la robustesse. C'est ainsi que Sonarqube a été choisi comme moyen de vérifier la qualité du code. Dans un objectif de portabilité et de réplication le projet se base sur Docker. Dans ce projet est inclus un dossier d'exemple (sonarqube-docker/project/restaurant) afin d'avoir une première vue d'exemple. 

Languages supportés (Azure Resource Manager, CloudFormation, C#, CSS, Docker, Flex, Go, HTML, Java, JavaCript, Kotlin, Kubernetes/Helm, PHP, Python, Ruby, Scala, Secrets, Terraform, TypeScript, VB.NET, XML






2. Table of contents

3. how to install, test and use the project

   Install and test

   1. docker compose up --build
   2. docker logs sonarscanner
   3. Wait for message "ANALYSIS SUCCESSFUL, you can find the results at: http://sonarqube:9000/dashboard?id=test"
   4. go to http://sonarqube:9000
   5. Default credentials are: admin, admin. Change to Admin1234567? for test purpose
   6. Check the analysis
  
   Live use 

   1. docker compose down -v (if you tested before)
   2. replace sonarqube-docker/project/restaurant with the folder you want to analyze
   3. docker compose up --build
   4. docker logs sonarscanner
   3. Wait for message "ANALYSIS SUCCESSFUL, you can find the results at: http://sonarqube:9000/dashboard?id=test"
   4. go to http://sonarqube:9000
   5. Default credentials are: admin, admin. Change to Admin1234567? for test purpose
   6. Check the analysis
   7. edit sonarqube-docker/project/sonnar-project.propreties and replace the admin password with the new one: Admin1234567?
   8. Now you can work on your own folder
   9. When you want to analyse the changes you made, just type docker compose up sonarscanner
   10. Wait for the new analysis to be done and successfull
   11. Refresh the page on http://sonarqube:9000 and you will see you modification in the codebase
    
   



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
