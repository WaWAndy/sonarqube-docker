# Sonarqube-docker


## 1. Project description

En tant que développeur occasionnel, j'ai souvent eu l'occasion de travailler sur des projets d'applications web en PHP et Python. Ces projets ont parfois représentés des milliers de lignes de codes et pouvaient comporter des vulnérabilités en termes de cybersécurité ou de potentiels problème de maintenance sur le long terme. 

Il était donc important de pouvoir compter sur un outil afin d'analyser le code et déterminer comment l'améliorer, tant sur le plan de la sécurité que de la robustesse. Sonarqube a été choisi pour pluseieurs rasions. D'une part, il permet de réaliser une Analyse approfnodie de la qualité du code en détectant les bugs, les vulnérabilités, les code de mauvaise qualité et les duplication). De plus, cet outil en édition "community" opensource permet d'analyser un grand nombre de languages  (Azure Resource Manager, CloudFormation, C#, CSS, Docker, Flex, Go, HTML, Java, JavaCript, Kotlin, Kubernetes/Helm, PHP, Python, Ruby, Scala, Secrets, Terraform, TypeScript, VB.NET, XML). Sonarqube possède également un iterface graphique clair et moderne. 


Dans un objectif de portabilité et de réplication, le projet se base sur Docker. 



## 2. how to install, test and use the project

   ### 2.1 Install and test

   1. docker compose up --build
   2. docker logs sonarscanner
   3. Wait for message "ANALYSIS SUCCESSFUL, you can find the results at: http://sonarqube:9000/dashboard?id=test"
   4. go to http://sonarqube:9000
   5. Default credentials are: admin, admin. Change to Admin1234567? for test purpose
   6. Check the analysis
  
   ### 2.2 Live use

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
    
   


